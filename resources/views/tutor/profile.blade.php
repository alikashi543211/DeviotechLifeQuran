@extends('layouts.tutor')
@section('title', 'Profile')
@section('css')
    <link href="{{asset('front/dropify/dropify.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <form action="{{route('tutor.profile.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 pt-1 ">
            <div class="col-md-12">
                <div class="card shadow border-0">
                    <div class="card-header card-shadow header-position">
                        <h5 class="text-white">Profile Detail</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label>Image   </label>
                                            <div>
                                                <input type="file" name="user_img" class="dropify" data-default-file="{{asset(auth()->user()->avatar)}}"  />
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-1">
            <div class="col-sm-12 col-12">
                <div class="card shadow border-0">
                    <div class="card-header card-shadow header-position">
                        <h5 class="text-white">Banking Information</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $profile=auth()->user()->profile;
                        @endphp
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <div class="mb-3">
                                    <div class="form-icon position-relative">
                                        <label>Bank Name</label>
                                        <select name="bank_name" class="form-control " data-live-search="true" required>
                                            <option disabled selected value="">Select Bank</option>
                                            <option {{$profile->bank_name=='United Bank pvt.ltd'?'selected':''}}  value="United Bank pvt.ltd">United Bank pvt.ltd</option>
                                            <option {{$profile->bank_name=='Habib Bank Ltd'?'selected':''}} value="Habib Bank Ltd">Habib Bank Ltd</option>
                                            <option {{$profile->bank_name=='Meezan Bank pvt.ltd'?'selected':''}}  value="Meezan Bank pvt.ltd">Meezan Bank pvt.ltd</option>
                                            <option {{$profile->bank_name=='Bank of Punjab ltd'?'selected':''}} value="Bank of Punjab ltd">Bank of Punjab ltd</option>
                                            <option {{$profile->bank_name=='Allied Bank pvt.ltd'?'selected':''}}  value="Allied Bank pvt.ltd">Allied Bank pvt.ltd</option>
                                            <option {{$profile->bank_name=='MCB pvt.ltd'?'selected':''}}  value="MCB pvt.ltd">MCB pvt.ltd</option>
                                        </select>
                                    </div>
                                    @error('bank_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="mb-3">
                                    <div class="form-icon position-relative">
                                        <label>Bank Address</label>
                                        <input type="text" class="form-control  @error('bank_address') is-invalid @enderror" value="{{$profile->bank_address}}" placeholder="Bank Address" name="bank_address" required="">
                                    </div>
                                    @error('bank_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="mb-3">
                                    <div class="form-icon position-relative">
                                        <label>Account Title</label>
                                        <input type="text" class="form-control  @error('account_title') is-invalid @enderror" value="{{$profile->account_title}}" placeholder="Account Title" name="account_title" required="">
                                    </div>
                                    @error('account_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="mb-3">
                                    <div class="form-icon position-relative">
                                        <label>Branch Code</label>
                                        <input type="text" class="form-control  @error('branch_code') is-invalid @enderror" value="{{$profile->branch_code}}" placeholder="Branch Code" name="branch_code" required="">
                                    </div>
                                    @error('branch_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{--                    <div class="col-sm-6 col-6">--}}
                            {{--                        <div class="mb-3">--}}
                            {{--                            <div class="form-icon position-relative">--}}
                            {{--                                <label>IBAN No</label>--}}
                            {{--                                <input type="text" class="form-control  @error('iban') is-invalid @enderror" value="{{$profile->iban_no}}" placeholder="Iban No" name="iban" required="">--}}
                            {{--                            </div>--}}
                            {{--                            @error('iban')--}}
                            {{--                            <span class="text-danger">{{ $message }}</span>--}}
                            {{--                            @enderror--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}

                            <div class="col-sm-12 col-12">
                                <div class="mb-3">
                                    <div class="form-icon position-relative">
                                        <label>Account No</label>
                                        <input type="text" class="form-control  @error('account_no') is-invalid @enderror" value="{{$profile->account_no}}" placeholder="Bank Account No" name="account_no" required="">
                                    </div>
                                    @error('account_no')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-1">
            <div class="col-sm-12 col-12">
                <div class="card shadow border-0">
                    <div class="card-header card-shadow header-position">
                        <h5 class="text-white">Description</h5>
                    </div>
                    <div class="card-body">
                        <textarea id="summernote" name="detail">{!! $profile->detail !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 " style="flex-direction: row-reverse;">
            <div class="col-sm-3 col-3" >
                <button type="submit" class="btn w-100 btn-primary">Update</button>
            </div>
        </div>
    </form>


@endsection
@section('js')
    <script src="{{asset('front/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('front/dropify/form-fileuploads.init.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    })
</script>

@endsection

