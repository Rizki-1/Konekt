{{-- Alert --}}
@if(Session::has('notif.error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ Session::get('notif.error') }}",
        });
        </script>
@endif

@if(Session::has('notif.success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ Session::get('notif.success') }}",
    });
    </script>
@endif
{{-- Alert --}}

