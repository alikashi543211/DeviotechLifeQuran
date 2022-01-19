@extends('layouts.admin')
@section('title','Schedule Requests')
@section('heading','Schedule Requests')
@section('css')

    <style>
        .waves-effect{
            overflow: unset!important;
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
                                    <th>Sr. #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Request Date</th>
                                    <th>Inquiry</th>
                                    <th>Status</th>
                                    <th class="float-right pr-2">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($inquiries as $inquiry)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">{{ $inquiry->user->name ?? 'N/A' }}</td>
                                        <td class="product-name">{{ $inquiry->user->email ?? 'N/A' }}</td>
                                        <td class="product-name">{{ $inquiry->user->phone ?? 'N/A' }}</td>
                                        <td class="product-category">{{ date('d-m-Y',strtotime($inquiry->created_at)) ?? 'N/A' }}</td>
                                        <td class="product-category text-capitalize">{{ $inquiry->study_type ?? 'N/A' }}</td>

                                        <td>
                                            <div class="chip chip-success">
                                                <div class="chip-body">
                                                    <div class="chip-text">{{ $inquiry->status }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-action text-right">
                                            <div class="btn-group">
                                                <a href="{{route('admin.student.inquiries.detail',[$inquiry->id,$inquiry->user->name])}}" class="btn btn-relief-primary" title="Detail">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- DataTable ends -->


                    </section>
                    <!-- END: Content-->

                </div>
            </div>
        </div>
    </div>


    @endsection
@section('js')

    <script>
        $(document).ready(function () {

            $('.dt-buttons.btn-group').css("display", "none");

        });
        </script>
    @endsection
