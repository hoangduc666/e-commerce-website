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
            <label for="exampleInputName1">Description</label>
            <textarea class="form-control description-product" rows="3" placeholder="Enter description ..."
                      id="description" name="description">{{ $product->description }}</textarea>
            <span class="error-message">{{ $errors->first('description') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Slug</label>
            <input type="text" class="form-control slug-product" id="slug-product"
                   placeholder="Enter slug" name="slug" value="{{ $product->slug }}">
            <span class="error-message">{{ $errors->first('slug') }}</span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endsection

@push('style')
    <style>
        .error-message {
            color: red;
        }
    </style>
@endpush

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

            $('#discounts').select2({
                ajax: ({
                    url: '{{route('discount.getAllDiscount')}}',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    text: item.percent_off,
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

        });

    </script>
@endsection
@section('lib')
    {{-- select 2 js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endsection
