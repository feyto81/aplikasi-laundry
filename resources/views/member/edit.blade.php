@extends('layouts.main')
@section('title','Edit Member | Laundry Application')
@section('css')

@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{$page_title}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">{{$page_sub_title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                
                <a href="{{route('admin.member.index')}}" class="button"><i class="bx bx-arrow-back label-icon"></i> &nbsp;&nbsp;Back To List User</a>
                <br>
                <br>
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="{{url('admin/member/update/'.$member->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="name" name="name" value="{{$member->name}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="phone_number" class="col-md-2 col-form-label">Phone Number</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" id="phone_number" name="phone_number" value="{{$member->phone_number}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Gender</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" name="gender">
                                                <option disabled selected>Select</option>
                                                <option value="L" @if($member->gender == 'L') selected @endif>Laki-Laki</option>
                                                <option value="P" @if($member->gender == 'P') selected @endif>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-md-2 col-form-label">Address</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="address" id="address" rows="3">{{$member->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert-form">
                                        <img src="{{asset('assets/images/info.png')}}" class="img-info-form">
                                        Mohon lengkapi form yang sudah di sediakan untuk dapat melanjutkan proses !
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('admin.member.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
@endpush