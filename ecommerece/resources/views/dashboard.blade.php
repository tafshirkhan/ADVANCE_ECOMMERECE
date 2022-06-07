@extends('Frontend.master')

@section('main_content')
    <!--@php
    $user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    @endphp -->


    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br><br>
                    <img class="card-img-top" style="border-radius: 50%"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/userImage/' . $user->profile_photo_path) : url('upload/noImage.png') }}"
                        width="80%" height="80%"><br><br>

                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-info btn-sm btn-block">Profile</a>
                        <a href="{{ route('user.password') }}" class="btn btn-success btn-sm btn-block">Changes
                            Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>



                    </ul>
                </div>

                <div class=" col-md-2">

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hello</span>
                            <strong>{{ Auth::user()->name }}</strong>
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
