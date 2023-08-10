<script>
    $(document).on('submit', '#saveUser', function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('email', $('#email').val());
        formData.append('password', $('#password').val());
        formData.append('name', $('#name').val());
        formData.append('roles', $('input[name="role"]:checked').val());
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
            url: "/admin/user/add",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    $('#userAddModal').modal('hide');
                    $('#saveUser')[0].reset();
                    $('#keywords').val("");
                    Swal.fire(
                        "Good job!",
                        res.message,
                        "success"
                    );
                    console.log('Thêm thành công');
                    $('#myTable').load(location.href + " #myTable");
                } else if (res.status == 500) {
                    alert(res.message);
                }
            },
            error: function(error) {
                console.log('Lỗi trong quá trình gửi yêu cầu AJAX:', error);
            }
        });
    });

    // $(document).on('click', '.editUserBtn', function() {

    //     var user_id = $(this).val();

    //     $.ajax({
    //         type: "GET",
    //         url: "/admin/user/edit/" + user_id,
    //         success: function(response) {

    //             var res = jQuery.parseJSON(response);
    //             if (res.status == 200) {
    //                 $('#id').val(res.data.id);
    //                 $('#email_edit').val(res.data.email);
    //                 $('#name_edit').val(res.data.name);
    //                 let role = res.data.roles;
    //                 if (role == 1) {
    //                     document.getElementById("admin").checked = true;
    //                 } else {
    //                     document.getElementById("nhanvien").checked = true;
    //                 }

    //                 $('#userEditModal').modal('show');
    //             }

    //         }
    //     });

    // });
    $(document).on('click', '.editUserBtn', function() {
        var user_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/admin/user/edit/" + user_id,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    $('#id').val(res.data.id); // Cập nhật giá trị ID
                    $('#email_edit').val(res.data.email);
                    $('#name_edit').val(res.data.name);
                    let role = res.data.roles;
                    if (role == 1) {
                        $('#admin').prop('checked', true);
                    } else {
                        $('#nhanvien').prop('checked', true);
                    }

                    // Đặt user_id vào data attribute của form
                    $('#updateUser').data('user-id', user_id);

                    $('#userEditModal').modal('show');
                }
            }
        });
    });

    $(document).on('submit', '#updateUser', function(e) {
        e.preventDefault();

        var user_id = $('#id').val();
        const formData = new FormData();
        formData.append('email', $('#email_edit').val());
        formData.append('name', $('#name_edit').val());
        formData.append('roles', $('input[name="role1"]:checked').val());
        formData.append('_token', $('input[name="_token"]').val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            }
        });

        $.ajax({
            type: "POST", // Chuyển từ "GET" sang "POST"
            url: "/admin/user/edit/" + user_id,
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
                    $('#userEditModal').modal('hide');
                    Swal.fire(
                        "Good job!",
                        res.message,
                        "success"
                    );
                    $('#updateUser')[0].reset();
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


    $(document).on('click', '.deleteUserBtn', function() {
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
                    url: "/admin/user/delete/" + customer_id,
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
