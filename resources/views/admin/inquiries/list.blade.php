@extends('layouts.admin')
@section('title','Inquiries List')
@section('heading','Inquiries List')
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
                                    <th>Sr.#</th>
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
                                            <div class="chip

                                             @if($inquiry->status=='rejected' || $inquiry->status=='cancel' ) chip-danger
                                             @elseif($inquiry->status=='pending' )chip-primary
                                             @else chip-success @endif
                                                ">
                                                <div class="chip-body">
                                                    <div class="chip-text">{{ $inquiry->status }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-action text-right">
                                            <div class="btn-group">
                                                <a href="{{route('admin.student.inquiries.detail',[$inquiry->id,$inquiry->user->name])}}" class="btn btn-relief-primary" title="Detail">Detail</a>
                                                <button type="button" onclick="deleteAlert('{{route('admin.student.inquiries.delete',$inquiry->id)}}')" title="Trash" class="btn btn-relief-danger alert-confirm"><span>Delete</span></button>
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



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Describe Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="submit-form" action="{{route('admin.student.block')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="user_id">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="">
                                <textarea  rows="6" cols="8" placeholder="Block Reason" name="block_reason" class="form-control block-reason" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success block-submit">Block</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')

    <script>
        $(document).ready(function () {

            $('.dt-buttons.btn-group').css("display", "none");
            $('.block').click(function () {

                let id=$(this).data('id');
                $('#user_id').val(id);
                $('.block-reason').val(' ');

                $('#exampleModalCenter').modal('show');

            });

        });
    </script>
    <script>
        $(document).ready(function () {

            $('.block-submit').click(function (e) {

                e.preventDefault();
                let reason=$('.block-reason').val();

                if(reason==' ' || reason=='')
                {
                    toastr.error("Please describe reason to block the tutor");
                }
                else
                {
                    $('#submit-form').submit();
                }


            });

        });
    </script>

@endsection


