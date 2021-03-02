@extends('layouts.main')
@section('title','Management User | Laundry Application')
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
                
                <a href="{{route('admin.cms_users.index')}}" class="button"><i class="bx bx-arrow-back label-icon"></i> &nbsp;&nbsp;Back To List User</a>
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
            <form action="{{route('admin.cms_users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-md-2 col-form-label">Username</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="username" name="username" value="{{old('username')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-md-2 col-form-label">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="password" class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="password" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="photo" class="col-md-2 col-form-label">Photo</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="file" id="photo" name="photo">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="outlet_id" class="col-md-2 col-form-label">Outlet</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" id="outlet_id" name="outlet_id">
                                                <option disabled selected>Select</option>
                                                @foreach ($outlet as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="outlet_id" class="col-md-2 col-form-label">Privilege</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" id="level_id" name="level_id">
                                                <option disabled selected>Select</option>
                                                @foreach ($level as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label  class="col-md-2 col-form-label">Status</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" name="status">
                                                <option disabled selected>Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Unactive</option>
                                            </select>
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
                                    <button name="submit" type="submit" class="btn btn-primary" value="save">Save</button>
                                    <button name="submit" type="submit" class="btn btn-primary" value="more">Save & More</button>
                                    <a href="{{route('admin.cms_users.index')}}" class="btn btn-danger">Cancel</a>
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