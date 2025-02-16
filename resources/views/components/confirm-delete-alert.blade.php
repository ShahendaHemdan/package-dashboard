<script>
    function confirmDeletion(formId) {
        Swal.fire({
            title: "Are you sure?",
            text: "{{ $confirmMessage }}", // Ensure this variable is defined or replace it with a static message
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById(formId).submit();
            }
        });
    }
</script>