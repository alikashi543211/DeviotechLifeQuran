@extends('layouts.admin')
@section('title','Meta Tags')
@section('heading','Setting Meta Tags')


@section('content')


    <section>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Home Page</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Home Page Title</label>
                                                <input type="text" name="home_title" class="form-control" value="{{$setting['home_title'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Home Page Meta Tags ( Please write meta tags with comma separated )</label>
                                                <input type="text" name="home_meta_tag" class="form-control" value="{{$setting['home_meta_tag'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Home Page Meta Description</label>

                                                <textarea name="home_meta_description" class="form-control" cols="12" rows="3">{!! $setting['home_meta_description'] ?? '' !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">About Page</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>About Page Title</label>
                                                <input type="text" name="about_title" class="form-control" value="{{$setting['about_title'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>About Page Meta Tags ( Please write meta tags with comma separated )</label>
                                                <input type="text" name="about_meta_tag" class="form-control" value="{{$setting['about_meta_tag'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Page Meta Description</label>

                                                <textarea name="about_meta_description" class="form-control" cols="12" rows="3">{!! $setting['about_meta_description'] ?? '' !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Contact Page</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Page Title</label>
                                                <input type="text" name="contact_title" class="form-control" value="{{$setting['contact_title'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Page Meta Tags ( Please write meta tags with comma separated )</label>
                                                <input type="text" name="contact_meta_tag" class="form-control" value="{{$setting['contact_meta_tag'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Contact Page Meta Description</label>
                                                <textarea name="contact_meta_description" class="form-control" cols="12" rows="3">{!! $setting['contact_meta_description'] ?? '' !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Tutor List Page</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tutor Page Title</label>
                                                <input type="text" name="tutor_title" class="form-control" value="{{$setting['tutor_title'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tutor Page Meta Tags ( Please write meta tags with comma separated )</label>
                                                <input type="text" name="tutor_meta_tag" class="form-control" value="{{$setting['tutor_meta_tag'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tutor Page Meta Description</label>
                                                <textarea name="tutor_meta_description" class="form-control" cols="12" rows="3">{!! $setting['tutor_meta_description'] ?? '' !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Tutor Detail Page</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tutor Detail Page Title</label>
                                                <input type="text" name="tutor_detail_title" class="form-control" value="{{$setting['tutor_detail_title'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tutor Detail  Page Meta Tags ( Please write meta tags with comma separated )</label>
                                                <input type="text" name="tutor_detail_meta_tag" class="form-control" value="{{$setting['tutor_detail_meta_tag'] ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tutor Detail  Page Meta Description</label>
                                                <textarea name="tutor_detail_meta_description" class="form-control" cols="12" rows="3">{!! $setting['tutor_detail_meta_description'] ?? '' !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group pull-right mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{route('admin.dashboard')}}" class="btn btn-danger">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </section>



@endsection
