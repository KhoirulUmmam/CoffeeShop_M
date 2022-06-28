<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_produk" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Produk</label>
                        <div class="col-md-8 mt-2">
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Kategori</label>
                        <div class="col-md-8 mt-2">
                           <select name="id_kategori" id="id_kategori" class="form-control" required>
                               <option value="">Pilih Kategori</option>
                               @foreach ($kategori as $key => $item)
                                   <option value="{{ $key }}">{{ $item }}</option>
                               @endforeach
                           </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="merk" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label">Merk</label>
                        <div class="col-md-8 mt-2">
                            <input type="text" name="merk" id="merk" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Harga Beli</label>
                        <div class="col-md-8 mt-2">
                            <input type="text" name="harga_beli" id="harga_beli" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Harga Jual</label>
                        <div class="col-md-8 mt-2">
                            <input type="text" name="harga_jual" id="harga_jual" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Diskon</label>
                        <div class="col-md-8 mt-2">
                            <input type="text" name="diskon" id="diskon" class="form-control" required value="0">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Stok</label>
                        <div class="col-md-8 mt-2">
                            <input type="text" name="stok" id="stok" class="form-control" required value="0">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-flat btn-primary">Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>   
    </div>
</div>