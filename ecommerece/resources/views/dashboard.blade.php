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

                @include('Frontend.Common.usersidebar')

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
