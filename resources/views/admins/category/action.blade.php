<div style="display: flex; gap: 10px">
    @if(Auth::guard('admin')->user()->can('category.update'))
        <button class="fas fa-edit" style="color: #1ba2f0; border: none; font-size: 20px" data-id="{{$item->id}}" data-parent_id="{{ $item->parent_id }}" onclick="editCategory(this)"></button>
    @endif
    @if(Auth::guard('admin')->user()->can('category.delete'))
        <button class="fa fa-trash" style="color: red; border: none; font-size: 20px" data-id="{{$item->id}}" onclick="deleteCategory(this)"></button>
    @endif

</div>
