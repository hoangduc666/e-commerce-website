@extends('admins.layout.master')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
        </div>
    </div>

@endsection
@section('content')
    <div>
        @if(Auth::guard('admin')->user()->can('product.create'))
            <a type="button" class="btn btn-primary" data-target="#exampleModal" href="{{route('product.create')}} ">
                <i class='far fa-window-restore'></i> Add
            </a>
        @endif
    </div>
    <div class="card-body">
        {{ $dataTable->table(['class' => 'table table-bordered table-hover' ,'max-width' => '100%'],true) }}
    </div>
@endsection

@section('script')
    {{ $dataTable->scripts() }}
    <script>
           function deleteProduct(e){
                var productId = $(e).data('id');
                var url = '{{route('product.delete',':id')}}';
                url = url.replace(':id', productId);

                Swal.fire({
                    title: 'Bạn có chắc chắn muốn thực hiện thao tác?',
                    text: "Thao tác này không thể hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Huỷ',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
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
                                    $('#product-table').DataTable().ajax.reload();
                                },
                                error: function (response) {
                                    iziToast.error({
                                        timeout: 5000,
                                        title: 'Đã có lỗi xảy ra !',
                                        icon: 'fas fa-exclamation-triangle',
                                        position: 'topRight'
                                    });
                                },

                            }),
                            'success'
                        )
                    }
                })
            }

           function changeActive(_this) {
               debugger;
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
                       $('#product-table').DataTable().ajax.reload();
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

           function showDescription(e) {
               var btnShowMore = $(e);
               var descriptionContainer = btnShowMore.closest('.description');
               var shortDescription = descriptionContainer.find('.short-description');
               var fullDescription = descriptionContainer.find('.full-description');
               var btnClose = descriptionContainer.find('.btn-close');


               shortDescription.hide();
               fullDescription.show();
               btnShowMore.hide();
               btnClose.show();

           }

           function hideDescription(e) {
               var btnClose = $(e);
               var descriptionContainer = btnClose.closest('.description');
               var shortDescription = descriptionContainer.find('.short-description');
               var fullDescription = descriptionContainer.find('.full-description');
               var btnShowMore = descriptionContainer.find('.btn-show-more');


               shortDescription.show();
               fullDescription.hide();
               btnClose.hide();
               btnShowMore.show();

           }

    </script>
@endsection

@section('lib')
    <script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection
