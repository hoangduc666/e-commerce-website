<div style="display: flex; gap: 10px">
    @if($adminLogin->can('admin.update'))
        <input type="checkbox"
               onchange="changeActive(this)"
               class="change-status-admin"
               name="my-checkbox"
               @if($checked)  checked @endif data-url="{{ route('admin.changeStatus', $item->id) }}">
    @endif
</div>
