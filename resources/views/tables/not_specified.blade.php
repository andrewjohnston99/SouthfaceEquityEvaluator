<tr class="text-center">
    <th scope="row" class="align-middle">{{ $question->item->name }}</th>
    <td class="text-left align-middle">{{ $question->header }}</td>
    <td class="align-middle">{{ isset($question->options->first()->points) ? $question->options->first()->points : $question->options->first()->label }}</td>
    <td class="align-middle">
        <div class="pretty p-default p-thick p-smooth">
            <input id="option-{{ $question->options->first()->id }}" name="option-{{ $question->options->first()->id }}" type="checkbox" data-value="{{ $question->options->first()->points }}" {{ isset($data['optionalAnswers']) && array_search($question->options->first()->id, array_column($data['optionalAnswers']->toArray(), 'option_id')) != false ? 'checked="checked"' : '' }}/>
            <div class="state p-success-o">
                <label></label>
            </div>
        </div>
    </td>
    <td class="align-middle">
        <textarea id="note-{{ $question->options->first()->note->id }}" name="note-{{ $question->options->first()->note->id }}" class="form-control form-control-sm" placeholder="Example text...">{{ !is_null($question->options->first()->note->text) ? $question->options->first()->note->text : '' }}</textarea>
    </td>
</tr>
