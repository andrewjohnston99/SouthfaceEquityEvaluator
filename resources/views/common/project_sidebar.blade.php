@isset($data['requiredQuestions'])
    <h3>Required Items</h3>
    <div class="required">
    @foreach ($data['requiredQuestions'] as $question)
        <div class="d-flex flex-row align-items-center">
            <i class="material-icons">radio_button_unchecked</i>
            <p>{{ $question->item->name }}</p>
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
            <p>{{ $question->item->name }}</p>
        </div>
    @endforeach
    </div>
@endisset
