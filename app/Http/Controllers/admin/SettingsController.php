<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SettingsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SettingsModel::where('id', 1)->first();
        // dd($settings);
        return view('admin.settings.index', compact('settings'));
    }
    public function update(Request $request)
    {
        // dd($request->is_active_free_deliver);
        try {
            $res = SettingsModel::updateOrCreate(
                ['id' => 1],
                [
                    'free_deliver_total' => $request->max_order_total,
                    'ref_default_dis' => $request->ref_default_dis,
                    'is_active_free_deliver' => $request->is_active_free_deliver ? 1 : 0,
                    'created_at' => Carbon::now()->timezone('Asia/Colombo'),
                    'updated_at' => Carbon::now()->timezone('Asia/Colombo'),
                ]
            );
            if ($res) {
                return redirect()->route('admin.settings.index')->with('success', 'Updated successfully.');
            } else {
                return redirect()->route('admin.settings.index')->with('error', 'Update error.');
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->route('admin.settings.index')->with('error', $th->getMessage());
        }
    }
}
