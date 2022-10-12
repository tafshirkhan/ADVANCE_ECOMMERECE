@extends('Admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Post</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('store.blogpost') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <!-- 1st row -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Blog Category<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Blog Category </option>

                                                            @foreach ($blogcategory as $blogcategory)
                                                                <option value="{{ $blogcategory->id }}">
                                                                    {{ $blogcategory->blog_category }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Post Title <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title" class="form-control">
                                                        @error('post_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 2nd col md 4 -->


                                        </div> <!-- end 1st row -->


                                        <div class="row">
                                            <!-- 5th row -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Post Thumb <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="post_image" class="form-control"
                                                            onchange="mainThumbUrl(this)">
                                                        @error('post_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                        <img src="" id="mainThumb">
                                                    </div>
                                                </div>
                                            </div><!-- 1st col md 4 -->




                                        </div> <!-- end 5th row -->



                                        <div class="row">
                                            <!-- 6th row -->
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>Post Details<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="post_details" rows="10" cols="80">
												Write here</textarea>
                                                    </div>
                                                </div>
                                            </div><!-- 1st col md 4 -->
                                        </div> <!-- end 6th row -->

                                    </div>

                                </div>

                                <hr>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn btn-info">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        /* This script for showing the thumb image while choosing */
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThumb').attr('src', e.target.result).width(50).height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
