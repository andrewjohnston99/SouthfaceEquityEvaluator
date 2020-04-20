<tr class="text-center">
    <th scope="row" rowspan="{{ count($question->options) + 1 }}" class="align-middle">{{ $question->item->name }}</th>
    <td class="text-left align-middle">{{ $question->header }}</td>
    <td class="align-middle" colspan="2">Select All That Apply:</td>
    <td class="align-middle"></td>
</tr>
@foreach ($question->options as $option)
    <tr class="text-center">
        <td class="text-left align-middle">{{ $option->title }}</td>
        <td class="align-middle">{{ isset($option->points) ? $option->points : $option->label }}</td>
        <td class="align-middle">
        <div class="pretty p-default p-thick p-smooth">
            <input id="option-{{ $option->id }}" name="option-{{ $option->id }}" type="checkbox" data-value="{{ $option->points }}" {{ (isset($data['answers']) && array_search($option->id, array_column($data['answers']->toArray(), 'option_id')) !== false) ? 'checked=checked' : '' }} />
            <div class="state p-success-o">
                <label></label>
            </div>
        </div>
        </td>
        <td class="align-middle">
            <textarea id="note-{{ $option->note->id }}" name="note-{{ $option->note->id }}" class="form-control form-control-sm" placeholder="Example text..."></textarea>
        </td>
    </tr>
@endforeach

