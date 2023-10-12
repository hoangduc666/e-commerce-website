@extends('admins.layout.master')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Attribute</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Attribute</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div>
        @if(Auth::guard('admin')->user()->can('attribute.store'))
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class='far fa-window-restore'></i> Add
            </button>
        @endif

        <!-- Modal thêm-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 150%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-attribute-form">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control name-attribute" id="name-attribute"
                                       placeholder="Enter name" name="name">
                                <span class="error-name error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" class="form-control type-attribute" id="type-attribute"
                                       placeholder="Enter type" name="value">
                                <span class="error-type error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Url</label>
                                <input type="text" class="form-control slug-attribute" id="slug-attribute"
                                       placeholder="Enter url" name="slug">
                                <span class="error-slug error-data"></span>
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
                <div class="modal-content" style="width: 150%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" class="form-control id-attribute" id="id-attribute-edit"
                           placeholder="Enter name" name="id">
                    <div class="modal-body">
                        <form id="edit-attribute-form">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control name-attribute" id="name-attribute-edit"
                                       placeholder="Enter name" name="name">
                                <span class="error-name error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" class="form-control type-attribute" id="type-attribute-edit"
                                       placeholder="Enter type" name="value">
                                <span class="error-type error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Url</label>
                                <input type="text" class="form-control slug-attribute" id="slug-attribute-edit"
                                       placeholder="Enter url" name="slug">
                                <span class="error-slug error-data"></span>
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
        {{ $dataTable->table(['class' => 'table table-bordered table-hover' ,'width' => '100%'],true) }}
    </div>
@endsection

@push('style')
    <style>
        #attribute-table_filter{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        #attribute-table_paginate {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            gap: 10px;
            cursor: pointer;
        }

        .paginate_button{
            padding: 0 10px ;
        }
        .error-data {
            color: red;
        }
    </style>
@endpush

@section('script')
    {{ $dataTable->scripts() }}
    <script>
        $(document).ready(function () {
            $('#add-attribute-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-data').html('');

                var nameValue = $('#name-attribute').val();
                var typeValue = $('#type-attribute').val();
                var slugValue = $('#slug-attribute').val();


                $('#add-attribute-form').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        value: {
                            required: true,
                        },
                        slug: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: 'Vui lòng nhập tên thuộc tính sản phẩm '
                        },
                        value: {
                            required: 'Vui lòng nhập phân loại sản phẩm',
                        },
                        slug: {
                            required: 'Vui lòng nhập đường dẫn sản phẩm',
                        },
                    }
                });


                if (nameValue !== '' && typeValue !== '' && slugValue !== '') {
                    $.ajax({
                        url: "{{ route('attribute.store') }}",
                        method: "POST",
                        data: {
                            name: nameValue,
                            value: typeValue,
                            slug: slugValue,
                        },
                        success: function () {
                            $('#exampleModal').modal('hide');

                            iziToast.success({
                                timeout: 5000,
                                title: 'Thành công',
                                icon: 'fa fa-check-circle',
                                position: 'topRight'
                            });

                            //load lại datatable
                            $('#attribute-table').DataTable().ajax.reload();
                        },
                        error: function (response) {
                            if (response.responseJSON.errors.name) {
                                $('.error-name').append(response.responseJSON.errors.name[0]);
                            }
                            if (response.responseJSON.errors.value) {
                                $('.error-type').append(response.responseJSON.errors.value[0]);
                            }
                            if (response.responseJSON.errors.slug) {
                                $('.error-slug').append(response.responseJSON.errors.slug[0]);
                            }
                        }
                    });
                }
            });


            $('#edit-attribute-form').on('submit', function (e) {
                var url = '{{route('attribute.update',':id')}}';
                e.preventDefault();
                $('.error-data').html('');
                var attributeId = $('#id-attribute-edit').val();
                url = url.replace(':id', attributeId);

                var nameValue = $('#name-attribute-edit').val();
                var typeValue = $('#type-attribute-edit').val();
                var slugValue = $('#slug-attribute-edit').val();


                $('#edit-attribute-form').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        value: {
                            required: true,
                        },
                        slug: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: 'Vui lòng nhập tên thuộc tính sản phẩm '
                        },
                        value: {
                            required: 'Vui lòng nhập phân loại sản phẩm',
                        },
                        slug: {
                            required: 'Vui lòng nhập đường dẫn sản phẩm',
                        },
                    }
                });


                if (nameValue !== '' && typeValue !== '' && slugValue !== '') {
                    $.ajax({
                        url: url,
                        method: "PUT",
                        data: {
                            name: nameValue,
                            value: typeValue,
                            slug: slugValue,
                        },
                        success: function () {
                            $('#exampleModalEdit').modal('hide');

                            iziToast.success({
                                timeout: 5000,
                                title: 'Thành công',
                                icon: 'fa fa-check-circle',
                                position: 'topRight'
                            });

                            //load lại datatable
                            $('#attribute-table').DataTable().ajax.reload();
                        },
                        error: function (response) {
                            if (response.responseJSON.errors.name) {
                                $('.error-name').append(response.responseJSON.errors.name[0]);
                            }
                            if (response.responseJSON.errors.value) {
                                $('.error-type').append(response.responseJSON.errors.value[0]);
                            }
                            if (response.responseJSON.errors.slug) {
                                $('.error-slug').append(response.responseJSON.errors.slug[0]);
                            }
                        }
                    });
                }
            });
        });

        function editAttribute(e) {
            var attributeId = $(e).data('id');

            var dataTable = $('#attribute-table').DataTable();
            var row = dataTable.row($(e).closest('tr'));

            var data = row.data();

            $('#id-attribute-edit').val(attributeId);
            $('#name-attribute-edit').val(data.name);
            $('#type-attribute-edit').val(data.value);
            $('#slug-attribute-edit').val(data.slug);

            $('#exampleModalEdit').modal('show');

        }

        function deleteAttribute(e) {
            var attributeId = $(e).data('id');
            var url = '{{ route("attribute.delete", ":id") }}';
            url = url.replace(':id', attributeId);

            Swal.fire({
                title: 'Bạn có chắc chắn muốn thực hiện thao tác?',
                text: "Thao tác này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButton: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            success: function () {
                                iziToast.success({
                                    timeout: 5000,
                                    icon: 'fa fa-check-circle',
                                    title: 'Thành công',
                                    position: 'topRight',
                                });
                                $('#attribute-table').DataTable().ajax.reload();
                            },
                            error: function (data) {
                                iziToast.error({
                                    timeout: 5000,
                                    title: 'Đã có lỗi xảy ra !',
                                    icon: 'fas fa-exclamation-triangle',
                                    position: 'topRight'
                                });
                            }
                        }),
                        'success'
                    )
                }
            });
        }
    </script>
@endsection

@section('lib')
    {{--validate js--}}
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

@endsection
