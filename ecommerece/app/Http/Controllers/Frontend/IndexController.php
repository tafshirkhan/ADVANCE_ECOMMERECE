<?php

namespace App\Http\Controllers\Frontend;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function ViewIndexPage(){
        return view('Frontend.index');
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $userId = Auth::user()->id;
        $user = User::find($userId);

        return view('Frontend.Profile.user_profile',compact('user'));
    }


    public function UserUpdateProfile(Request $req){
        
        $user = Auth::user()->id;
        $data = User::find($user);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone = $req->phone;

        if($req->file('profile_photo_path')){
            $file = $req->file('profile_photo_path');
            @unlink(public_path('upload/userImage/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/userImage'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $message = array(
            'message'=>'Profile updated successful',
            'alert-type'=>'success'
        );
        return redirect()->route('dashboard')->with($message);

    }

    public function UserPassword(){
        $data= Auth::user()->id;
        $user = User::find($data);
        return view('Frontend.Profile.user_password',compact('user'));
         //return view('Frontend.Profile.user_password');

    }

    public function UserUpdatePassword(Request $req){

         $valid = $req->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
        ]);
        
        //$data = Auth::user()->id;
        $hashPass = Auth::user()->password;
        if(Hash::check($req->oldpassword, $hashPass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($req->password);
            $user->save();
            //after changing the password user will logout 
            Auth::logout();
            return redirect()->route('user.login');
        }
        else{
            return redirect()->back();
        }
    }
}
