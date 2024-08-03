<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VendorStore;
use Validator;
use Hash;
use Auth;
use App\Mail\ForgotPasswordMail;
use App\Mail\ResendOTPMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
                $vendorId = Auth::user()->id;
                $check_store = VendorStore::where('vendor_id',$vendorId)->count();
                if($check_store == 1) {
                    return response()->json(['url'=> route("vendor.dashboard"),'message' => 'Login successfully','status'=>200], 200);    
                } else {
                    return response()->json(['url'=> route("vendor.install_app"),'message' => 'Login successfully','status'=>200], 200);
                }
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
    public function doForgotPassword(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $otp = rand(1000, 9999);
            $token = Str::random(60);
            
            $user = User::where('email',$request->email)->first();
            $data['user'] = $user;
            $data['otp'] = $otp;
            
            Mail::to($request->email)->send(new ForgotPasswordMail($data));

            User::where('email',$request->email)->update(['verify_otp'=>$otp,'token'=>$token]);

            return response()->json(['token'=>$token,'message' => 'OTP successfully sent to your register email address','status'=>200], 200);

        } catch(\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function verificationForm($token) {
        $user = User::where('token',$token)->first();
        if($user!=null) {
            return view('vendor_auth.verification',compact('token'));
        } else {
            return redirect("/vendor/login");
        }
    }

    public function verifyOTP(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'otp' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $new_token = Str::random(60);
            $user = User::where('verify_otp',$request->otp)->first();
            if($user!=null) {
                $token = $request->verify_token;
                if($token == $user->token) {
                    User::where('id',$user->id)->update(['verify_otp'=>NULL,'token'=>$new_token]);
                    return response()->json(['token'=>$new_token,'message' => 'OTP verified successfully','status'=>200], 200);
                } else {
                    return response()->json(['message' => 'Token is invalid','status'=>500], 500);
                }
            } else {
                return response()->json(['message' => 'OTP is invalid','status'=>500], 500);
            }
        } catch(\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function resendOTP(Request $request) {
        try {
            $otp = rand(1000, 9999);
            $new_token = Str::random(60);
            $user = User::where('token',$request->verify_token)->first();
            if($user!=null) {
                $token = $request->verify_token;
                if($token == $user->token) {
                    $data['user'] = $user;
                    $data['otp'] = $otp;
                    Mail::to($user->email)->send(new ResendOTPMail($data));
                    User::where('id',$user->id)->update(['verify_otp'=>$otp,'token'=>$new_token]);
                    return response()->json(['token'=>$new_token,'message' => 'OTP resend successfully','status'=>200], 200);
                } else {
                    return response()->json(['message' => 'Token is invalid','status'=>500], 500);
                }
            } else {
                return response()->json(['message' => 'Token is invalid','status'=>500], 500);
            }
        } catch(\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function resetPasswordForm($token) {
        $user = User::where('token',$token)->first();
        if($user!=null) {
            return view('vendor_auth.confirm_password',compact('token'));
        } else {
            return redirect("/vendor/login");
        }
    }

    public function changePassword(Request $request) {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $user = User::where('token',$request->vry_token)->first();
            if($user!=null) {
                User::where('id',$user->id)->update(['token'=>NULL,'password'=>Hash::make($request->password)]);
                return response()->json(['message' => 'OTP verified successfully','status'=>200], 200);
            } else {
                return response()->json(['message' => 'Token is invalid','status'=>500], 500);
            }
        } catch(\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
