@extends('admins.layout.master')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Banner</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Banner</li>
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
                        <form id="add-banner-form">
                            <div class="form-group">
                                <label for="exampleInputName1">Order</label>
                                <input type="number" class="form-control order-banner" id="order-banner"
                                       placeholder="Enter order" name="order" min="1" value="1">
                                <span class="error-order error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alt Text</label>
                                <input type="text" class="form-control alt-banner" id="alt-banner"
                                       placeholder="Enter alt" name="alt_text">
                                <span class="error-alt error-data"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file" style="display: inline-table">
                                        {{--                                        <input type="file" class="custom-file-input image-banner" id="image-banner"--}}
                                        {{--                                               name="image_path" accept="image/*" onchange="loadFile(event)">--}}
                                        {{--                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                                        <input type="file" accept="image/*" onchange="loadFile(event)" id="upload"
                                               name="image_path">
                                        <img style="max-width: 100%;" id="output" class="img-thumbnail image-banner">
                                        <span class="error-image error-data"></span>
                                    </div>
                                </div>
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" class="form-control id-banner-edit" id="id-banner-edit">
                        <div class="modal-body">
                            <form id="edit-banner-form">
                                <div class="form-group">
                                    <label for="exampleInputName1">Order</label>
                                    <input type="number" class="form-control order-banner-edit" id="order-banner-edit"
                                           placeholder="Enter order" name="order" min="1">
                                    <span class="error-order error-data"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Alt Text</label>
                                    <input type="text" class="form-control alt-banner-edit" id="alt-banner-edit"
                                           placeholder="Enter alt" name="alt_text">
                                    <span class="error-alt error-data"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file" style="display: inline-table">
                                            <input type="file" accept="image/*" onchange="loadFileEdit(event)" id="upload-edit"
                                                   name="image_path">
                                            <img style="max-width: 100%;" id="output-edit" class="img-thumbnail image-banner">
                                            <span class="error-image error-data"></span>
                                        </div>
                                    </div>
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
                    #banner-table_filter{
                        display: flex;
                        flex-direction: row;
                        justify-content: flex-end;
                    }

                    #banner-table_paginate {
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
                $('.change-status-banner').each(function () {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })
                var loadFile = function (event) {
                    var reader = new FileReader();
                    reader.onload = function () {
                        var output = document.getElementById('output');
                        output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };

                var loadFileEdit = function (event) {
                    var reader = new FileReader();
                    reader.onload = function () {
                        var output = document.getElementById('output-edit');
                        output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };

                $(document).ready(function () {

                    $('#add-banner-form').on('submit', function (e) {
                        e.preventDefault();
                        $('.error-data').html('');

                        var orderValue = $('#order-banner').val();
                        var altValue = $('#alt-banner').val();
                        // var imageValue = $('#output').val();

                        var fileInput = $('#upload')[0];
                        var imageValue = fileInput.files[0];

                        $('#add-banner-form').validate({
                            rules: {
                                order: {
                                    required: true,
                                },
                                alt_text: {
                                    required: false,
                                    string: true,
                                },
                                image_path: {
                                    required: true,
                                },
                            },
                            messages: {
                                order: {
                                    required: 'Trường thứ tự là bắt buộc.'
                                },
                                alt_text: {
                                    string: 'Trường alt_text phải là chuỗi ký tự.',
                                },
                                image_path: {
                                    required: 'Trường đường dẫn hình ảnh là bắt buộc.'
                                },
                            }
                        });
                        // Tạo đối tượng FormData và thêm tệp vào nó
                        var formData = new FormData();
                        formData.append('order', orderValue);
                        formData.append('alt_text', altValue);
                        formData.append('image_path', imageValue);

                        $.ajax({
                            url: "{{ route('banner.store') }}",
                            type: "POST",
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                $('#exampleModal').modal('hide');

                                iziToast.success({
                                    timeout: 5000,
                                    title: 'Thành công',
                                    icon: 'fa fa-check-circle',
                                    position: 'topRight'
                                });

                                //load lại datatable
                                $('#banner-table').DataTable().ajax.reload();

                            },
                            error: function (response) {
                                if (response.responseJSON.errors.order) {
                                    $('.error-order').append(response.responseJSON.errors.order[0]);
                                }
                                if (response.responseJSON.errors.alt_text) {
                                    $('.error-alt').append(response.responseJSON.errors.alt_text[0]);
                                }
                                if (response.responseJSON.errors.image_path) {
                                    $('.error-image').append(response.responseJSON.errors.image_path[0]);
                                }
                            }
                        });

                    })

                    {{--$('#edit-banner-form').on('submit', function (e) {--}}
                    {{--    let url = " {{ route('banner.update', ':id') }}";--}}
                    {{--    e.preventDefault();--}}
                    {{--    $('.error-data').html('');--}}
                    {{--    var bannerId = $('#id-banner-edit').val();--}}
                    {{--    url = url.replace(":id", bannerId);--}}

                    {{--    var orderEditValue = $('#order-banner-edit').val();--}}
                    {{--    var altEditValue = $('#alt-banner-edit').val();--}}
                    {{--    var imgSrc = $('#output-edit').attr('src');--}}



                    {{--    console.log(orderEditValue)--}}
                    {{--    console.log(altEditValue)--}}
                    {{--    console.log(imgSrc)--}}

                    {{--    $('#edit-banner-form').validate({--}}
                    {{--        rules: {--}}
                    {{--            order: {--}}
                    {{--                required: true,--}}
                    {{--            },--}}
                    {{--            alt_text: {--}}
                    {{--                required: false,--}}
                    {{--                string: true,--}}
                    {{--            },--}}
                    {{--            image_path: {--}}
                    {{--                required: true,--}}
                    {{--            },--}}
                    {{--        },--}}
                    {{--        messages: {--}}
                    {{--            order: {--}}
                    {{--                required: 'Trường thứ tự là bắt buộc.'--}}
                    {{--            },--}}
                    {{--            alt_text: {--}}
                    {{--                string: 'Trường alt_text phải là chuỗi ký tự.',--}}
                    {{--            },--}}
                    {{--            image_path: {--}}
                    {{--                required: 'Trường đường dẫn hình ảnh là bắt buộc.'--}}
                    {{--            },--}}
                    {{--        }--}}
                    {{--    });--}}
                    {{--    // Tạo đối tượng FormData và thêm tệp vào nó--}}
                    {{--    var formData = new FormData();--}}
                    {{--    formData.append('order', orderEditValue);--}}
                    {{--    formData.append('alt_text', altEditValue);--}}
                    {{--    formData.append('image_path', imgSrc);--}}


                    {{--    $.ajax({--}}
                    {{--        url: url,--}}
                    {{--        method: "POST",--}}
                    {{--        data: formData,--}}
                    {{--        dataType: 'json',--}}
                    {{--        processData: false,--}}
                    {{--        contentType: false,--}}
                    {{--            success: function () {--}}
                    {{--                $('#exampleModalEdit').modal('hide');--}}

                    {{--                iziToast.success({--}}
                    {{--                    timeout: 5000,--}}
                    {{--                    title: 'Thành công',--}}
                    {{--                    icon: 'fa fa-check-circle',--}}
                    {{--                    position: 'topRight'--}}
                    {{--                });--}}

                    {{--                // Load lại datatable--}}
                    {{--                $('#banner-table').DataTable().ajax.reload();--}}
                    {{--            },--}}
                    {{--            error: function (response) {--}}
                    {{--                if (response.responseJSON.errors.order) {--}}
                    {{--                    $('.error-order').append(response.responseJSON.errors.order[0]);--}}
                    {{--                }--}}
                    {{--                if (response.responseJSON.errors.alt_text) {--}}
                    {{--                    $('.error-alt').append(response.responseJSON.errors.alt_text[0]);--}}
                    {{--                }--}}
                    {{--                if (response.responseJSON.errors.image_path) {--}}
                    {{--                    $('.error-image').append(response.responseJSON.errors.image_path[0]);--}}
                    {{--                }--}}
                    {{--            }--}}
                    {{--        });--}}
                    {{--});--}}

                    $('#edit-banner-form').on('submit', function (e) {
                        let url = "{{ route('banner.update', ':id') }}";
                        e.preventDefault();
                        $('.error-data').html();
                        var bannerId = $('#id-banner-edit').val();
                        url = url.replace(":id", bannerId);

                        var orderEditValue = $('#order-banner-edit').val();
                        var altEditValue = $('#alt-banner-edit').val();
                        var imageUrl = $('#output-edit').attr('src');

                        // Sử dụng fetch để tải hình ảnh từ URL
                        fetch(imageUrl)
                            .then(response => response.blob())
                            .then(blob => {
                                // Tạo đối tượng FormData và thêm các giá trị
                                var formData = new FormData();
                                formData.append('order', orderEditValue);
                                formData.append('alt_text', altEditValue);
                                formData.append('image_path', blob);

                                // Gửi yêu cầu POST với FormData
                                $.ajax({
                                    url: url,
                                    method: "POST",
                                    data: formData,
                                    dataType: 'json',
                                    processData: false,
                                    contentType: false,
                                    success: function () {
                                        $('#exampleModalEdit').modal('hide');

                                        iziToast.success({
                                            timeout: 5000,
                                            title: 'Thành công',
                                            icon: 'fa fa-check-circle',
                                            position: 'topRight'
                                        });

                                        // Load lại datatable
                                        $('#banner-table').DataTable().ajax.reload();
                                    },
                                    error: function (response) {
                                        if (response.responseJSON.errors.order) {
                                            $('.error-order').append(response.responseJSON.errors.order[0]);
                                        }
                                        if (response.responseJSON.errors.alt_text) {
                                            $('.error-alt').append(response.responseJSON.errors.alt_text[0]);
                                        }
                                        if (response.responseJSON.errors.image_path) {
                                            $('.error-image').append(response.responseJSON.errors.image_path[0]);
                                        }
                                    }
                                });
                            })
                    });

                });


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
                            $('#banner-table').DataTable().ajax.reload();
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

                function editBanner(e) {
                    //lấy data người dùng từ thuộc tính data-id
                    var bannerId = $(e).data('id');
                    // Lấy dòng tương ứng trong bảng DataTables
                    var dataTable = $('#banner-table').DataTable();
                    var row = dataTable.row($(e).closest('tr'));

                    //lấy dữ liệu từ dòng
                    var data = row.data();

                    //điển thông tin vào form sửa
                    $('#id-banner-edit').val(bannerId)
                    $('#order-banner-edit').val(data.order)
                    $('#alt-banner-edit').val(data.alt_text)

                    //tìm img trong data.image_path và lấy đường dẫn hình ảnh
                    var imgSrc = $(data.image_path).attr('src');

                   $('#output-edit').attr('src', imgSrc);


                    //hiển thị form sửa
                    $('#exampleModalEdit').modal('show');

                }

                function deleteBanner(e) {
                    var bannerId = $(e).data('id');
                    let url = "{{ route('banner.delete', ':id' )}}";
                    url = url.replace(":id", bannerId);

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
                                        $('#banner-table').DataTable().ajax.reload();

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
                {{--validate js--}}
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
                <script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection
