@extends('Frontend.master')

@section('main_content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br><br>
                    <img class="card-img-top" style="border-radius: 50%"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/userImage/' . $user->profile_photo_path) : url('upload/noImage.png') }}"
                        width="80%" height="80%"><br><br>

                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-info btn-sm btn-block">Profile</a>
                        <a href="" class="btn btn-success btn-sm btn-block">Changes Password</a>
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

                        <div class="card-body">
                            <form method="post" action="{{ route('user.updatepassword') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current Password
                                    </label>
                                    <input type="password" id="current_password" name="old_password"
                                        class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">New Password
                                    </label>
                                    <input type="password" id="password" name="password"
                                        class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control unicase-form-control text-input">
                                </div>



                                <div class="form-group">

                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
