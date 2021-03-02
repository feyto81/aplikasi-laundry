@extends('layouts.main')
@section('title','Management User | Laundry Application')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
                <a class="btn btn-success waves-effect btn-label waves-light"><i class="bx bxs-plus-square label-icon"></i> Add</a>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Outlet</th>
                                <th>Privilege</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($user as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->photo}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td><span class="badge rounded-pill bg-success">{{$row->Outlet->name}}</span></td>
                                    <td><span class="badge rounded-pill bg-info">{{$row->Level->name}}</span></td>
                                    @if ($row->status == 1)
                                    <td>
                                        <span class="badge rounded-pill bg-primary">Active</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="badge rounded-pill bg-primary">Unactive</span>
                                    </td>
                                    @endif
                                    
                                    <td>
                                        <a href="" class="btn btn-danger btn-rounded waves-effect waves-light"><i class="bx bx-edit font-size-16 align-middle"></i></a>
                                        <a href="" class="btn btn-warning btn-rounded waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>   
@endpush