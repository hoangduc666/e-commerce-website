@extends('admins.layout.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div>
        @if(Auth::guard('admin')->user()->can('admin.store'))
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class='far fa-window-restore'></i> Add
            </button>
        @endif

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
                        <form id="add-admin-form">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control name-admin" id="name-admin"
                                       placeholder="Enter name" name="name">
                                <span class="error-name error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control email-admin" id="email-admin"
                                       placeholder="Enter email" name="email">
                                <span class="error-email error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control password-admin" id="password-admin"
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


        {{--  Modal sửa   --}}
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
                    <input type="hidden" class="form-control" id="id-admin-edit"
                           placeholder="Enter name">
                    <div class="modal-body">
                        <form id="edit-admin-form">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control name-admin-edit" id="name-admin-edit"
                                       placeholder="Enter name"name="name">
                                <span class="error-name error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control email-admin-edit" id="email-admin-edit"
                                       placeholder="Enter email"name="email">
                                <span class="error-email error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control password-admin-edit" id="password-admin-edit"
                                       placeholder="Enter password"name="password">
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

    </div>
    <div class="card-body">
        <div class="card-body">
            {{ $dataTable->table(['class' => 'table table-bordered table-hover' ,'width' => '100%'],true) }}
        </div>
    </div>

@endsection

@push('style')
    <style>
        .error-data {
            color: red;
        }
    </style>
@endpush

@section('script')

    {{ $dataTable->scripts() }}


    <script>
        $(document).ready(function () {
            $('.change-status-admin').each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
            //thêm
            $('#add-admin-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-data').html('');

                //kiểm tra trường thông tin khi nhập và hiển thị thông báo lỗi
                var nameValue = $('#name-admin').val();
                var emailValue = $('#email-admin').val();
                var passwordValue = $('#password-admin').val();


                if (nameValue !== ' ' && emailValue !== ' ' && passwordValue !== ' ') {

                    $.ajax({
                        url: "{{ route('admin.store') }}",
                        method: "POST",
                        data: {
                            name: nameValue,
                            email: emailValue,
                            password: passwordValue,
                        },
                        success: function () {
                            // alert(response.success);
                            // Ẩn modal form sửa

                            $('#exampleModal').modal('hide');

                            iziToast.success({
                                timeout: 5000,
                                title: 'Thành công',
                                icon: 'fa fa-check-circle',
                                position: 'topRight'
                            });

                            //load lại datatable
                            $('#admin-table').DataTable().ajax.reload();
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


            //sửa
            $('#edit-admin-form').on('submit', function (e) {
                let url = " {{ route('admin.update', ':id') }}";
                e.preventDefault();
                $('.error-data').html('');
                var adminId = $('#id-admin-edit').val();
                url = url.replace(":id", adminId);

                //kiểm tra trường thông tin khi nhập và hiển thị thông báo lỗi
                var nameValue = $('#name-admin-edit').val();
                var emailValue = $('#email-admin-edit').val();
                var passwordValue = $('#password-admin-edit').val();


                if (nameValue !== ' ' && emailValue !== ' ') {

                    $.ajax({
                        url: url,
                        method: 'PUT',
                        data: {
                            name: nameValue,
                            email: emailValue,
                            password: passwordValue !== '' ? passwordValue : null,
                        },
                        success: function () {
                            // Ẩn modal form sửa
                            $('#exampleModalEdit').modal('hide');

                            iziToast.success({
                                timeout: 5000,
                                title: 'Thành công',
                                icon: 'fa fa-check-circle',
                                position: 'topRight'
                            });

                            // Load lại datatable
                            $('#admin-table').DataTable().ajax.reload();
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

        function editAdmin(e) {
            //lấy data người dùng từ thuộc tính data-id
            var adminId = $(e).data('id');
            // Lấy dòng tương ứng trong bảng DataTables
            var dataTable = $('#admin-table').DataTable();
            var row = dataTable.row($(e).closest('tr'));

            //lấy dữ liệu từ dòng
            var data = row.data();

            //điển thông tin vào form sửa
            $('#id-admin-edit').val(adminId)
            $('#name-admin-edit').val(data.name)
            $('#email-admin-edit').val(data.email);
            $('#password-admin-edit').val();

            //hiển thị form sửa
            $('#exampleModalEdit').modal('show');

        }

        function deleteAdmin(e) {
            var adminId = $(e).data("id");
            var url = "{{ route('admin.delete', ':id') }}";
            url = url.replace(":id", adminId);

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
                            $('#admin-table').DataTable().ajax.reload();
                        },
                        error: function (response) {
                            iziToast.error({
                                timeout: 5000,
                                title: 'Đã có lỗi xảy ra !',
                                icon:'fas fa-exclamation-triangle',
                                position: 'topRight'
                            });
                        }
                    });
                }
            });
        }


        function changeActive(_this) {
            $.ajax({
                url: $(_this).attr('data-url'),
                method: 'POST',
                success: function (result) {
                    iziToast.success({
                        title: result.success,
                        icon: 'fa fa-check-circle',
                        position: 'topRight',
                        timeout: 5000,
                    });
                    $('#admin-table').DataTable().ajax.reload();
                },
                error: function (result) {
                    if (result.responseJSON.message) {
                        iziToast.warning({
                            title: result.responseJSON.message,
                            position: 'topRight'
                        });
                    }
                },
            });
        }

    </script>
@endsection

@section('lib')
    {{--validate js--}}
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection
