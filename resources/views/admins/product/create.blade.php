@extends('admins.layout.master')
@section('content')
    <div class="content-header" style="padding: 15px 0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <form id="add-product-form" action="{{route('product.store')}}" method="POST">
        @csrf
        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Category</label>
            <select class="form-control select2" id="category_id"
                    name="category_id"></select>
            <span class="error-message">{{ $errors->first('category_id') }}</span>
        </div>
        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Parent Product</label>
            <select class="form-control select2" id="parent-id"
                    name="parent_id"></select>
            <span class="error-message">{{ $errors->first('parent_id') }}</span>
        </div>
        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Attribute</label>
            <select class="form-control select2" id="attributes" name="attributes[]" multiple></select>
            <span class="error-message">{{ $errors->first('attributes') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control name-product" id="name-product"
                   placeholder="Enter name" name="name">
            <span class="error-message">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Quantity</label>
            <input type="number" class="form-control quantity-product" id="quantity-product"
                   placeholder="Enter quantity" name="quantity" min="0" value="0">

            <span class="error-message">{{ $errors->first('quantity') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Price</label>
            <input type="number" class="form-control price-product" id="price-product"
                   placeholder="Enter price" name="price" min="0" value="0">
            <span class="error-message">{{ $errors->first('price') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Slug</label>
            <input type="text" class="form-control slug-product" id="slug-product"
                   placeholder="Enter slug" name="slug">
            <span class="error-message">{{ $errors->first('slug') }}</span>
        </div>
        <DIV id="dropzone">
            <label for="exampleInputName1">Image Product</label>
            <div enctype="multipart/form-data" id="recommendationDiv">
                <div class="form-group">
                    <div class="needsclick dropzone" id="document-dropzone">
                        <span class="dz-message needsclick">
                            Drop files here or click to upload
                        </span>
                    </div>
                </div>
            </div>
        </DIV>
        <div class="form-group">
            <label for="exampleInputName1">Alt Text</label>
            <input type="text" class="form-control text-product" id="text-product"
                   placeholder="Enter text" name="alt_text">
            <span class="error-message">{{ $errors->first('alt_text') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Description</label>
            <textarea class="form-control description-product" rows="3" placeholder="Enter description ..."
                      id="description" name="description"></textarea>
            <span class="error-message">{{ $errors->first('description') }}</span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <div class="form-group">
            <div class="form-group">
                <button type="button" class="btn btn-outline-info" id="addDiscountBtn">
                    <i class="fas fa-plus"></i>
                    Add Discount
                </button>
            </div>
            <div class="form-group" id="discountDisplayArea">

            </div>
        </div>
    </form>
@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
          rel="stylesheet">
    <style>
        .error-message {
            color: red;
        }
        .select2-selection--single {
            height: 40px !important;

        }

        /*.select2-container--default{*/
        /*    max-width: 100% !important;*/
        /*}*/
        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed rgb(0, 135, 247);
            border-image: none;
            margin-left: auto;
            margin-right: auto;
        }
        .dz-message{
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('lib')
    {{-- dropzone js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    {{-- select 2 js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () {
            $('#category_id').select2({
                ajax: ({
                    url: '{{route('category.getCategoryParent')}}',
                    delay: 250,
                    dropdownAutoWidth: true,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: true,
                    allowClear: true,
                })
            });

            $('#parent-id').select2({
                ajax: ({
                    url: '{{route('product.getProductParent')}}',
                    delay: 250,
                    dropdownAutoWidth: true,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: true,
                    allowClear: true,
                })
            });

            $('#attributes').select2({
                ajax: ({
                    url: '{{route('attribute.getAllAttribute')}}',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    text: item.name + ' - ' + item.value,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    allowClear: true,

                })
            });

            $('#discounts').select2({
                ajax: ({
                    url: '{{route('discount.getAllDiscount')}}',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    text: item.coupon_code,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    allowClear: true,


                })
            });

            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('media.upload-file', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            });

            // $('#datepicker').datepicker();

            $('#addDiscountBtn').on('click', function () {
                // Tạo một số duy nhất để thêm vào id
                let uniqueId = Date.now();
                console.log(uniqueId);


                let discountForm =
                    `
                    <div class="form-row mb-2">
                        <div class="col-5">
                            <select class="form-control select2" id="discounts_${uniqueId}" name="discounts[]" ></select>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" name="expiration_date[]" placeholder="Choose expiration date">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger btn-sm remove-discount">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                `;

                // Thêm form vào discountDisplayArea
                $('#discountDisplayArea').append(discountForm);


                $(`#discounts_${uniqueId}`).select2({
                    ajax: ({
                        url: '{{route('discount.getAllDiscount')}}',
                        delay: 250,
                        processResults: function (data) {
                            return {
                                results: data.map(function (item) {
                                    return {
                                        text: item.coupon_code,
                                        id: item.id,
                                    }
                                })
                            };
                        },
                        allowClear: true,
                    })
                });



                $('.remove-discount').on('click', function () {
                    $(this).closest('.form-row').remove();
                });


                // Kích hoạt datepicker cho các trường ngày
                $('.form-control[name="expiration_date[]"]').datepicker();
            });
        });



        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: "{{ route('media.dropzoneUpload') }}",
            maxFilesize: 20, // MB
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="image_path[]" value="' + response.image + '">');
                uploadedDocumentMap[file.name] = response.name;
                console.log(response)
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
        }

    </script>
@endsection

