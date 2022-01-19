@extends('layouts.admin')
@section('title', 'Add Testimonial')

@section('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

@endsection
@section('content')
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Testimonial</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('admin.testimonials.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" id="first-name-column" required class="form-control" placeholder="Name" name="name" value="">
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="text" id="review_date" required class="form-control datepicker" name="date" value="">
                                                @error('date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" id="image" required class="form-control" placeholder="Image" name="image" value="">
                                                @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label>Review</label>
                                                <textarea name="review" id="review" class="form-control" required rows="5" name="review"></textarea>
                                                @error('review')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label>Rating</label><br>
                                                <fieldset class="rating-stars">
                                                    <input type="radio" id="star5" name="rating" value="5"/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4.5"/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4"/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3.5"/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3"/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2.5"/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2"/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1.5"/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-12">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a class="btn btn-danger" href="{{route('admin.testimonials')}}">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Floating Label Form section end -->
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

        });

    </script>
@endsection
