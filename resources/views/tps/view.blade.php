@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{!! url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
@endsection
@section('content')

    <div class="modal fade" id="create-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah TPS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kelurahan</label>
                        <input type="text" class="form-control" readonly value="{!! $kelurahan->nama !!}">
                    </div>

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-save-create">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit TPS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="e_id">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="e_nama">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-save-edit">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data TPS</h3>

            <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#create-modal" class="btn btn-tool"
                        title="Tambah TPS">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="myTable">
                <thead>
                <tr>
                    <th width="1%">No.</th>
                    <th width="20%">Nama</th>
                    <th width="5%">Option</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="card-footer">
            Footer
        </div>

    </div>
@endsection
@section('js')

    <script src="{!! url('admin/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
    <script>
        $(function () {


            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });

        var kelurahan_id = "{!! $kelurahan->id !!}"

        getAll()

        $(document).on('click', '.btn-delete', function () {
            var id = $(this).data('id')

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    del(id)
                }
            })
        })

        function del(id) {
            $.ajax({
                url: '{{ url('tps/delete?id') }}=' + id,
                type: 'get',
                success: function (d) {
                    if (d == 'success') {
                        Swal.fire({
                            title: "Done !",
                            text: "Hapus data berhasil !",
                            type: "success",
                            timer: 1500
                        }).then(okay => {
                            if (okay) {
                                getAll();
                            }
                        });
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Data gagal terhapus !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
        }

        $(document).on('click', '.btn-edit', function () {
            $('#e_id').val($(this).data('id'))
            $('#e_nama').val($(this).data('nama'))
            $('#edit-modal').modal('show')
        })

        $(document).on('click', '#btn-save-edit', function () {
            $.ajax({
                type: 'POST',
                url: "{!! url('tps/edit') !!}",
                data: {
                    id: $('#e_id').val(),
                    nama: $('#e_nama').val()
                },
                success: function (r) {
                    $('#edit-modal').modal('hide')
                    $('#e_nama').val('')
                    if (r == 'success') {
                        Swal.fire({
                            title: "Done !",
                            text: "Simpan data berhasil !",
                            type: "success",
                            timer: 1500
                        }).then(okay => {
                            if (okay) {
                                getAll();
                            }
                        });
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Data gagal tersimpan !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })
        })

        $(document).on('click', '#btn-save-create', function () {
            $.ajax({
                type: 'POST',
                url: "{!! url('tps/create') !!}",
                data: {
                    nama: $('#nama').val(),
                    kelurahan_id : kelurahan_id
                },
                success: function (r) {
                    $('#create-modal').modal('hide')
                    $('#nama').val('')
                    if (r == 'success') {
                        Swal.fire({
                            title: "Done !",
                            text: "Simpan data berhasil !",
                            type: "success",
                            timer: 1500
                        }).then(okay => {
                            if (okay) {
                                getAll();
                            }
                        });
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Data gagal tersimpan !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })
        })




        function getAll() {
            $.ajax({
                type: 'get',
                url: "{!! url('tps/get-all?kelurahan_id=') !!}"+kelurahan_id,
                success: function (r) {
                    console.log(r)
                    var data = []
                    var no = 1;
                    $.each(r.tps, function (i, d) {
                        var btn_edit = '<button class="btn btn-warning btn-xs btn-edit" data-id="' + d.id + '" data-nama="' + d.nama + '"><i class="fa fa-edit"></i></button>'
                        var btn_delete = '<button class="btn btn-danger btn-xs btn-delete" data-id="' + d.id + '"><i class="fa fa-trash"></i></button>'
                        data.push([
                            no++,
                            d.nama,
                            btn_edit + ' ' + btn_delete
                        ])
                    })

                    $("#myTable").dataTable().fnDestroy()
                    $("#myTable").DataTable({
                        'data': data,
                        "responsive": true,
                        "autoWidth": false,
                    });
                }
            })
        }


    </script>
@endsection
