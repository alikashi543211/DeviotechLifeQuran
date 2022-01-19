@extends('layouts.admin')
@section('title','Pending Payments')
@section('heading','Pending Payments')


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
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Paid Date</th>
                                    <th>Status</th>
                                    <th class="float-right pr-2">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">{{ $payment->user->name ?? 'N/A' }}</td>
                                        <td class="product-name">{{ $payment->user->email ?? 'N/A' }}</td>
                                        <td class="product-name">${{ $payment->amount ?? 'N/A' }}</td>
                                        <td class="product-name">{{ $payment->pay_date ?? 'N/A' }}</td>
                                        <td class="product-name"><span class="badge badge-danger">{{$payment->status}}</span> </td>

                                        <td class="product-action text-right">
                                            <div class="btn-group">
                                                <a href="{{route('admin.student.inquiries.detail',[$payment->inquiry_id,$payment->user->name])}}" class="btn btn-relief-primary" title="Detail">Detail</a>
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
