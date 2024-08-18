<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="productForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5"></h5>
                    <div class="row justify-content-end mr-1">
                        <div class="col-sm-2">
                            <h5 class="sku-title fs-5 mt-2"></h5>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="sku" id="sku" class="form-control col-sm-5" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-body border-top">
                    <div class="form-group row">
                        {{-- <div class="col-md-6">
                            <label for="user_id" class="form-label">Admin</label>
                            <select name="user_id" id="user_id" class="form-control form-select" required>
                                <option value="">Pilih User</option>
                                @foreach ($users as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-md-6">
                            <label for="foto_produk" class="form-label">Foto</label>
                            <input type="file" name="foto_produk" id="foto_produk" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="category" class="form-label">Kategori</label>
                            <select name="category" class="form-control form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="sale_price" class="form-label">Harga Diskon</label>
                            <input type="number" name="sale_price" id="sale_price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                        {{-- <div class="col-md-6">
                            <label for="stock_status" class="form-label">Stok Status</label>
                            <select class="form-select" name="stock_status">
                                @foreach (Modules\Shop\App\Models\Product::STOCK_STATUSES as $status => $label)
                                    <option value="{{ $status }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeForm()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
