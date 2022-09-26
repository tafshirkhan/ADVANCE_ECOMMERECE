<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerifiedUserController extends Controller
{
    public function AllVerifiedUsers(){
        $users = User::latest()->get();

        return view('Backend.User.allusers',compact('users'));

    }
}
