@extends('admins.layout.master')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    {{--  Thêm --}}
    <div style="display: flex; justify-content: space-between">

        @if(Auth::guard('admin')->user()->can('category.store'))
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class='far fa-window-restore'></i> Add
            </button>
        @endif

        <div class="row p-1">
            <div class="" style="display: flex; align-items: center; gap: 10px">
                <label for="exampleInputEmail1" class="form-label">Search</label>
                <input type="text" class="form-control" id="name-category-fillter">
            </div>
        </div>
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
                    <form id="add-category-form">
                        <div class="form-group" style="display: grid">
                            <label for="exampleInputEmail1">Category Parent</label>
                            <select class="name-parent" id="name-parent"
                                    name="parent_id"></select>
                            <span class="error-parent error-data"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Category Name</label>
                            <input type="text" class="form-control name-category" id="name-category"
                                   placeholder="Enter name" name="name">
                            <span class="error-category error-data"></span>
                        </div>
<<<<<<< HEAD
                        <div class="form-group">
                            <label for="exampleInputName1">Order</label>
                            <input type="number" class="form-control order-category" id="order-category"
                                   placeholder="Enter order" name="order" value="1" min="1">
                            <span class="error-order error-data"></span>
                        </div>
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
                <input type="hidden" class="form-control" id="id-category-edit"
                       placeholder="Enter name">
                <div class="modal-body">
                    <form id="edit-category-form">
                        <div class="form-group" style="display: grid">
                            <label for="exampleInputEmail1">Category Parent</label>
                            <select class="name-parent-edit" id="name-parent-edit"
                                    name="parent_id"></select>
                            <span class="error-parent error-data"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Category Name</label>
                            <input type="text" class="form-control name-category-edit" id="name-category-edit"
                                   placeholder="Enter name" name="name">
                            <span class="error-category error-data"></span>
                        </div>
<<<<<<< HEAD
                        <div class="form-group">
                            <label for="exampleInputName1">Order</label>
                            <input type="number" class="form-control order-category-edit" id="order-category-edit"
                                   placeholder="Enter order" name="order" value="1" min="1">
                            <span class="error-order error-data"></span>
                        </div>
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
        #category-table_filter{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        #category-table_paginate {
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
            $('#name-category-fillter').on('change', function (e) {
                $('#category-table').DataTable().ajax.reload();
            });

            // lấy data danh mục cha hiển thị trong select 2
            $('.name-parent').select2({
                placeholder: 'Select an category',
                dropdownParent: $("#exampleModal"),
                theme: 'classic',
                ajax: ({
                    url: '{{route('category.getCategoryParent')}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                };
                            })
                        };
                    },
                    cache: true
                })
            });

            // lấy data danh mục cha hiển thị trong select 2 (modal sửa)
            $('.name-parent-edit').select2({
                placeholder: 'Select an category',
                dropdownParent: $("#exampleModalEdit"),
                theme: 'classic',
                ajax: ({
                    url: '{{route('category.getCategoryParent')}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                };
                            })
                        };
                    },
                    cache: true
                })
            });


            //thêm
            $('#add-category-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-data').html('');

                var parentValue = $('#name-parent').val();
                var categoryValue = $('#name-category').val();
<<<<<<< HEAD
                var orderValue = $('#order-category').val();
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316


                if (categoryValue === '') {
                    $('.error-category').text('Vui lòng nhập tên danh mục');
                }
<<<<<<< HEAD
                if (orderValue === '') {
                    $('.error-order').text('Vui lòng nhập thứ tự ưu tiên danh mục');
                }

                if (categoryValue !== '' && orderValue !== '' ) {
=======

                if (categoryValue !== '') {
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                    $.ajax({
                        url: "{{ route('category.store') }}",
                        method: "POST",
                        data: {
                            parent_id: parentValue,
<<<<<<< HEAD
                            name: categoryValue,
                            order: orderValue,
=======
                            name: categoryValue
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
                            $('#category-table').DataTable().ajax.reload();

                        },
                        error: function (response) {
                            if (response.responseJSON.errors.name) {
                                $('.error-category').append(response.responseJSON.errors.name[0]);
                            }
<<<<<<< HEAD
                            if (response.responseJSON.errors.order) {
                                $('.error-order').append(response.responseJSON.errors.order[0]);
                            }
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                        }
                    });
                }
            });


            //sửa
            $('#edit-category-form').on('submit', function (e) {
                let url = "{{ route('category.update', ':id' )}}"
                e.preventDefault();
                $('.error-data').html('');
                var categoryId = $('#id-category-edit').val();
                url = url.replace(":id", categoryId);

                var parentValue = $('#name-parent-edit').val();
                var categoryValue = $('#name-category-edit').val();
<<<<<<< HEAD
                var orderValue = $('#order-category-edit').val();
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316


                if (categoryValue === '') {
                    $('.error-category').text('Vui lòng nhập tên danh mục');
                }

<<<<<<< HEAD

                if (orderValue === '') {
                    $('.error-order').text('Vui lòng nhập thứ tự ưu tiên danh mục');
                }

                if (categoryValue !== '' && orderValue !== '' ) {
=======
                if (categoryValue !== '') {
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                    $.ajax({
                        url: url,
                        method: "PUT",
                        data: {
                            parent_id: parentValue,
                            name: categoryValue,
<<<<<<< HEAD
                            order: orderValue,
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
                            $('#category-table').DataTable().ajax.reload();

                        },
                        error: function (response) {
                            if (response.responseJSON.errors.name) {
                                $('.error-category').append(response.responseJSON.errors.name[0]);
                            }
<<<<<<< HEAD
                            if (response.responseJSON.errors.order) {
                                $('.error-order').append(response.responseJSON.errors.order[0]);
                            }
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                        }
                    });
                }
            });

        });

        // bắt click sửa
        function editCategory(e) {
            var categoryId = $(e).data('id');

            var table = $('#category-table').DataTable();
            var rowData = table.row($(e).closest('tr')).data(); // Lấy dữ liệu từ hàng được chọn

            var newOption = new Option(rowData.parent_id,$(e).data('parent_id'), true, true);
            $('#name-parent-edit').append(newOption).trigger('change');
            $('#name-category-edit').val(rowData.name);
<<<<<<< HEAD
            $('#order-category-edit').val(rowData.order);
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            $('#id-category-edit').val(categoryId);


            $('#exampleModalEdit').modal('show');
        }

        //bắt click xóa
        function deleteCategory(e) {
            var categoryId = $(e).data('id');
            let url = "{{ route('category.delete', ':id' )}}";
            url = url.replace(":id", categoryId);

            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Thực hiện không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        $.ajax({
                            url: url,
                            method: "DELETE",
                            success: function () {

                                iziToast.success({
                                    timeout: 5000,
                                    title: 'Thành công',
                                    icon: 'fa fa-check-circle',
                                    position: 'topRight'
                                });

                                //load lại datatable
                                $('#category-table').DataTable().ajax.reload();

                            },
                            error: function (response) {
                                iziToast.error({
                                    timeout: 5000,
                                    title: 'Đã có lỗi xảy ra !',
                                    icon: 'fas fa-exclamation-triangle',
                                    position: 'topRight'
                                });
                            }
                        }),
                        'success',
                    )
                }
            })
        }

    </script>
@endsection
@section('lib')
<<<<<<< HEAD
=======
    {{--validate js--}}
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

>>>>>>> dece221f309a6888873a1349df77751a0356c316
    {{-- select 2 js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endsection
