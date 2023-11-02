<div style="display: flex; gap: 10px">
    @if(Auth::guard('admin')->user()->can('product.update'))
        <a class="fas fa-edit" style="color: #1ba2f0; border: none; font-size: 20px" href="{{route('product.edit',$item->id)}}" ></a>
    @endif
    @if(Auth::guard('admin')->user()->can('product.delete'))
        <button type="button" class="fa fa-trash" style="color: red; border: none; font-size: 20px" data-id={{$item->id}} onclick="deleteProduct(this)"></button>
    @endif
<<<<<<< HEAD
    @if(Auth::guard('admin')->user()->can('product.store'))
            <a class="fas fa-clone" style="color: #FFD700; border: none; font-size: 20px" href="{{route('product.copy',$item->id)}}" ></a>
    @endif
=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
</div>
