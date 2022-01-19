@extends('layouts.student')
@section('title', 'Profile')
@section('css')
    <link href="{{asset('front/dropify/dropify.min.css')}}" rel="stylesheet">
    @endsection
@section('content')
    <div class="row mt-4 pt-1">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header card-shadow header-position">
                    <h5 class="text-white">Profile Detail</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('student.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-sm-8 col-8  offset-2">
                                        <div class="form-group">
                                            <label>Image   </label>
                                            <div>
                                                <input type="file" name="user_img" class="dropify " data-default-file="{{asset(auth()->user()->avatar)}}"  />
                                                @csrf
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control ps-5 @error('name') is-invalid @enderror" value="{{auth()->user()->name}}" placeholder="Name" name="name" required="">
                                            </div>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control ps-5 @error('email') is-invalid @enderror" placeholder="Email" value="{{auth()->user()->email}}" name="email" required="">
                                            </div>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <i data-feather="phone" class="fea icon-sm icons"></i>
                                                <input type="tel" name="phone" class="form-control ps-5 @error('phone') is-invalid @enderror" placeholder="Phone no." value="{{auth()->user()->phone}}" required="">
                                            </div>
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" name="password" class="form-control ps-5" placeholder="New Password" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-md-3 col-8">
                                <button type="submit" class="btn w-100 btn-primary">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    @endsection
@section('js')
    <script src="{{asset('front/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('front/dropify/form-fileuploads.init.js')}}"></script>


    @endsection
