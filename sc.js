$(document).ready(function() {
    // Submit Add Product Form
    $("form").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "showlist_1.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#productTableBody").html(response); // Update the product list dynamically
                $("form")[0].reset(); // Reset the form
            }
        });
    });

    // Handle Edit Button Click
    $(".edit").on("click", function() {
        var id = $(this).data("id");
        $.ajax({
            url: "getProducts.php",
            type: "POST",
            data: { id: id },
            success: function(response) {
                var product = JSON.parse(response);
                $("input[name='id']").val(product.id);
                $("input[name='productname']").val(product.product_name);
                $("select[name='producttype']").val(product.product_type);
            }
        });
    });

    // Handle Delete Button Click
    $(document).on('click', '.delete', function() {
        var id = $(this).closest("tr").attr("id").split("-")[1];
        $.ajax({
            url: "delete_1.php",
            type: "POST",
            data: { id: id },
            success: function(response) {
                $("#row-" + id).remove(); // Remove the row from the table
            }
        });
    });
});
