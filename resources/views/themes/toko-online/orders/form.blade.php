<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row justify-content-end" style="width: 100%;">
                        <div class="col-sm-9">
                            <h5 class="modal-title fs-5 mt-1"></h5>
                        </div>
                        <div class="col-sm-3">
                            @if (auth()->user())
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="text" value="{{ auth()->user()->name }}"
                                    class="form-control col-sm-12 text-center" disabled>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-2">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" readonly disabled required>
                        </div>
                        <div class="col-md-6">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" name="label" id="label" class="form-control"
                                placeholder="Rumah/Kantor" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-md-6">
                            <label for="province" class="form-label">Provinsi</label>
                            <select class="form-select" name="province" required>
                                <option value="">Pilih Provinsi</option>
                                <?php foreach ($province as $province_id => $label): ?>
                                <option value="{{ $province_id }}">{{ $label }}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Kota/Kabupaten</label>
                            <select class="form-select" name="city" required>
                                <option value="">Pilih Kota/Kabupaten</option>
                                <?php foreach ($city as $city_id => $label): ?>
                                <option value="{{ $city_id }}">{{ $label }}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">Nama Depan</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Nama Belakang</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-md-6">
                            <label for="address1" class="form-label">Alamat 1</label>
                            <input type="text" name="address1" id="address1" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address2" class="form-label">Alamat 2</label>
                            <input type="text" name="address2" id="address2" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="postcode" class="form-label">Kode Pos</label>
                            <input type="number" name="postcode" id="postcode" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">No Telp</label>
                            <input type="number" name="phone" id="phone" class="form-control" required>
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
