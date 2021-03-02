@extends('layouts.main')
@section('title','Management User | Laundry Application')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
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
                <a href="{{route('admin.cms_users.create')}}" class="btn btn-success waves-effect btn-label waves-light"><i class="bx bxs-plus-square label-icon"></i> Add</a>
            </div>
        </div>
        <br>
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
                                    @if ($row->photo == NULL)
                                    <td><span class="badge rounded-pill bg-danger">Emtpy</span></td>
                                    @else
                                    <td><img class="rounded-circle avatar-xs" src="{{ url('/avatar/'.$row->photo) }}"></td>
                                    @endif
                                    
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td><span class="badge rounded-pill bg-primary">{{$row->Outlet->name}}</span></td>
                                    <td><span class="badge rounded-pill bg-info">{{$row->Level->name}}</span></td>
                                    @if ($row->status == 1)
                                    <td>
                                        <span class="badge rounded-pill bg-success">Active</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="badge rounded-pill bg-danger">Unactive</span>
                                    </td>
                                    @endif
                                    
                                    <td>
                                        <a title="Detail User" id="set_dtl"
                                        data-bs-toggle="modal" data-bs-target="#modal-detail"
                                        data-username="{{$row->username}}"
                                        data-name="{{$row->name}}"
                                        data-email="{{$row->email}}"
                                        data-outlet="{{$row->Outlet->name}}"
                                        data-privilege="{{$row->Level->name}}"
                                        data-photo="{{$row->photo}}" 
                                        data-status="{{$row->status}}"
                                        data-created="{{$row->created_at}}"
                                        data-updated="{{$row->updated_at}}" 
                                        class="btn btn-secondary btn-rounded waves-effect waves-light">
                                            <i class="bx bx-bullseye font-size-16 align-middle"></i>
                                        </a>
                                        @if ($row->status == 0)
                                        <a href="{{url('admin/cms_users/active/'.$row->id)}}" class="btn btn-success btn-rounded waves-effect waves-light">
                                            <i class="bx bxs-hand-down font-size-16 align-middle"></i>
                                        </a>
                                        @else
                                        <a href="{{url('admin/cms_users/unactive/'.$row->id)}}" class="btn btn-danger btn-rounded waves-effect waves-light">
                                            <i class="bx bxs-hand-up font-size-16 align-middle"></i>
                                        </a>
                                        @endif
                                       
                                        <a href="{{url('admin/cms_users/edit/'.$row->id)}}" class="btn btn-danger btn-rounded waves-effect waves-light">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-warning btn-rounded waves-effect waves-light btn-delete" title="Delete Data" user-id="{{$row->id}}">
                                            <i class="bx bx-trash-alt font-size-16 align-middle"></i>
                                        </a>
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
<div id="modal-detail" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">User Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="sampleTable">
                  <tbody>
                    
                    <tr>
                      <th style="width: 35%">Username</th>
                      <td><span id="username"></span></td>
                    </tr>
                    <tr>
                      <th style="">Name</th>
                      <td><span id="name"></span></td>
                    </tr>
                    <tr>
                      <th style="">Email</th>
                      <td><span id="email"></span></td>
                    </tr>
                    <tr>
                      <th style="">Outlet</th>
                      <td><span id="outlet"></span></td>
                    </tr>
                    <tr>
                      <th style="">Privilege</th>
                      <td><span id="privilege"></span></td>
                    </tr>
                    <tr>
                      <th style="">Status</th>
                      <td><span id="status"></span></td>
                    </tr>
                    <tr>
                        <th style="">Photo</th>
                        <td><img class="avatar-lg" widht="140px" src="" id="img-data"></td>
                    </tr>
                    <tr>
                        <th style="">Created</th>
                        <td><span id="created"></span></td>
                    </tr>
                    <tr>
                        <th style="">Updated</th>
                        <td><span id="updated"></span></td>
                    </tr>
                  </tbody>
                </table>
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
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script> 
<script>
    $('.btn-delete').click(function(){
        var user_id = $(this).attr('user-id');
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mt-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass:"btn btn-success mt-2",
        cancelButtonClass:"btn btn-danger ms-2 mt-2",
        buttonsStyling:!1}).then((result) => {
        if (result.isConfirmed) {
            window.location = "{{url('admin/cms_users/delete')}}/"+user_id+"";
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    });
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var username = $(this).data('username');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var privilege = $(this).data('privilege');
            var outlet = $(this).data('outlet');
            var status = $(this).data('status');
            var photo = $(this).data('photo');
            var created = $(this).data('created');
            var updated = $(this).data('updated');
            $('#username').text(username);
            $('#name').text(name);
            $('#email').text(email);
            $('#privilege').text(privilege);
            $('#outlet').text(outlet);
            $('#created').text(created);
            $('#updated').text(updated);
            $('#img-data').attr('src', "{{asset('avatar/')}}/"+photo);

        })
    })
</script>
@endpush