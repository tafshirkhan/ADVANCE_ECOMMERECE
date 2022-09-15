@extends('Frontend.master')

@section('main_content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('Frontend.Common.usersidebar')

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
