@extends('admin.layouts.master')

@section('title')
    Profile
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('profile_admin.index') }}">Profile</a></li>
    <li class="breadcrumb-item active">{{ auth()->user()->name }}</li>
@endsection

@section('content')
    <div class="card bg-info-subtle shadow-sm position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h2 class="fw-semibold">Pengaturan Akun</h2>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img width="130" src="{{ asset('modernize2/images/account-settings.svg') }}" alt="modernize-img"
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('profile.update') }}" id="profile-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Ubah Profil</h4>
                            </div>
                            <div class="btn-clear col-md-6 d-flex justify-content-end">
                                <a class="text-danger" type="button" onclick="clearFileInput()">Hapus</a>
                            </div>
                        </div>
                        <p class="card-subtitle mb-2">Ubah foto profil anda disini</p>
                        <div class="input-group mb-3 col-sm-3">
                            <input class="form-control" type="file" name="foto-user" id="foto-user">
                        </div>
                        <label for="preview-image">Preview Foto</label>
                        <div class="rounded-md d-flex justify-content-center">
                            <img class="rounded-circle" id="preview-image" width="150" height="150" />
                            <p class="none-text mt-5 text-danger">Belum ada foto profil</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                        <h4 class="card-title">Ubah Password</h4>
                        <p class="card-subtitle mb-4">Untuk mengubah kata sandi Anda, silakan konfirmasi di
                            sini</p>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password Saat Ini</label>
                            <input name="old_password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Password Baru</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword2">
                        </div>
                        <div>
                            <label for="exampleInputPassword3" class="form-label">Konfirmasi Password
                                Baru</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                id="exampleInputPassword3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-5">
                <div class="card w-100 border position-relative overflow-hidden mb-0">
                    <div class="card-body p-4">
                        <h4 class="card-title">Detail Personal</h4>
                        <p class="card-subtitle mb-4">Untuk mengubah detail pribadi Anda, edit dan simpan
                            dari sini</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputtext" class="form-label">Nama</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputtext"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtext3" class="form-label">No. HP</label>
                                    <input name="nohp" type="text" class="form-control" id="exampleInputtext3"
                                        value="{{ $user->nohp }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputtext1" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputtext1"
                                        value="{{ $user->email }}">
                                </div>
                                <div>
                                    <label for="exampleInputtext4" class="form-label">Alamat</label>
                                    <input name="alamat" type="text" class="form-control" id="exampleInputtext4"
                                        value="{{ $user->alamat }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn bg-danger-subtle text-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('#profile-form').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data berhasil disimpan',
                    }).then(() => {
                        window.location.reload();
                    })
                },
                error: function(response, xhr) {
                    if (xhr.status === 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: xhr.responseJSON.error,
                        });
                    }
                }
            });
        });

        $(document).ready(function() {
            var previewImage = document.getElementById('preview-image');
            var featuredImage = '{{ $user->foto }}';

            if (featuredImage) {
                previewImage.src = '{{ asset('storage/img/') }}/' + featuredImage;
                previewImage.style.display = 'block';
                $('.btn-clear').removeClass('d-none');
                $('.none-text').addClass('d-none');
            } else {
                previewImage.style.display = 'none';
            }
        });

        function previewImage(input) {
            // var previewContainer = document.getElementById('preview-container');
            var previewImage = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                $('#preview-image').removeClass('d-none');
                $('.none-text').addClass('d-none');

                reader.readAsDataURL(input.files[0]);
            } else {
                previewImage.src = '';
                previewImage.style.display = 'none';
            }
        }

        document.getElementById('foto-user').addEventListener('change', function() {
            previewImage(this);
            $('.btn-clear').removeClass('d-none')
        });

        function clearFileInput() {
            document.getElementById('foto-user').value = "";

            document.getElementById('preview-image').src = '';
            document.getElementById('preview-image').style.display = 'none';
            $('.btn-clear').addClass('d-none');
            $('.none-text').removeClass('d-none');
        }
    </script>
@endpush
