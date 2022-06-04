@extends('Admin.admin_master')
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-inverse bg-img" data-overlay="2">
                    <div class="flexbox px-20 pt-20">
                        <label class="toggler toggler-danger text-white">
                            <input type="checkbox">
                            <i class="fa fa-heart"></i>
                        </label>
                        <div class="dropdown">
                            <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="btn btn-rounded" href="{{ route('admin.editprofile') }}"><i
                                        class="fa fa-edit"></i> Edit
                                    Profile</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-picture-o"></i> Shots</a>
                                <a class="dropdown-item" href="#"><i class="ti-check"></i> Follow</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Block</a>
                            </div>
                        </div>
                    </div>

                    <div class="box-body text-center pb-50">
                        <a href="#">
                            <img class="avatar avatar-xxl avatar-bordered"
                                src="{{ !empty($data->profile_photo_path) ? url('upload/adminImage/' . $data->profile_photo_path) : url('upload/noImage.png') }}">

                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $data->name }}</a></h4>
                        <span><i class=""></i>{{ $data->email }}</span>
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                            <span class="opacity-60">Followers</span><br>
                            <span class="font-size-20">8.6K</span>
                        </li>
                        <li>
                            <span class="opacity-60">Following</span><br>
                            <span class="font-size-20">8457</span>
                        </li>
                        <li>
                            <span class="opacity-60">Tweets</span><br>
                            <span class="font-size-20">2154</span>
                        </li>
                    </ul>
                </div>


            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
