@extends('layouts.admin')
@section('title','Tutors Detail')
@section('heading','Tutors Detail')
@section('css')

    <style>
        .page-users-view table td {
            padding-bottom: 0.8rem;
            min-width: 140px;
            word-break: break-word;
        }
    </style>

@endsection
@section('content')



    <section class="page-users-view">
        <div class="row">
            <!-- account start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Account</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="users-view-image" style="width: 150px;height: 150px;">
                                <img src="{{asset($user->avatar)}}" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" style="width: 150px!important;" alt="avatar">
                            </div>
                            <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Name</td>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Email</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Phone</td>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-12 col-lg-5">
                                <table class="ml-0 ml-sm-0 ml-lg-0">
                                    <tbody><tr>
                                        <td class="font-weight-bold">Status</td>
                                        <td>{{$user->status}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Role</td>
                                        <td>{{$user->role}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Member Since</td>
                                        <td>{{date('d-m-Y',strtotime($user->created_at))}}</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="col-12">
                                <div class="btn-group mt-2">
                                    <a href="{{route('admin.tutors.edit',$user->id)}}" class="btn btn-relief-secondary" title="Edit Tutor"><i class="fa fa-edit mr-1"></i>Edit</a>
                                    @if($user->status=='active')
                                        <button type="button" class="btn btn-relief-info block-tutor waves-effect waves-light"><i class="fa fa-ban"></i> Block</button>
                                    @elseif($user->status=='inactive' || $user->status=='pending')
                                        <button type="button" onclick="unblockAlert('{{route('admin.tutor.unblock',$user->id)}}')" class="btn btn-relief-success   waves-effect waves-light"><i class="fa fa-check-circle " style="margin-right: 5px;"></i>Active</button>
                                    @endif
                                    @if($user->status=='pending')
                                        <button type="button" class="btn btn-relief-danger reject-tutor   waves-effect waves-light"><i class="fa fa-times" style="margin-right: 5px;"></i> Reject</button>
                                    @endif
                                    <button  type="button" onclick="deleteAlert('{{route('admin.tutor.delete',$user->id)}}')" title="Trash" class="btn btn-relief-danger waves-effect waves-light"><i class="feather icon-trash-2"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- account end -->

            <div class="col-md-6 col-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">Information</div>
                    </div>
                    <div class="card-body">
                        <table>
                            <tbody><tr>
                                <td class="font-weight-bold">Birth Date </td>
                                <td>28 January 1998
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Mobile</td>
                                <td>+65958951757</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Salary</td>
                                <td>{{number_format($user->profile->salary,2)}} <a href="#" class=" edit-salary" data-salary="{{$user->profile->salary}}" title="Edit Salary"><i class="fa fa-pencil ml-1 " style="font-size: 17px"></i></a>  </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Languages</td>
                                <td>English, Arabic
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Gender</td>
                                <td>female</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Contact</td>
                                <td>email, message, phone
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Edit Salary-->
    <div class="modal fade" id="update_salary" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Tutor Salary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="reject-form" action="{{route('admin.tutor.salary.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}" id="user_id">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="">
                                <label>Tutor Salary</label>
                                <input type="number" min="0" step=".02" name="salary" required value="{{$user->profile->salary}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success ">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Salary-->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Describe Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="submit-form" action="{{route('admin.tutor.block')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}" id="user_id">
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

    <div class="modal fade" id="reject-tutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Describe Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="reject-form" action="{{route('admin.tutor.reject')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}" id="user_id">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="">
                                <textarea  rows="6" cols="8" placeholder="Reject Reason" name="block_reason" class="form-control reject-reason" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success reject-submit">Reject</button>
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


            $('.block-tutor').click(function () {

                $('.block-reason').val(' ');
                $('#exampleModalCenter').modal('show');
            });
            $('.reject-tutor').click(function () {

                $('.reject-reason').val(' ');
                $('#reject-tutor').modal('show');

            });
            $('.edit-salary').click(function () {

                $('#update_salary').modal('show');

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

            $('.reject-submit').click(function (e) {

                e.preventDefault();
                let reason=$('.reject-reason').val();

                if(reason==' ' || reason=='')
                {
                    toastr.error("Please describe reason to reject the tutor");
                }
                else
                {
                    $('#reject-form').submit();
                }
            });

        });
    </script>

@endsection
