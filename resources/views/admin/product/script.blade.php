<script>
    $(document).on('submit', '#saveProduct', function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('image', $('#image')[0].files[0]);
        formData.append('name', $('#name').val());
        formData.append('price', $('#price').val());
        formData.append('price_sale', $('#price_sale').val());
        formData.append('description', $('#description').val());
        formData.append('description_detail', $('#editor1').val());
        formData.append('category_id', $('#category_id').val());
        formData.append('_token', $('input[name="_token"]').val());
        // var form = this;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/admin/product/add",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    $('#productAddModal').modal('hide');
                    $('#saveProduct')[0].reset();
                    CKEDITOR.instances.editor1.setData('');
                    $('#keywords').val("");
                    Swal.fire(
                        "Good job!",
                        res.message,
                        "success"
                    );
                    console.log('Thêm thành công');
                    $('#myTable').load(location.href + " #myTable");
                    // $('#pagination').load(location.href + " #pagination");
                } else if (res.status == 500) {
                    alert(res.message);
                }
            },
            error: function(error) {
                console.log('Lỗi trong quá trình gửi yêu cầu AJAX:', error);
            }
        });
        // reader.readAsText(file);
    });

    $(document).on('click', '.editProductBtn', function() {

        var product_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/product/edit/" + product_id,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    $('#id').val(res.data.id);
                    $('#name_edit').val(res.data.name);
                    $('#price_edit').val(res.data.price);
                    $('#price_sale_edit').val(res.data.price_sale);
                    let img = res.data.image;
                    let img1 = "{{ asset('/images') }}/" + img;
                    $('#hinh1').attr("src", img1);
                    $('#category_id_edit').val(res.data.category_id);
                    $('#description_edit').val(res.data.description);
                    CKEDITOR.instances.editor2.setData(res.data.description_detail);
                    $('#editor2').val(res.data.description_detail);
                    $('#productEditModal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#updateProduct', function(e) {
        e.preventDefault();

        var product_id = $('#id').val();
        const formData = new FormData();
        if (image_edit.files.length > 0) {
            formData.append('image', $('#image_edit')[0].files[0]);
        }
        formData.append('name', $('#name_edit').val());
        formData.append('price', $('#price_edit').val());
        formData.append('price_sale', $('#price_sale_edit').val());
        formData.append('description', $('#description_edit').val());
        formData.append('description_detail', $('#editor2').val());
        formData.append('category_id', $('#category_id_edit').val());
        formData.append('_token', $('input[name="_token"]').val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/admin/product/edit/" + product_id,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    $('#productEditModal').modal('hide');
                    Swal.fire(
                        "Good job!",
                        res.message,
                        "success"
                    );
                    $('#updateProduct')[0].reset();
                    $('#keywords').val("");
                    $('#myTable').load(location.href + " #myTable");
                    // $('#pagination').load(location.href + " #pagination");
                } else if (res.status == 500) {
                    alert(res.message);
                }
            },
            error: function(error) {
                console.log('Lỗi trong quá trình gửi yêu cầu AJAX:', error);
            }
        });
    });

    $(document).on('click', '.deleteProductBtn', function() {
        var product_id = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/admin/product/delete/" + product_id,
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                            Swal.fire(
                                'Deleted!',
                                res.message,
                                'success'
                            );
                            $('#myTable').load(location.href + " #myTable");
                            // $('#pagination').load(location.href + " #pagination");
                        } else if (res.status == 500) {
                            alert(res.message);
                        }
                    },
                    error: function(error) {
                        console.log('Lỗi trong quá trình gửi yêu cầu DELETE:', error);
                    }
                });
            }
        });
    });

</script>
