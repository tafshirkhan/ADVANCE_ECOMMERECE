<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $data = Admin::find(1);
        return view('Admin.Profile.admin_profile_view',compact('data'));
    }

    public function AdminEditProfile(){
        $data = Admin::find(1);
        return view('Admin.Profile.admin_edit_profile',compact('data'));

    }

    public function AdminChangesProfile(Request $req){
        $data = Admin::find(1);
        $data->name = $req->name;
        $data->email = $req->email;

        if($req->file('profile_photo_path')){
            $file = $req->file('profile_photo_path');
            @unlink(public_path('upload/adminImage/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/adminImage'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $message = array(
            'message'=>'Profile updated successful',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.profile')->with($message);


    }

    public function AdminPassword(){
        return view('Admin.Profile.admin_changes_password');
    }

    public function AdminChangesPassword(Request $req){
        $valid = $req->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
        ]);

        $hashPass = Admin::find(1)->password;
        if(Hash::check($req->oldpassword, $hashPass)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($req->password);
            $admin->save();
            //after changing the password user will logout 
            Auth::logout();
            return redirect()->route('admin.login');
        }
        else{
            return redirect()->back();
        }
    }
}
