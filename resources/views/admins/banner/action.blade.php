<div style="display: flex; gap: 10px">
    @if(Auth::guard('admin')->user()->can('banner.update'))
        <button class="fas fa-edit" style="color: #1ba2f0; border: none; font-size: 20px" data-id={{$item->id}} onclick="editBanner(this)"></button>
    @endif
    @if(Auth::guard('admin')->user()->can('banner.delete'))
        <button class="fa fa-trash" style="color: red; border: none; font-size: 20px" data-id={{$item->id}} onclick="deleteBanner(this)"></button>
    @endif

</div>
