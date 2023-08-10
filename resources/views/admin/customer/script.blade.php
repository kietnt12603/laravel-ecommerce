<script>
    $(document).on('submit', '#customerAddModal', function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('user', $('#user').val());
        formData.append('pass', $('#pass').val());
        formData.append('email', $('#email').val());
        formData.append('name', $('#name').val());
        formData.append('address', $('#address').val());
        formData.append('tel', $('#tel').val());
        formData.append('active', $('input[name="active"]:checked').val());
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
            url: "/admin/customer/add",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    $('#customerAddModal').modal('hide');
                    $('#saveCustomer')[0].reset();
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

    $(document).on('click', '.editCustomerBtn', function() {

        var customer_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/customer/edit/" + customer_id,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    // $('#id').val(res.data.id);
                    // $('#name_edit').val(res.data.name);
                    // $('#price_edit').val(res.data.price);
                    // $('#price_sale_edit').val(res.data.price_sale);
                    // let img = res.data.image;
                    // let img1 = "{{ asset('/images') }}/" + img;
                    // $('#hinh1').attr("src", img1);
                    // $('#category_id_edit').val(res.data.category_id);
                    // $('#description_edit').val(res.data.description);
                    // CKEDITOR.instances.editor2.setData(res.data.description_detail);
                    // $('#editor2').val(res.data.description_detail);
                    // $('#productEditModal').modal('show');
                    $('#customer_id').val(res.data.id);
                    $('#user_edit').val(res.data.user);
                    $('#email_edit').val(res.data.email);
                    $('#name_edit').val(res.data.name);
                    $('#tel_edit').val(res.data.tel);
                    $('#address_edit').val(res.data.address);

                    let active = res.data.active;
                    if (active == 1) {
                        document.getElementById("active1").checked = true;
                    } else {
                        document.getElementById("active0").checked = true;
                    }

                    $('#customerEditModal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#updateCustomer', function(e) {
        e.preventDefault();

        var customer_id = $('#customer_id').val();
        const formData = new FormData();
        formData.append('user', $('#user_edit').val());
        formData.append('email', $('#email_edit').val());
        formData.append('name', $('#name_edit').val());
        formData.append('address', $('#address_edit').val());
        formData.append('tel', $('#tel_edit').val());
        formData.append('active', $('input[name="active_edit"]:checked').val());
        formData.append('_token', $('input[name="_token"]').val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/admin/customer/edit/" + customer_id,
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
                    $('#customerEditModal').modal('hide');
                    Swal.fire(
                        "Good job!",
                        res.message,
                        "success"
                    );
                    $('#updateCustomer')[0].reset();
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

    $(document).on('click', '.deleteCustomerBtn', function() {
        var customer_id = $(this).val();

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
                    url: "/admin/customer/delete/" + customer_id,
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
