@if(session($message))
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            Swal.fire({
                position: 'top-end',
                icon: '{{ $type }}',
                title: "{{ session($message) }}",
                showConfirmButton: false,
                timer: 1500,
                width: '400px', 
                customClass: {
                    popup: 'small-swal',
                },
            });
        });
    </script>
@endif


@if($confirmMessage)
    <script>
        function confirmDeletion(formId) {
            Swal.fire({
                title: "Are you sure?",
                text: "{{ $confirmMessage }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your item has been deleted.",
                        icon: "success",
                        timer: 1500
                    });
                }
            });
        }
    </script>
@endif