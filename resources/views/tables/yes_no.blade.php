<tr class="text-center">
    <th scope="row" class="align-middle">{{ $question->item->name }}</th>
    <td class="text-left align-middle">{{ $question->header }}</td>
    <td class="align-middle">{{ $question->options->first()->label }}</td>
    <td class="align-middle">
        <select class="form-control" id="option-{{ $question->options->first()->id }}" name="option-{{ $question->options->first()->id }}">
            <option>Yes</option>
            <option>No</option>
        </select>
    </td>
    <td class="align-middle">
        <textarea id="note-{{ $question->options->first()->note->id }}" name="note-{{ $question->options->first()->note->id }}" class="form-control form-control-sm" placeholder="Example text...">{{ !is_null($question->options->first()->note->text) ? $question->options->first()->note->text : '' }}</textarea>
    </td>
</tr>
