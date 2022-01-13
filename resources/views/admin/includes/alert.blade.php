<script>
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 6000 * 5
        })

        Toast.fire({
            icon: 'error',
            title: '{{ $title }}'
        })
    });
</script>
