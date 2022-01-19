@extends('layouts.admin')
@section('title','Testimonials')
@section('heading','Testimonials')
@section('css')

    <style>
        .waves-effect{
            overflow: unset!important;
        }
        .data-field-col{
            margin-top: .5rem!important;
        }

    </style>

@endsection

@section('content')


    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">


                    <!-- BEGIN: Content-->
                    <section id="data-list-view" class="data-list-view-header">


                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table data-list-view">
                                <thead>
                                <tr>
                                    <th>Sr.#</th>
                                    <th>Name</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th class="float-right pr-2">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($lists as $list)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->review}}</td>
                                        <td>{{$list->rating}}</td>
                                        <td>
                                            <button type="button" class="btn btn-relief-danger float-right"  onclick="deleteAlert('{{route('admin.testimonials.delete',$list->id)}}')" title="Delete Testimonial">Delete</button>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


    @endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('.dt-buttons.btn-group').click(function () {
                $('.add-new-data').css("display", "none");
                let url = '{{route('admin.testimonials.add')}}';
                window.location.href = url;
            });
        });

    </script>

@endsection
