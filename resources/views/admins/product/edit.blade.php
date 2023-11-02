@extends('admins.layout.master')
@section('content')
    <div class="content-header" style="padding: 15px 0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <form id="edit-product-form" action="{{route('product.update',$product->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Category</label>
            <select class="js-example-basic-single name-parent" id="name-category"
                    name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{$product->category_id == $category->id ? 'selected' : ''}}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <span class="error-message">{{ $errors->first('category_id') }}</span>
        </div>
<<<<<<< HEAD

        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Parent Product</label>
            <select class="product-parent" id="parent-id" name="parent_id">
                @if(!is_null($product->parent))
                    <option value="{{ $product->parent_id }}" selected>
                        {{ optional($product->parent)->name  }}
                    </option>
                @endif
            </select>
            <span class="error-message">{{ $errors->first('parent_id') }}</span>
        </div>


=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Attribute</label>
            <select class="form-control select2" id="attributes" name="attributes[]" multiple>
                @foreach($attributes as $attribute)
                    <option value="{{ $attribute->id }}"  {{ $product->attributes->contains('id',$attribute->id) ? 'selected' : '' }}>
                        {{ $attribute->name . ' - ' . $attribute->value }}
                    </option>
                @endforeach
            </select>
            <span class="error-message">{{ $errors->first('attributes') }}</span>
        </div>
<<<<<<< HEAD
=======
        <div class="form-group" style="display: grid">
            <label for="exampleInputEmail1">Discount</label>
            <select class="form-control select2" id="discounts" name="discounts[]" multiple>
                @foreach($discounts as $discount)
                    <option value="{{ $discount->id }}" {{ $product->discounts->contains('id',$discount->id) ? 'selected' : '' }}>
                        {{ $discount->percent_off }}
                    </option>
                @endforeach
            </select>
            <span class="error-message">{{ $errors->first('discounts') }}</span>
        </div>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control name-product" id="name-product"
                   placeholder="Enter name" name="name" value="{{ $product->name }}">
            <span class="error-message">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Quantity</label>
            <input type="text" class="form-control quantity-product" id="quantity-product"
                   placeholder="Enter quantity" name="quantity" value="{{ $product->quantity }}">
            <span class="error-message">{{ $errors->first('quantity') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Price</label>
            <input type="text" class="form-control price-product" id="price-product"
                   placeholder="Enter price" name="price" value="{{ $product->price }}">
            <span class="error-message">{{ $errors->first('price') }}</span>
        </div>
        <div class="form-group">
<<<<<<< HEAD
            <label for="exampleInputName1">Slug</label>
            <input type="text" class="form-control slug-product" id="slug-product"
                   placeholder="Enter slug" name="slug" value="{{ $product->slug }}">
            <span class="error-message">{{ $errors->first('slug') }}</span>
        </div>
        <div class="form-group">
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            <label for="exampleInputName1">Description</label>
            <textarea class="form-control description-product" rows="3" placeholder="Enter description ..."
                      id="description" name="description">{{ $product->description }}</textarea>
            <span class="error-message">{{ $errors->first('description') }}</span>
        </div>
        <div class="form-group">
<<<<<<< HEAD
            <div class="form-group">
                <button type="button" class="btn btn-outline-info" id="addDiscountBtn">
                    <i class="fas fa-plus"></i>
                    Add Discount
                </button>
            </div>
            <div class="form-group" id="discountDisplayArea">
                @foreach($product->discounts as $key => $productDiscount)
                    <div class="form-row mb-2">
                        <div class="col-5">
                            <select class="form-control select2 discount-select" name="discounts[]">
                                @foreach($discounts as $discount)
                                    <option value="{{ $discount->id }}" @if($productDiscount->id == $discount->id) selected @endif>
                                        {{ $discount->coupon_code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" name="expiration_date[]" placeholder="Choose expiration date" value="{{ $expirationDates[$key] }}">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger btn-sm remove-discount">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endforeach


            </div>

=======
            <label for="exampleInputName1">Slug</label>
            <input type="text" class="form-control slug-product" id="slug-product"
                   placeholder="Enter slug" name="slug" value="{{ $product->slug }}">
            <span class="error-message">{{ $errors->first('slug') }}</span>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endsection

@push('style')
<<<<<<< HEAD
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
    <style>
        .error-message {
            color: red;
        }
<<<<<<< HEAD

        .select2-selection--single{
            height: 40px !important;
        }
    </style>
@endpush

@section('lib')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    {{-- select 2 js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
@endsection

=======
    </style>
@endpush

>>>>>>> dece221f309a6888873a1349df77751a0356c316
@section('script')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2({
                placeholder: 'Select an category',
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
                                }
                            })
                        };
                    },
                    cache: true
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

            // Kích hoạt datepicker cho các trường ngày
            $('.form-control[name="expiration_date[]"]').datepicker();


            $('.discount-select').select2({
=======
            $('#discounts').select2({
>>>>>>> dece221f309a6888873a1349df77751a0356c316
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
                })
            });

            $('.remove-discount').on('click', function (){
                $(this).closest('.form-row').remove();
            });


=======

                })
            });
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('media.upload-file', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            });

<<<<<<< HEAD
            // $('#datepicker-edit').datepicker();

            $('#addDiscountBtn').on('click', function () {
                // Tạo một số duy nhất để thêm vào id
                let uniqueId = Date.now();
                console.log(uniqueId);


                let discountForm =
                    `
                    <div class="form-row mb-2">
                        <div class="col-5">
                            <select class="form-control select2" id="discounts_${uniqueId}" name="discounts[]"></select>
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
