@extends('layouts.master')

@section('title')
    Transaksi Pembelian
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Transaksi Pembelian</li>
@endsection

@section('content')
<div class="container-fluid">
 
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <table>
								<tr>
									<td>Supplier</td>
									<td>: {{ $supplier->nama }}</td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td>: {{ $supplier->telepon }}</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>: {{ $supplier->alamat }}</td>
								</tr>
							</table>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
							
							<form class="form-produk">
								@csrf
								<div class="form-group row">
									<label for="kode_produk" class="col-lg-2">Kode Produk</label>
									<div class="col-lg-5">
										<div class="input-group">
											<input type="hidden" name="id_pembelian" id="id_pembelian" value="{{ $id_pembelian }}">
											<input type="hidden" name="id_produk" id="id_produk">
											<input type="text" class="form-control" name="kode_produk" id="kode_produk">
											<span class="input-group-btn">
												<button onclick="tampilProduk()" class="btn btn-info btn-flat" type="button"><i class="nav-icon fa fa-arrow-right"></i></button>
											</span>
										</div>
									</div>
								</div>
							</form>
                <table class="table table-striped table-bordered">
                        <thead align="center">
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Total Item</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col" width="15%">Aksi <i class="nav-icon fa fa-cogs"></i></th>
                        </thead>
                </table>
            </div>
          </div>
        </div>
      </div>
  </div>

@include('pembelian_detail.produk')
@endsection

@push('scripts')
<script>
    let table;

    $(function (){
        table = $('.table').DataTable({
            
        });
    });

    function tampilProduk() {
        $('#modal-produk').modal('show');
    }

		function hideProduk() {
        $('#modal-produk').modal('hide');
    }

    function pilihProduk(id, kode) {
			$('#id_produk').val(id);
			$('#kode_produk').val(kode);
			hideProduk();
			tambahProduk();
			
		}

		function tambahProduk(){
			$.post('{{ route('pembelian_detail.store') }}', $('.form-produk').serialize())
				.done(response =>{
					$('#kode_produk').focus();
				})
				.fail(errors => {
					alert('Tidak dapat menyimpan data!');
				});
		}

    function deleteData(url) {
        
    }
</script>
    
@endpush