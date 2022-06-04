@extends('Admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="row">
                <div class="col-md-10">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Edit your profile</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('admin.changesprofile') }}"
                                        enctype="multipart/form-data" novalidate="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-3">

                                                        <div class="form-group">
                                                            <h5>Name <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ $data->name }}"
                                                                    data-validation-required-message="This field is required">

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">

                                                        <div class="form-group">
                                                            <h5>Email<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email" class="form-control"
                                                                    value="{{ $data->email }}" required=""
                                                                    data-validation-required-message="This field is required">

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">

                                                        <div class="form-group">
                                                            <h5>Select Image <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="file" name="profile_photo_path"
                                                                    class="form-control" id="image" required="">

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <img class="avatar avatar-xxl avatar-bordered" id="showImage"
                                                            src="{{ !empty($data->profile_photo_path) ? url('upload/adminImage/' . $data->profile_photo_path) : url('upload/noImage.png') }}"
                                                            style="width: 150px; height: 150px;">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>

            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var read = new FileReader();
                read.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                read.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
