@extends('layouts.master')

@section('title')
    Konsumen
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Konsumen</li>
@endsection

@section('content')
<div class="container-fluid">
 
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                {{-- <button onclick="cetakKonsumen('{{ route('konsumen.cetak_konsumen') }}')" class="btn btn-info btn-flat float-right"><i class="nav-icon fa fa-id-card"> Cetak Kartu</i></button> --}}
              <button onclick="addForm('{{ route('konsumen.store') }}')" class="btn btn-success btn-flat float-right"><i class="nav-icon fa fa-plus-circle"></i> Tambah</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-stipe table-bordered">
                    <form action="" method="post" class="form-konsumen">
                        @csrf
                        <thead align="center">
                            <th width="5%">
                                <input type="checkbox" name="select_all" id="select_all">
                            </th>
                            <th scope="col" width="5%">No</th>
                            <th scope="col" width="15%">Kode Konsumen</th>
                            <th scope="col">Konsumen</th>
                            <th scope="col">Telepon</th>
                            <th scope="col" width="15%">Aksi <i class="nav-icon fa fa-cogs"></i></th>
                        </thead>
                    </form>
                </table>
            </div>
          </div>
        </div>
      </div>
  </div>

@include('konsumen.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function (){
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax:{
                url: '{{ route('konsumen.data') }}',
            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_konsumen'},
                {data: 'nama'},
                {data: 'telepon'},
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
                });
            }
        });

        $('[name=select_all]').on('click', function(){
            $(':checkbox').prop('checked', this.checked);
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Konsumen');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama]').focus();
        
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Konsumen');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama]').val(response.nama);
                $('#modal-form [name=telepon]').val(response.telepon);
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

    function cetakKonsumen(url) {
        if($('input:checked').length < 1){
            alert('Pilih data yang ingin Anda cetak!');
            return;
        } else {
            $('.form-konsumen').attr('target', '_blank').attr('action', url).submit();
        }
    }
</script>
    
@endpush