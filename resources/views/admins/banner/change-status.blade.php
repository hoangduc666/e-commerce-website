<div style="display: flex; gap: 10px">
    @if(Auth::guard('admin')->user()->can('banner.update'))
        <input type="checkbox"
               onchange="changeActive(this)"
               class="change-status-banner"
               name="my-checkbox"
               @if($checked)  checked @endif data-url="{{ route('banner.changeStatus', $item->id) }}">
    @endif
</div>
