@extends('admins.layout.master')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Discount</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Discount</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div>
        @if(Auth::guard('admin')->user()->can('discount.store'))
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
                        <form id="add-discount-form">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control name-discount" id="name-discount"
                                       placeholder="Enter name" name="name">
                                <span class="error-name error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Coupon Code</label>
                                <input type="text" class="form-control code-discount" id="code-discount"
                                       placeholder="Enter code" name="coupon_code">
                                <span class="error-code error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Percent Off</label>
                                <input type="number" class="form-control percent-discount" id="percent-discount"
                                       placeholder="Enter percent" name="percent_off" min="1" value="1">
                                <span class="error-percent error-data"></span>
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

        {{-- modal sửa --}}
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
                    <input type="hidden" class="form-control" id="id-discount-edit">
                    <div class="modal-body">
                        <form id="edit-discount-form">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control name-discount-edit" id="name-discount-edit"
                                       placeholder="Enter name" name="name">
                                <span class="error-name error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Coupon Code</label>
                                <input type="text" class="form-control code-discount-edit" id="code-discount-edit"
                                       placeholder="Enter code" name="coupon_code">
                                <span class="error-code error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Percent Off</label>
                                <input type="number" class="form-control percent-discount-edit"
                                       id="percent-discount-edit"
                                       placeholder="Enter percent" name="percent_off" min="1">
                                <span class="error-percent error-data"></span>
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
        {{ $dataTable->table(['class' => 'table table-bordered table-hover' ,'max-width' => '100%'],true) }}
    </div>
@endsection
@push('style')
    <style>
        #discount-table_filter{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        #discount-table_paginate {
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

@section('lib')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>

@endsection
@section('script')

    {{ $dataTable->scripts() }}

    <script>
        $(document).ready(function () {
            $('#add-discount-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-data').html('');

                var nameValue = $('#name-discount').val();
                var codeValue = $('#code-discount').val();
                var percentValue = $('#percent-discount').val();


                $('#add-discount-form').validate({
                    rules: {
                        name: {
                            nullable: true,
                        },
                        percent_off: {
                            required: true,
                        },
                        coupon_code: {
                            nullable: true,
                        },
                    },
                    messages: {
                        percent_off: {
                            required: 'Phần trăm giảm giá là bắt buộc.',
                        },
                    }
                });

                $.ajax({
                    url: "{{ route('discount.store') }}",
                    method: "POST",
                    data: {
                        name: nameValue,
                        percent_off: percentValue,
                        coupon_code: codeValue,
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
                        $('#discount-table').DataTable().ajax.reload();
                    },
                    error: function (response) {
                        if (response.responseJSON.errors.name) {
                            $('.error-name').append(response.responseJSON.errors.name[0]);
                        }
                        if (response.responseJSON.errors.percent_off) {
                            $('.error-percent').append(response.responseJSON.errors.percent_off[0]);
                        }
                        if (response.responseJSON.errors.coupon_code) {
                            $('.error-code').append(response.responseJSON.errors.coupon_code[0]);
                        }
                    }
                });
            });

            $('#edit-discount-form').on('submit', function (e) {
                e.preventDefault();
                $('.error-data').html('');
                var url = '{{ route("discount.update", ":id") }}';
                var discountId = $('#id-discount-edit').val();
                url = url.replace(':id', discountId);

                var nameValue = $('#name-discount-edit').val();
                var codeValue = $('#code-discount-edit').val();
                var percentValue = $('#percent-discount-edit').val();


                $('#edit-discount-form').validate({
                    rules: {
                        percent_off: {
                            required: true,
                        },
                    },
                    messages: {
                        percent_off: {
                            required: 'Phần trăm giảm giá là bắt buộc.',
                        },
                    }
                });

                $.ajax({
                    url: url,
                    method: "PUT",
                    data: {
                        name: nameValue,
                        coupon_code: codeValue,
                        percent_off: percentValue,
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
                        $('#discount-table').DataTable().ajax.reload();
                    },
                    error: function (response) {
                        if (response.responseJSON.errors.name) {
                            $('.error-name').append(response.responseJSON.errors.name[0]);
                        }
                        if (response.responseJSON.errors.percent_off) {
                            $('.error-percent').append(response.responseJSON.errors.percent_off[0]);
                        }
                        if (response.responseJSON.errors.coupon_code) {
                            $('.error-code').append(response.responseJSON.errors.coupon_code[0]);
                        }
                    }
                });
            });

            // $('.click-reservationdatetime').on('click', function (e) {
            //     $("#reservationdatetime").click();
            // });
            //

        });

        function editDiscount(e) {
            var discountId = $(e).data('id');

            var data = $('#discount-table').DataTable().row($(e).closest('tr')).data();

            $('#id-discount-edit').val(discountId);
            $('#name-discount-edit').val(data.name);
            $('#code-discount-edit').val(data.coupon_code);
            $('#percent-discount-edit').val(data.percent_off);

            $('#exampleModalEdit').modal('show');
        }

        function deleteDiscount(e) {
            var url = '{{ route("discount.delete", ":id") }}';
            var discountId = $(e).data('id');
            url = url.replace(':id', discountId);

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
                                $('#discount-table').DataTable().ajax.reload();
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

