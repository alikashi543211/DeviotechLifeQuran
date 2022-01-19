@extends('layouts.student')
@section('title', 'New Inquiry')
@section('content')


    <div class="card shadow rounded border-0 overflow-hidden">
        <div class="card-header">
            <h5>New Inquiry</h5>
        </div>
        <form method="post" action="{{route('student.inquiry.store')}}">
            @csrf
            <input type="hidden" name="time_zone" id="time_zone">
            <input type="hidden" name="student_id" value="{{auth()->user()->id}}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <div class="form-icon position-relative">
                                <select class="select2 form-select form-control  @error('study_type') is-invalid @enderror" multiple="multiple" name="study_type[]" required="required" aria-label="Default select example">
                                    <option selected value="nazra">Nazra</option>
                                    <option value="hifz">Hifz</option>
                                    <option value="tajweed">Tajweed</option>
                                </select>
                            </div>
                            @error('study_type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row mt-4 justify-content-center">
                    <div class="col-sm-4">
                        <button type="submit"  class="btn btn-primary">Inquiry Submit</button>
                    </div>
                </div>
            </div>
        </form>

    </div>


    @endsection
    @section('js')
        <script>
            $(document).ready(function () {

                var d = new Date();
                var n = d.getTimezoneOffset();

                $('#time_zone').val(n);

            });
        </script>

    @endsection
