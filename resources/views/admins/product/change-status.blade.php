<div style="display: flex; gap: 10px">
    @if(Auth::guard('admin')->user()->can('product.update'))
        <input type="checkbox"
               onchange="changeActive(this)"
               class="change-status-product"
               name="my-checkbox"
               @if($checked)  checked @endif data-url="{{ route('product.changeStatus', $item->id) }}">
    @endif
</div>
