@extends('Frontend.master')
@section('main_content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>{{ $blogpost->post_title }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{ asset($blogpost->post_image) }}" alt="">
                            <h1>{{ $blogpost->post_title }}</h1>

                            <span
                                class="date-time">{{ Carbon\Carbon::parse($blogpost->created_at)->diffForHumans() }}</span>
                            <p>{!! $blogpost->post_details !!}</p>


                        </div>

                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Your Name
                                                <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputName" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Email Address
                                                <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputEmail1" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputTitle" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Your Comments
                                                <span>*</span></label>
                                            <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit
                                        Comment</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3 sidebar">



                        <div class="sidebar-module-container">
                            <!-- ==============================================CATEGORY============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Blog Category</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">
                                        @foreach ($blogcategory as $blogcategory)
                                            <ul class="list-group">
                                                {{-- <li class="list-group-item active" aria-current="true">An active item</li> --}}
                                                <a href="{{ url('blog/category/post/' . $blogcategory->id) }}">
                                                    <li class="list-group-item active" aria-current="true">
                                                        {{ $blogcategory->blog_category }}</li>
                                                </a>

                                            </ul>
                                        @endforeach



                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== CATEGORY : END ============================================== -->

                            <!-- ============================================== PRODUCT TAGS ============================================== -->

                            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
