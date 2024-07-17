<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Hash;
use Auth;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function vendorProfile() {
        $user = Auth::user();
        if($user->profile_picture!=null){
            $user->profile_picture = url('asset/uploads/profile_picture/'.$user->profile_picture);
        } else {
            $user->profile_picture = url('asset/images/profile_img.png');
        }

        if($user->brand_logo!=null){
            $user->brand_logo = url('asset/uploads/brand_logo/'.$user->brand_logo);
        } else {
            $user->brand_logo = url('asset/images/thumb.png');
        }
        return view('vendor.profile',compact('user'));
    }

    public function vendorProfileUpdate(Request $request) {
        $userId = Auth::user()->id;
        $request->validate([
            'company_name' => 'required',
            'phone_no' => 'required|numeric|digits:10|unique:users,phone_no,'.$userId,
            'company_address' => 'required',
            'company_email' => 'required|email|unique:users,email,'.$userId,
            // 'password' => 'nullable|confirmed',
            // 'password_confirmation' => 'nullable',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        DB::beginTransaction();
        $image = $image1 = null;
        try {
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $image = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('asset/uploads/profile_picture/');
                $file->move($destinationPath,$image);
            }
    
            if ($request->hasFile('brand_logo')) {
                $file1 = $request->file('brand_logo');
                $image1 = time().'.'.$file1->getClientOriginalExtension();
                $destinationPath1 = public_path('asset/uploads/brand_logo/');
                $file1->move($destinationPath1,$image1);
            }

            $user = User::find($userId);
            $user->company_name = $request->company_name;
            $user->phone_no = $request->phone_no;
            $user->company_address = $request->company_address;
            $user->email = $request->company_email;
            $user->profile_picture = $image;
            $user->brand_logo = $image1;
            $user->save();

            DB::commit();
            return redirect('vendor/profile')->with(['successMsg' => 'Profile data successfully updated']);

        } catch (\Throwable $th) {
            // if (File::exists($filePath)) {

            // }
            // if (File::exists($filePath)) {
                
            // }
            DB::rollback();
            //throw $th;
        }
    }
}
