<div style="display: flex; gap: 10px">
    @if(Auth::guard('admin')->user()->can('discount.update'))
        <button class="fas fa-edit" style="color: #1ba2f0; border: none; font-size: 20px" data-id={{$item->id}} onclick="editDiscount(this)"></button>
    @endif
    @if(Auth::guard('admin')->user()->can('discount.delete'))
        <button class="fa fa-trash" style="color: red; border: none; font-size: 20px" data-id={{$item->id}} onclick="deleteDiscount(this)"></button>
    @endif

</div>
