<div style="display: flex; gap: 10px">
    @if(Auth::guard('admin')->user()->can('product.update'))
        <a class="fas fa-edit" style="color: #1ba2f0; border: none; font-size: 20px" href="{{route('product.edit',$item->id)}}" ></a>
    @endif
    @if(Auth::guard('admin')->user()->can('product.delete'))
        <button type="button" class="fa fa-trash" style="color: red; border: none; font-size: 20px" data-id={{$item->id}} onclick="deleteProduct(this)"></button>
    @endif
</div>
