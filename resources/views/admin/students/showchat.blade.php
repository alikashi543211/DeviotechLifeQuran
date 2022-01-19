@extends('layouts.admin')
@section('title','Students List')
@section('heading','Students List')
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
                                    <th>&nbsp; Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Category</th>
                                      <th>Priorirty</th>
                                        <th>Object</th>
                                          <th>Message</th>
                                            <th>CREATED</th>
                                    <th>Status</th>
                                    <th class="float-right">ACTION &nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>



                                    @forelse($chats_users as $user)
                                    @if($user->user->role!='admin')
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                         {{--  <td>{{ $user->student_id}}</td>  --}}
                                         <td>{{ $user->user->name }}</td>
                                          <td>{{ $user->user->email }}</td>

                                        <td >{{ $user->category }}</td>
                                        <td >{{ $user->priorirty }}</td>

                                        <td>{{ $user->object }}</td>
<td>{{ $user->message }}</td>
     <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="chip chip-success">
                                                <div class="chip-body">
                                                    <div class="chip-text">{{ $user->status }}</div>
                                                </div>
                                            </div>

                                       </td>

                                        <td class="product-action text-right">
                                            <div class="btn-group">

                                                @if($user->status=='open')
                                                    <button type="button"  data-id="{{$user->id}}" title="Block" class="btn btn-relief-info block"><span>Close</span></button>
                                                @else
                                                    <button type="button" onclick="unblockAlert('{{route('admin.student.unblock',$user->id)}}')" title="close" class="btn btn-relief-success"><span>Open</span></button>
                                                @endif
                                                 <a  href="{{route('admin.student.ticket',$user->id)}}" title="Response" class="btn btn-info "><span>Response</span></a>
                                                <button type="button" onclick="deleteAlert('{{route('admin.student.delete',$user->id)}}')" title="Trash" class="btn btn-relief-danger alert-confirm"><span>Delete</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                       @endif
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

