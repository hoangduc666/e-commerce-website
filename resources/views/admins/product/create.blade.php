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
<<<<<<< HEAD
            <label for="exampleInputEmail1">Parent Product</label>
            <select class="form-control select2" id="parent-id"
                    name="parent_id"></select>
            <span class="error-message">{{ $errors->first('parent_id') }}</span>
        </div>
        <div class="form-group" style="display: grid">
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            <label for="exampleInputEmail1">Attribute</label>
            <select class="form-control select2" id="attributes" name="attributes[]" multiple></select>
            <span class="error-message">{{ $errors->first('attributes') }}</span>
        </div>
<<<<<<< HEAD
=======
        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Discount</label>
            <select class="form-control select2" id="discounts" name="discounts[]" multiple></select>
            <span class="error-message">{{ $errors->first('discounts') }}</span>
        </div>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control name-product" id="name-product"
                   placeholder="Enter name" name="name">
            <span class="error-message">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Quantity</label>
<<<<<<< HEAD
            <input type="number" class="form-control quantity-product" id="quantity-product"
                   placeholder="Enter quantity" name="quantity" min="0" value="0">
=======
            <input type="text" class="form-control quantity-product" id="quantity-product"
                   placeholder="Enter quantity" name="quantity">
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            <span class="error-message">{{ $errors->first('quantity') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Price</label>
<<<<<<< HEAD
            <input type="number" class="form-control price-product" id="price-product"
                   placeholder="Enter price" name="price" min="0" value="0">
=======
            <input type="text" class="form-control price-product" id="price-product"
                   placeholder="Enter price" name="price">
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            <span class="error-message">{{ $errors->first('price') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Slug</label>
            <input type="text" class="form-control slug-product" id="slug-product"
                   placeholder="Enter slug" name="slug">
            <span class="error-message">{{ $errors->first('slug') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Description</label>
            <textarea class="form-control description-product" rows="3" placeholder="Enter description ..."
                      id="description" name="description"></textarea>
            <span class="error-message">{{ $errors->first('description') }}</span>
        </div>
<<<<<<< HEAD
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
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endsection

@push('style')
<<<<<<< HEAD
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
          rel="stylesheet">
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
    <style>
        .error-message {
            color: red;
        }
<<<<<<< HEAD

        .select2-selection--single {
            height: 40px !important;

        }

        /*.select2-container--default{*/
        /*    max-width: 100% !important;*/
        /*}*/
    </style>
@endpush

@section('lib')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    {{-- select 2 js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
@endsection

=======
        .select2-selection--single {
            height: 40px !important;
        }
    </style>
@endpush

>>>>>>> dece221f309a6888873a1349df77751a0356c316
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

<<<<<<< HEAD

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

=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            $('#attributes').select2({
                ajax: ({
                    url: '{{route('attribute.getAllAttribute')}}',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
<<<<<<< HEAD
                                    text: item.name + ' - ' + item.value,
=======
                                    text: item.name +' - ' + item.value,
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
<<<<<<< HEAD
                                    text: item.coupon_code,
=======
                                    text: item.percent_off,
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                                    id: item.id,
                                }
                            })
                        };
                    },
                    allowClear: true,
<<<<<<< HEAD
=======

>>>>>>> dece221f309a6888873a1349df77751a0356c316
                })
            });

            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('media.upload-file', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            });


<<<<<<< HEAD
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


=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        });

    </script>
@endsection
<<<<<<< HEAD

=======
@section('lib')
    {{-- select 2 js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endsection
>>>>>>> dece221f309a6888873a1349df77751a0356c316
