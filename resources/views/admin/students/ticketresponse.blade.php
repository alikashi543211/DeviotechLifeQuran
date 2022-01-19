@extends('layouts.admin')
@section('title', 'New Inquiry')
@section('css')
  <link href="{{asset('admin/summarnote/summernote.min.css')}}" rel="stylesheet">
  @endsection
@section('content')


    <div class="card shadow rounded border-0 overflow-hidden "  >
        <div class="card-header">
            <h5>Ticket Support System</h5>
        </div>
        <form method="post" action="{{route('admin.ticket.response',$chats_users->id)}}">
            @csrf

<input value="{{ $chats_users->student_id }}" hidden name="user_id" type="text">
            <div class="card-body ">
                <div class="row justify-content-center">
                    <div class="col-lg-9 justify-content-center">
                        <div class="mb-4">
                            <div class="form-icon position-relative">
                                <select class="form-control  @error('category') is-invalid @enderror"  name="category" required="required" aria-label="Default select example">
                                     <option  disabled selected value="">Select-category</option>
                                    <option  value="Support">Support</option>
                                    <option value="Abuse">Abuse</option>
                                    <option value="Inquiry">Inquiry</option>
                                    <option value="Billing">Billing</option>
                                </select>
                            </div>
                            @error('category')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                          <div class="mb-4">
                            <div class="form-icon position-relative">
                                <select class="form-control  @error('priorirty') is-invalid @enderror"  name="priorirty" required="required" >
                                     <option  disabled selected value="">Select-priorirty</option>
                                    <option  value="low">low</option>
                                    <option value="medium">medium</option>
                                    <option value="high">high</option>

                                </select>
                            </div>
                            @error('priorirty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                          <div class="mb-4">
                            <div class="form-icon position-relative">
                                <input class="form-control  @error('object') is-invalid @enderror"  name="object"  placeholder="Write your objectives..." >
                            </div>
                            @error('object')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

{{--
                          <div class="mb-4">
                            <div class="form-icon position-relative">
                                <select class="form-control  @error('priorirty') is-invalid @enderror"  name="status" required="required" >
                                     <option  disabled selected value="">Select-status</option>
                                    <option  value="close">Close</option>
                                    <option value="open">Open</option>
                                </select>
                            </div>
                            @error('priorirty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>  --}}
                        <div class="mb-4">
                            <div class="form-icon position-relative">
                                <textarea class="form-control  @error('message') is-invalid @enderror" id="summernote" name="message"  placeholder="Write your objectives..." ></textarea>
                            </div>
                            @error('message')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row  justify-content-center">
                    <div class="col-sm-4">
                        <button type="submit"  class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </form>

    </div>


    @endsection
    @section('js')


    <script src="{{asset('admin/summarnote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function () {

$('#summernote').summernote('code', '');





        });
    </script>
        <script>
            $(document).ready(function () {

                var d = new Date();
                var n = d.getTimezoneOffset();

                $('#time_zone').val(n);

            });
        </script>

    @endsection
