@extends('layouts.master')

@section('title')
    Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Produk</li>
@endsection

@section('content')
<div class="container-fluid">
 
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="btn-group float-right">
                  <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success btn-flat"><i class="nav-icon fa fa-plus-circle"></i> Tambah</button>
                  <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')" class="btn btn-danger btn-flat"><i class="nav-icon fa fa-trash"></i> Hapus</button>
                  <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')" class="btn btn-primary btn-flat"><i class="nav-icon fa fa-barcode"></i> Cetak Barcode</button>

              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <form action="" method="post" class="form-produk">
                    @csrf
                    <table class="table table-stipe table-bordered">
                        <thead align="center">
                            <th>
                                <input type="checkbox" name="select_all" id="select_all">
                            </th>
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Stok</th>
                            {{-- <th scope="col">Dibuat</th>
                            <th scope="col">Diubah</th> --}}
                            <th scope="col" width="15%">Aksi <i class="nav-icon fa fa-cogs"></i></th>
                        </thead>
                    </table>
                </form>
            </div>
          </div>
        </div>
      </div>
  </div>

@include('produk.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function (){
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax:{
                url: '{{ route('produk.data') }}',
            },
            columns: [
                {data: 'select_all'},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'nama_kategori'},
                {data: 'merk'},
                {data: 'harga_jual'},
                {data: 'harga_beli'},
                {data: 'diskon'},
                {data: 'stok'},
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
        $('#modal-form .modal-title').text('Tambah Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_produk]').focus();
        
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_produk]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_produk]').val(response.nama_produk);
                $('#modal-form [name=id_kategori]').val(response.id_kategori);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=harga_beli]').val(response.harga_beli);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=diskon]').val(response.diskon);
                $('#modal-form [name=stok]').val(response.stok);
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

    function deleteSelected(url) {
        if ($('input:checked').length >1) {
                if (confirm('Apakah Anda yakin untuk menghapus data yang dipilih?')) {
                    $.post(url, $('.form-produk').serialize())
                        .done((response) => {
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menghapus data!');
                            return;
                        });
            }
        } else{
            alert('Silahkan pilih data terlebih dahulu yang ingin dihapus!');
            return;
        }
    }

    function cetakBarcode(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih terlebih dahulu data yang ingin Anda cetak!');
            return;
        } else if ($('input:checked').length < 3) {
            alert('Pilih minimal 3 data untuk dicetak');
                return;
        } else {
            $('.form-produk').attr('target', '_blank').attr('action', url).submit();
        }
    }
</script>
    
@endpush