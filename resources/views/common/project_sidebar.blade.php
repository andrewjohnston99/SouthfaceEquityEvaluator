@isset($data['requiredItems'])
    <h3>Required Items</h3>
    <div class="required">
    @foreach ($data['requiredItems'] as $item)
        <div class="d-flex flex-row align-items-center">
            <i class="material-icons">radio_button_unchecked</i>
            <p>{{ $item->item }}</p>
        </div>
    @endforeach
    </div>
@endisset
@isset($data['optionalItems'])
    <h3>Optional Items</h3>
    <div class="optional">
    @foreach ($data['optionalItems'] as $item)
        <div class="d-flex flex-row align-items-center">
            <i class="material-icons">radio_button_unchecked</i>
            <p>{{ $item->item }}</p>
        </div>
    @endforeach
    </div>
@endisset
