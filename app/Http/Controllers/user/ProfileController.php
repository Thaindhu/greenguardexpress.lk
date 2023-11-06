<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CityModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::where('id', Auth::user()->id)->first();
        $cities = CityModel::orderBy('loc_name', 'ASC')->get();
        $profile->password = null;
        return view('user.profile.index', compact('profile', 'cities'));
    }
    public function wishlist()
    {
        return view('user.profile.wishlist');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            // 'email' => 'required',
            'phone' => 'required',
            'address_1' => 'required',
            'city' => 'required',
            // 'postal_code' => 'required',
        ]);

        $updateValues = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "mobile_number" => $request->phone,
            "address_1" => $request->address_1,
            "address_2" => $request->address_2,
            "city_id" => $request->city,
            "postal_code" => null,
            "newsletter" => $request->newsletter,
            "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
        ];

        try {
            $result = User::where('id', Auth::user()->id)
                ->update($updateValues);

            if ($result) {
                return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
            } else {
                return redirect()->route('user.profile')->with('error', 'Profile updated failed. Please try again in few minutes.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('user.profile')->with('error', 'Something went wrong. Please try again in few minutes.');
        }
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
            'new_confirm' => 'required|same:password',
        ]);
        // dd(Hash::make($request->old_password));
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->route('user.profile')->with('error-pass', 'Wrong old password.');
        }
        $updateValues = [
            "password" => Hash::make($request->password),
            "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
        ];

        try {
            $result = User::where('id', Auth::user()->id)
                ->update($updateValues);

            if ($result) {
                return redirect()->route('user.profile')->with('success-pass', 'Profile updated successfully.');
            } else {
                return redirect()->route('user.profile')->with('error-pass', 'Profile updated failed. Please try again in few minutes.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('user.profile')->with('error-pass', 'Something went wrong. Please try again in few minutes.');
        }
    }
}
