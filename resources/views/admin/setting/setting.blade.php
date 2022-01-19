@extends('layouts.admin')
@section('title','Setting')
@section('heading','Settings Control')


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
                                <h4 class="card-title">Home Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Favicon</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="favicon" data-default-file="{{ asset($setting['favicon'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="logo" data-default-file="{{ asset($setting['logo'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logo Footer</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="logo_footer" data-default-file="{{ asset($setting['logo_footer'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banner Heading</label>
                                            <input type="text" value="{{$setting['banner_heading'] ?? ''}}" name="banner_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banner Description</label>
                                            <input type="text" value="{{$setting['banner_description'] ?? ''}}" name="banner_description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Home Banner Image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="home_banner" data-default-file="{{ asset($setting['home_banner'] ?? '')  }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image (Nazra)</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="img_nazra" data-default-file="{{ asset($setting['img_nazra'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image (Hifz)</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="img_hifz" data-default-file="{{ asset($setting['img_hifz'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image (Tajweed)</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="img_tajweed" data-default-file="{{ asset($setting['img_tajweed'] ?? '')  }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tutor's Slider background (Tajweed)</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="slider_background" data-default-file="{{ asset($setting['slider_background'] ?? '')  }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


 <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">About us Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Section 1 image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="favicon" data-default-file="{{ asset($setting['favicon'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>section 2 image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="logo" data-default-file="{{ asset($setting['logo'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>section 3 image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="logo_footer" data-default-file="{{ asset($setting['logo_footer'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">section 1 paragraph text</label>
                                            <input type="text" value="{{$setting['banner_heading'] ?? ''}}" name="banner_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">section 2 paragraph text</label>
                                            <input type="text" value="{{$setting['banner_description'] ?? ''}}" name="banner_description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <label class="bmd-label-floating">section 3 paragraph text</label>
                                            <input type="text" value="{{$setting['banner_description'] ?? ''}}" name="banner_description" class="form-control">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Footer Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Footer Description</label>
                                            <input type="text" value="{{$setting['footer_description'] ?? ''}}" name="footer_description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone</label>
                                            <input type="text" value="{{$setting['phone'] ?? ''}}" name="phone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" value="{{$setting['email'] ?? ''}}" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Fax</label>
                                            <input type="text" value="{{$setting['fax'] ?? ''}}" name="fax" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Address</label>
                                            <input type="text" value="{{$setting['address'] ?? ''}}" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Copyright</label>
                                            <input type="text" value="{{$setting['copyright'] ?? ''}}" name="copyright" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Social Links</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Facebook</label>
                                            <input type="text" value="{{$setting['facebook'] ?? ''}}" name="facebook" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Instagram</label>
                                            <input type="text" value="{{$setting['instagram'] ?? ''}}" name="instagram" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Twitter</label>
                                            <input type="text" value="{{$setting['twitter'] ?? ''}}" name="twitter" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Linkedin</label>
                                            <input type="text" value="{{$setting['linkedin'] ?? ''}}" name="linkedin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Who we are?</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="who_we_are_image" data-default-file="{{ asset($setting['who_we_are_image'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <textarea name="who_we_are"   cols="8" rows="8" class="form-control">{{$setting['who_we_are'] ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Our Story Image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="our_story_image" data-default-file="{{ asset($setting['our_story_image'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Our Story Youtube Video ID</label>
                                                    <input type="text" value="{{$setting['our_story_video_id'] ?? ''}}" name="our_story_video_id" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Our Story Description</label>
                                                    <textarea name="our_story"   cols="8" rows="4" class="form-control">{{$setting['our_story'] ?? ''}}</textarea>
                                                </div>
                                            </div>
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

