$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
     // AJAX Delete Function
     $('.delete').on('click', function() {
        var productId = $(this).data('id'); // Get the product ID
       // console.log("Product ID: " + productId);
        // Use SweetAlert for confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete this product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {

        // Confirm before deletion
        if (result.isConfirmed) {
            $.ajax({
                url: 'delete.php', // PHP file for handling deletion
                type: 'POST',
                data: { id: productId},
                success: function(response) {
                    console.log("Response: " + response);
                    if (response == 'success') {
                        Swal.fire(
                            'Deleted!',
                            'Your product has been deleted.',
                            'success'
                        );
                        $('#row-' + productId).remove(); // Remove the deleted row from the table
                    } else {
                        Swal.fire(
                            'Failed!',
                            'The product could not be deleted.',
                            'error'
                        );
                    
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'An error occurred while deleting the product.',
                        'error'
                    );
                   
                  
                }
            });
        }
    });
    });
});