<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="deskripsi" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Jenis Pengeluaran</label>
                        <div class="col-md-8 mt-2">
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nominal" class="col-md-2 col-md-offset-1 mt-3 ml-3 form-label" >Nominal</label>
                        <div class="col-md-8 mt-2">
                            <input type="number" name="nominal" id="nominal" class="form-control" required autofocus>
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