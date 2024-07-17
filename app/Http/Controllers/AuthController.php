<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function registerForm() {
        return view('vendor_auth.register');
    }

    public function vendorDoRegister(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'company_name' => 'required',
                'phone_no' => 'required|numeric|digits:10|unique:users,phone_no',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'description' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $userDt = new User;
            $userDt->name = $request->username;
            $userDt->username = $request->username;
            $userDt->email = $request->email;
            $userDt->company_name = $request->company_name;
            $userDt->phone_no = $request->phone_no;
            $userDt->password = Hash::make($request->password);
            $userDt->description = $request->description;
            $userDt->save();

            return response()->json(['message' => 'Valid data','status'=>200], 200);
        } catch(\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function loginForm() {
        return view('vendor_auth.login');
    }

    public function vendorDoLogin(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $userdata = array(
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password
            );

            if (Auth::attempt($userdata)){
                return response()->json(['message' => 'Login successfully','status'=>200], 200);
            } else {
                return response()->json(['message' => 'Invalid login details','status'=>500], 500);
            }
        } catch(\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function forgotPasswordForm() {
        return view('vendor_auth.forgot_password');
    }

    public function verificationForm() {
        return view('vendor_auth.verification');
    }

    public function resetPasswordForm() {
        return view('vendor_auth.confirm_password');
    }
}
