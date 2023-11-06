<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use App\Models\CityModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::user()) {
            return back();
        }
        // if (!session()->has('url.intended')) {
        session(['url.intended' => url()->previous()]);
        // }
        return view('user.auth.login');
    }
    public function forget()
    {
        if (Auth::user()) {
            return back();
        }
        return view('user.auth.forget');
    }

    public function register()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        $cities = CityModel::orderBy('loc_name', 'ASC')->get();
        return view('user.auth.register', compact('cities'));
    }

    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            // 'email' => 'required|email|unique:users',
            'mobile_number' => 'required|unique:users',
            'address_1' => 'required',
            'city' => 'required',
            // 'postal_code' => 'required',
            'password' => 'required',
            're_password' => 'required|same:password',
        ]);

        try {
            // dd($request);
            //Insert data into database
            $hash = mt_rand(100000, 999999);
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->hash = $hash;
            $user->mobile_number = $request->mobile_number;
            $user->share_token = $this->random_str(16);
            $user->address_1 = $request->address_1;
            $user->address_2 = $request->address_2;
            $user->city_id = $request->city;
            $user->is_active = 1;
            $user->newsletter = $request->newsletter;
            $user->postal_code = null;
            $user->password = Hash::make($request->password);
            $save = $user->save();

            if ($save) {
                $mobile = $request->mobile_number;
                $pass = $request->password;
                $data['number'] = $request->mobile_number;
                $data['message'] = 'Dear+Customer+Please+use+following+OTP:+' . $hash . '+to+complete+your+request';

                $smscontroller = new SmsController();
                $res = $smscontroller->sendSms($data);
                // Mail::to($user->email)->send(new RegisterMail($user));
                // $credentials = $request->only('mobile_number', 'password');
                // Auth::attempt($credentials);
                // $userInfo = Auth::user();
                // Session::put('LoggedUser', $userInfo);
                // if (session()->has('url.intended')) {
                //     return redirect(session()->get('url.intended'));
                // }
                return view('user.auth.confirm', compact('mobile', 'pass'));
            } else {
                return back()->with('error', 'Something went wrong, try again later');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'Something went wrong, try again later');
        }
    }

    function check(Request $request)
    {
        $this->validate($request, [
            'mobile_number' => 'required',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = User::where('mobile_number', '=', $request->mobile_number)->first();

        if (!$userInfo) {
            return back()->with('error', 'We do not recognize your mobile number');
        } else {
            $credentials = $request->only('mobile_number', 'password');
            if (Auth::attempt($credentials)) {
                if (!Auth::user()->is_active) {
                    Session::flush();
                    Auth::logout();
                    return back()->with('error', 'You account has been temporarily blocked. Please contact customer care for more informations');
                }
                $userInfo = Auth::user();
                Session::put('LoggedUser', $userInfo);
                if (session()->has('url.intended')) {
                    return redirect(session()->get('url.intended'));
                }
                return redirect()->route('user.profile');
            } else {
                return back()->with('error', 'Incorrect password');
            }
        }
    }
    public function send_otp(Request $request)
    {
        $this->validate($request, [
            'mobile_number' => 'required',
        ]);
        $mobile = $request->mobile_number ? $request->mobile_number : null;
        $profile = User::where('mobile_number', $request->mobile_number)->first();
        if (!$profile) {
            return redirect()->route('user.forget', compact('mobile'))->with('error', 'We do not recognize your mobile number');
        }
        $hash = mt_rand(100000, 999999);
        $updateValues = [
            "hash" => $hash,
            "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
        ];
        try {
            $result = User::where('mobile_number', $request->mobile_number)
                ->update($updateValues);
            if ($result) {
                $data['number'] = $request->mobile_number;
                $data['message'] = 'Dear+Customer+Please+use+following+OTP:+' . $hash . '+to+complete+your+request';

                $smscontroller = new SmsController();
                $res = $smscontroller->sendSms($data);
                return view('user.auth.validate', compact('mobile'));
            } else {
                return redirect()->route('user.forget', compact('mobile'))->with('error', 'We do not recognize your mobile number');
            }
        } catch (\Throwable $th) {
            return redirect()->route('user.forget', compact('mobile'))->with('error', 'Something went wrong. Please try again in few minutes.');
        }
    }
    function validate_otp(Request $request)
    {
        $this->validate($request, [
            'mobile_number' => 'required',
            'otp' => 'required',
        ]);

        $mobile = $request->mobile_number;
        $profile = User::where('mobile_number', $request->mobile_number)->first();
        if (!$profile) {
            return redirect()->route('user.forget', compact('mobile'))->with('error', 'Invalid credentials');
        }
        $data = [
            "mobile_number" => $request->mobile_number,
            "otp" => $request->otp,
        ];
        if ($profile->hash == $request->otp) {
            return view('user.auth.reset_pass', compact('data'));
        }
        // Session::flash(
        //     'error',
        //     'Invalid OTP'
        // );
        // dd($request->mobile_number);
        return view('user.auth.validate', compact('mobile'))->with('error', 'Invalid OTP');
        // $startTime = $profile->updated_at;
        // $dateDiff = Carbon::now()->diffInMinutes($startTime, false);
        // dd($dateDiff);
        // if()
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'mobile_number' => 'required',
            'otp' => 'required',
            'password' => 'required',
            're_password' => 'required|same:password',
        ]);

        try {
            $profile = User::where('mobile_number', $request->mobile_number)->first();
            if ($profile->hash == $request->otp) {
                $updateValues = [
                    "password" => Hash::make($request->password),
                    "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
                ];
                $result = User::where('mobile_number', $request->mobile_number)
                    ->update($updateValues);

                if ($result) {
                    return redirect()->route('user.login')->with('success', 'Password reset complete.');
                } else {
                    return redirect()->route('user.login')->with('error', 'Something went wrong. Please try again in few minutes');
                }
            }
            return redirect()->route('user.forget', compact('mobile'))->with(['sms_sent', true])->with('error', 'Invalid OTP');
        } catch (\Throwable $th) {
            return redirect()->route('user.login')->with('error', 'Something went wrong. Please try again in few minutes.');
        }
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }

    function verify_user(Request $request)
    {
        $this->validate($request, [
            'mobile_number' => 'required',
            'password' => 'required',
            'otp' => 'required',
        ]);

        $mobile = $request->mobile_number;
        $profile = User::where('mobile_number', $request->mobile_number)->first();
        if (!$profile) {
            return redirect()->route('user.forget', compact('mobile'))->with('error', 'Invalid credentials');
        }
        if ($profile->hash == $request->otp) {
            $updateValues = [
                "is_active" => 1,
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ];
            $result = User::where('mobile_number', $request->mobile_number)
                ->update($updateValues);

            $credentials = $request->only('mobile_number', 'password');
            Auth::attempt($credentials);
            $userInfo = Auth::user();
            Session::put('LoggedUser', $userInfo);
            if (session()->has('url.intended')) {
                return redirect(session()->get('url.intended'));
            }
            return redirect('/');
        }
        return view('user.auth.validate', compact('mobile'))->with('error', 'Invalid OTP');
    }
}
