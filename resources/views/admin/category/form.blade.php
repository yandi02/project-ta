<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5"></h5>
                </div>
                <div class="modal-body" >
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-md-offset-1 control-label pt-2">Nama Kategori</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control" required
                                autofocus>
                            <span class="help-block with-errors" style="margin-bottom: 0%"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-outline-danger" onclick="closeForm()">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function closeForm() {
        $('#modal-form').modal('hide');
    }
</script>
