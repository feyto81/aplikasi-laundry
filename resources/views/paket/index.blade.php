@extends('layouts.main')
@section('title','Paket | Laundry Application')
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
                <a href="{{route('admin.paket.create')}}" class="btn btn-success waves-effect btn-label waves-light"><i class="bx bxs-plus-square label-icon"></i> Add</a>
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
                                <th>Outlet</th>
                                <th>Type</th>
                                <th>Paket Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($paket as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->Outlet->name}}</td>
                                    
                                    @if ($row->type == "kiloan")
                                        <td><span class="badge rounded-pill bg-success">Kiloan</span></td>
                                    @elseif($row->type == "selimut")
                                        <td><span class="badge rounded-pill bg-success">Selimut</span></td>
                                    @elseif($row->type == "bed_cover")
                                        <td><span class="badge rounded-pill bg-success">Bed Cover</span></td>
                                    @elseif($row->type == "kaos")
                                        <td><span class="badge rounded-pill bg-success">Kaos</span></td>
                                    @else
                                        <td><span class="badge rounded-pill bg-success">Lain</span></td>
                                    @endif
                                    <td>{{$row->paket_name}}</td>
                                    <td>@currency($row->price)</td>
                                    <td>
                                        <a title="Detail Paket" id="set_dtl"
                                        data-bs-toggle="modal" data-bs-target="#modal-detail"
                                        data-outlet="{{$row->Outlet->name}}"
                                        data-type="{{$row->type}}"
                                        data-paket_name="{{$row->paket_name}}"
                                        data-price="@currency($row->price)"
                                        data-created="{{$row->created_at}}"
                                        data-updated="{{$row->updated_at}}" 
                                        class="btn btn-secondary btn-rounded waves-effect waves-light">
                                            <i class="bx bx-bullseye font-size-16 align-middle"></i>
                                        </a>
                                        <a href="{{url('admin/paket/edit/'.$row->id)}}" class="btn btn-danger btn-rounded waves-effect waves-light">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-warning btn-rounded waves-effect waves-light btn-delete" title="Delete Data" paket-id="{{$row->id}}">
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
                <h5 class="modal-title mt-0" id="myModalLabel">Paket Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="sampleTable">
                  <tbody>
                    <tr>
                      <th style="">Outlet</th>
                      <td><span id="outlet"></span></td>
                    </tr>
                    <tr>
                        <th style="">Type</th>
                        <td><span id="type"></span></td>
                    </tr>
                    <tr>
                        <th style="">Paket Name</th>
                        <td><span id="paket_name"></span></td>
                    </tr>
                    <tr>
                        <th style="">Price</th>
                        <td><span id="price"></span></td>
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
        var paket_id = $(this).attr('paket-id');
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
            window.location = "{{url('admin/paket/delete')}}/"+paket_id+"";
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
            var outlet = $(this).data('outlet');
            var type = $(this).data('type');
            var paket_name = $(this).data('paket_name');
            var price = $(this).data('price');
            var created = $(this).data('created');
            var updated = $(this).data('updated');
            $('#outlet').text(outlet);
           
            $('#type').text(type);
            $('#paket_name').text(paket_name);
            $('#price').text(price);
            $('#created').text(created);
            $('#updated').text(updated);
        })
    })
</script>
@endpush