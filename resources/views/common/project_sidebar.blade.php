@isset($data['requiredQuestions'])
    <h3>Required Items</h3>
    <div class="required">
    @foreach ($data['requiredQuestions'] as $question)
        <div class="d-flex flex-row align-items-center">
            <i class="material-icons">radio_button_unchecked</i>
            <button type="button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{ isset($question->item->instructions) ? $question->item->instructions : 'No extra instructions here!' }}">{{ $question->item->name }}</button>
        </div>
    @endforeach
    </div>
@endisset
@isset($data['optionalQuestions'])
    <h3>Optional Items</h3>
    <div class="optional">
    @foreach ($data['optionalQuestions'] as $question)
        <div class="d-flex flex-row align-items-center">
            <i class="material-icons">radio_button_unchecked</i>
            <button type="button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{ isset($question->item->instructions) ? $question->item->instructions : 'No extra instructions here!' }}">{{ $question->item->name }}</button>
        </div>
    @endforeach
    </div>
@endisset
