    {{-- swal --}}
    <script>
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('success') }}',
                icon: 'success',
            });
        @endif
    </script>
    {{-- swal --}}
    {{-- swal --}}
    <script>
        @if(session('warning'))
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('warning') }}',
                icon: 'warning',
            });
        @endif
    </script>
    {{-- swal --}}
