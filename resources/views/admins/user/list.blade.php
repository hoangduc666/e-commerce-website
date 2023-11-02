@extends('admins.layout.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">User</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
   <div>
       <!-- thêm -->
       @if(Auth::guard('admin')->user()->can('user.store'))
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               <i class='far fa-window-restore'></i> Add
           </button>
       @endif
   </div>

    <!-- Modal thêm-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-user-form">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control name-admin" id="name-user"
                                   placeholder="Enter name" name="name">
                            <span class="error-name error-data"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control email-admin" id="email-user"
                                   placeholder="Enter email" name="email">
                            <span class="error-email error-data"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control password-admin" id="password-user"
                                   placeholder="Enter password" name="password">
                            <span class="error-password error-data"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal sửa-->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" class="form-control" id="id-user-edit"
                       placeholder="Enter name">
                <div class="modal-body">
                    <form id="edit-user-form">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control name-user-edit" id="name-user-edit"
                                   placeholder="Enter name">
                            <span class="error-name error-data"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control email-user-edit" id="email-user-edit"
                                   placeholder="Enter email">
                            <span class="error-email error-data"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control password-user-edit" id="password-user-edit"
                                   placeholder="Enter password">
                            <span class="error-password error-data"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


   <div class="card-body">
       {{ $dataTable->table(['class' => 'table table-bordered table-hover' ,'width' => '100%'],true) }}
   </div>

@endsection

@push('style')
    <style>
<<<<<<< HEAD
        #user-table_filter{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        #user-table_paginate {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            gap: 10px;
            cursor: pointer;
        }

        .paginate_button{
            padding: 0 10px ;
        }
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        .error-data {
            color: red;
        }
    </style>
@endpush

@section('script')
    {{ $dataTable->scripts() }}


    <script>
        $(document).ready(function () {
            // submit form thêm
            $('#add-user-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-data').html('');

                //kiểm tra trường thông tin khi nhập và hiển thị thông báo lỗi
                var nameValue = $('#name-user').val();
                var emailValue = $('#email-user').val();
                var passwordValue = $('#password-user').val();


                if (nameValue !== ' ' && emailValue !== ' ' && passwordValue !== ' ') {

                    $.ajax({
                        url: "{{ route('user.store') }}",
                        method: "POST",
                        data: {
                            name: nameValue,
                            email: emailValue,
                            password: passwordValue,
                        },
                        success: function () {
                            //ẩn modal form thêm
                            $('#exampleModal').modal('hide');

                            iziToast.success({
                                timeout: 5000,
                                title: 'Thành công',
                                icon: 'fa fa-check-circle',
                                position: 'topRight'
                            });

                            //load lại datatable
                            $('#user-table').DataTable().ajax.reload();
                        },
                        error: function (response) {
                            if (response.responseJSON.errors.name) {
                                $('.error-name').append(response.responseJSON.errors.name[0]);
                            }
                            if (response.responseJSON.errors.email) {
                                $('.error-email').append(response.responseJSON.errors.email[0]);
                            }
                            if (response.responseJSON.errors.password) {
                                $('.error-password').append(response.responseJSON.errors
                                    .password[0]);
                            }
                        }
                    });
                }
            });

            // submit form sửa
            $('#edit-user-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-data').html('');
                let url = " {{ route('user.update', ':id') }}";
                var userId = $('#id-user-edit').val();
                url = url.replace(":id", userId);


                //kiểm tra trường thông tin khi nhập và hiển thị thông báo lỗi
                var nameValue = $('#name-user-edit').val();
                var emailValue = $('#email-user-edit').val();
                var passwordValue = $('#password-user-edit').val();


                if (nameValue !== ' ' && emailValue !== ' ') {

                    $.ajax({
                        url: url,
                        method: 'put',
                        data: {
                            name: nameValue,
                            email: emailValue,
                            password: passwordValue !== '' ? passwordValue : null,
                        },
                        success: function () {
                            // alert(response.success);
                            // Ẩn modal form sửa

                            $('#exampleModalEdit').modal('hide');

                            iziToast.success({
                                timeout: 5000,
                                title: 'Thành công',
                                icon: 'fa fa-check-circle',
                                position: 'topRight'
                            });

                            //load lại datatable
                            $('#user-table').DataTable().ajax.reload();
                        },
                        error: function (response) {
                            if (response.responseJSON.errors.name) {
                                $('.error-name').append(response.responseJSON.errors.name[0]);
                            }
                            if (response.responseJSON.errors.email) {
                                $('.error-email').append(response.responseJSON.errors.email[0]);
                            }
                            if (response.responseJSON.errors.password) {
                                $('.error-password').append(response.responseJSON.errors
                                    .password[0]);
                            }
                        }
                    });
                }
            });

        });

        // bắt click nút sửa
        function editUser(e) {
            // lấy thông tin id
            var userId = $(e).data('id');

            //lấy dòng thông tin tương ứng từ datatable
            var datatable = $('#user-table').DataTable();
            var row = datatable.row($(e).closest('tr'));

            //lấy dữ liệu dòng
            var data = row.data();

            //điền thông tin vào form sửa
            $('#id-user-edit').val(userId)
            $('#name-user-edit').val(data.name);
            $('#email-user-edit').val(data.email);
            $('#password-user-edit').val('');

            //hiển thị form sửa
            $('#exampleModalEdit').modal('show');
        }


        // bắt click nút xóa
        function deleteUser(e) {
            var userId = $(e).data("id");
            var url = "{{ route('user.delete', ':id') }}";
            url = url.replace(":id", userId);

            Swal.fire({
                title: 'Bạn có chắc chắn thực hiện xóa ?',
                text: 'Thao tác này không thể hoàn tác!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "DELETE",
                        url: url,
                        success: function () {
                            // Xóa thành công, load lại DataTable
                            iziToast.success({
                                timeout: 5000,
                                icon: 'fa fa-check-circle',
                                title: 'Thành công',
                                position: 'topRight'
                            });
                            $('#user-table').DataTable().ajax.reload();
                        },
                        error: function (response) {
                            iziToast.error({
                                timeout: 5000,
                                title: 'Đã có lỗi xảy ra !',
                                position: 'topRight'
                            });
                        }
                    });
                }
            });
        }

    </script>

@endsection

@section('lib')
    {{--validate js--}}
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection
