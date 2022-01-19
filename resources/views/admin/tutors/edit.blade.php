@extends('layouts.admin')
@section('title','Edit  Tutor')
@section('heading','Update Tutor')
@section('css')
    <link href="{{asset('front/dropify/dropify.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/summarnote/summernote.min.css')}}" rel="stylesheet">
    <style>

    </style>
@endsection
@section('content')


    <section class="page-users-view mb-3">
        <form action="{{ route('admin.tutor.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$tutor->id}}">
            <div class="row">
                <!-- account start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="col-sm-12 mb-3 data-field-col">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Image   </label>
                                        <div>
                                            <input type="file" name="image" class="dropify" data-default-file="{{asset($tutor->avatar)}}"  />
                                            @csrf
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                            <label for="data-name" class="">Name</label>
                                            <input type="text" value="{{$tutor->name}}" class="form-control" name="name" required>
                                        </div>

                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Email</label>
                                            <input type="email" value="{{$tutor->email}}" class="form-control" name="email" required>
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            @php
                                            $courses=explode(',',$tutor->profile->course);
                                            @endphp
                                            <label for="data-salary">Course</label>
                                            <select class="form-control select2" required name="course[]" multiple="multiple">
                                                <option
                                                    @foreach($courses as $course)
                                                        {{$course=='nazra'?'selected':''}}
                                                    @endforeach
                                                        value="nazra">Nazra</option>
                                                <option @foreach($courses as $course)
                                                        {{$course=='hifz'?'selected':''}}
                                                        @endforeach
                                                        value="hifz">Hifz</option>
                                                <option  @foreach($courses as $course)
                                                         {{$course=='tajweed'?'selected':''}}
                                                         @endforeach
                                                         value="tajweed">Tajweed</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-salary">Zoom Token</label>
                                            <input type="text"  value="{{$tutor->profile->zoom_token}}"  class="form-control" name="zoom_token" >
                                        </div>
                                        <div class="col-sm-12  mb-1   col-md-4  data-field-col">
                                            <label for="data-salary">Youtube Video ID</label>
                                            <input type="text"  value="{{$tutor->profile->video_id}}"  class="form-control" name="video_id" >
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-salary">Youtube Video Image</label>
                                            <input type="file" value="{{$tutor->profile->video_image}}"  class="form-control"  name="video_image" >
                                        </div>



                                        <div class="col-sm-12  mb-1   col-md-4  data-field-col">
                                            <label for="data-salary">Salary</label>
                                            <input type="number" min="0" value="{{$tutor->profile->salary}}" class="form-control" name="salary" required>
                                        </div>
                                        <div class="col-sm-12  mb-1 pt-1 mt-1  col-md-4  data-field-col">

                                            Show on home : &nbsp;&nbsp;<input type="checkbox"  class="pl-4" name="is_home_show" {{$tutor->is_home_show==1?'checked':''}} value="1">
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Banking Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mb-1 col-md-6 data-field-col">
                                    <label for="data-name" class="">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" value="{{$tutor->profile->bank_name}}">
                                </div>
                                <div class="col-sm-12 mb-1 col-md-6 data-field-col">
                                    <label for="data-name" class="">Bank Address</label>
                                    <input type="text" class="form-control" name="bank_address" value="{{$tutor->profile->bank_address}}">
                                </div>
                                <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                    <label for="data-name" class="">Account Title</label>
                                    <input type="text" class="form-control" name="account_title" value="{{$tutor->profile->account_title}}">
                                </div>
                                <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                    <label for="data-name" class="">Branch Code</label>
                                    <input type="text" class="form-control" name="branch_code" value="{{$tutor->profile->account_title}}">
                                </div>
                                <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                    <label for="data-name" class="">Account No</label>
                                    <input type="text" class="form-control" name="account_no" value="{{$tutor->profile->account_no}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Tutor Description</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <label>Tutor Detail</label>
                                <textarea name="detail"   class="form-control summernoteedit" >{!! $tutor->profile->detail !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 ">
                        <button type="submit" class="btn btn-primary float-right" title="Update Tutor">Update</button>
                    </div>
                </div>
                <!-- account end -->



            </div>
        </form>
    </section>



@endsection
@section('js')

    <script src="{{asset('admin/summarnote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function () {


  
$('.summernoteedit').summernote();


        });
    </script>


    <script src="{{asset('front/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('front/dropify/form-fileuploads.init.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    descriptionEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
