@extends('layouts.master')

@section('title')
    Kategori
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Daftar Kategori</li>
@endsection

@section('content')
<div class="container-fluid">
 
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <button onclick="addForm('{{ route('kategori.store') }}')" class="btn btn-success btn-flat float-right"><i class="nav-icon fa fa-plus-circle"></i> Tambah</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-stipe table-bordered">
                    <thead align="center">
                        <th scope="col" width="5%">No</th>
                        <th scope="col">Kategori</th>
                        {{-- <th scope="col">Dibuat</th>
                        <th scope="col">Diubah</th> --}}
                        <th scope="col" width="15%">Aksi <i class="nav-icon fa fa-cogs"></i></th>
                    </thead>
                </table>
            </div>
          </div>
        </div>
      </div>
  </div>

@include('kategori.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function (){
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax:{
                url: '{{ route('kategori.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama_kategori'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if(! e.preventDefault()){
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                .done((response) => {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Gagal menyimpan data');
                    return;
                })
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_kategori]').focus();
        
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_kategori]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_kategori]').val(response.nama_kategori);
            })
            .fail((errors) => {
                alert('Data tidak dapat ditampilkan');
                return;
            });
        
    }

    function deleteData(url) {
        if (confirm('Anda akan menghapus data. Yakin?')) {
                $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete'
            })
            .done((response) => {
                table.ajax.reload();
            })
            .fail((errors) => {
                alert('Tidak dapat menghapus data');
                return;
            });
        }
    }
</script>
    
@endpush