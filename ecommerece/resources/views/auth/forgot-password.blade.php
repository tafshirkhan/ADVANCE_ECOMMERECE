@extends('Frontend.master')
@section('main_content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Forget Password</a></li>

                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">


                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Forget Password</h4>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" id="email" name="email"
                                    class="form-control unicase-form-control text-input">

                            </div>


                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Request</button>
                        </form>


                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('Frontend.Body.brand')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
