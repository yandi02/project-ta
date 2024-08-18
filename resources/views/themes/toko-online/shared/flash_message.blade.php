@if ($errors->any())
    <div class="alert alert-warning mb-0">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif

@push('scripts')
    @if (session('success'))
        {{-- <p class="text-success mb-0">{{ session('success') }}</p> --}}
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false,
            }).then(() => {
                location.reload();
            });
        </script>
    @endif

    @if (session('error'))
        {{-- <p class="text-danger mb-0">{{ session('error') }}</p> --}}
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                showConfirmButton: true,
            }).then(() => {
                location.reload();
            });
        </script>
    @endif
@endpush
