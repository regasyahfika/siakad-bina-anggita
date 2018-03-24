<?php

namespace App\Http\Controllers\WaliMurid;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
	  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:walimurid');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('walimurid.ubahPassword.index');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('password_lama'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password Anda saat ini tidak sesuai dengan password yang Anda berikan. Silakan coba lagi.");
        }
 
        if(strcmp($request->get('password_lama'), $request->get('password_baru')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Password baru tidak dapat sama dengan password Anda saat ini. Silakan pilih sandi yang berbeda..");
        }
 
        $validatedData = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_baru'));
        $user->save();
 
        return redirect()->back()->with("success","Password Berhasil Diubah");
 
    }
}
