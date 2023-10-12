<div class="description">
    <div class="short-description">
        <p class="short-description">
            {!! (substr($item->description, 0, 100 )) !!}
        </p>
    </div>
    <div class="full-description" style="display: none;">{!! $item->description !!}</div>
    <button class="btn btn-sm btn btn-primary btn-show-more" data-id="{{ $item->id }}" onclick="showDescription(this)">
        Show
    </button>
    <button class="btn btn-sm btn btn-secondary btn-close" style="display: none;" data-id="{{$item->id}}"
            onclick="hideDescription(this)">Hide
    </button>
</div>
