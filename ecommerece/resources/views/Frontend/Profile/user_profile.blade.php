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
                            <form method="post" action="{{ route('user.updateprofile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name
                                    </label>
                                    <input type="text" id="name" name="name"
                                        class="form-control unicase-form-control text-input" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address
                                    </label>
                                    <input type="email" id="email" name="email"
                                        class="form-control unicase-form-control text-input" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone
                                    </label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control unicase-form-control text-input" value="{{ $user->phone }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Image
                                    </label>
                                    <input type="file" name="profile_photo_path"
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
