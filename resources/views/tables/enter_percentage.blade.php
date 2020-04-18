<tr class="text-center">
    <th scope="row" rowspan="{{ count($question->options) + 1 }}" class="align-middle">{{ $question->item->name }}</th>
        <td class="text-left align-middle">{{ $question->header }}</td>
        <td class="align-middle" colspan="2">Enter Percentage:</td>
        <td class="align-middle"></td>
</tr>
@foreach ($question->options as $option)
    <tr class="text-center">
        <td class="text-left align-middle">{{ $option->title }}</td>
    <td class="align-middle" id="percentPoints-{{ $option->id }}">{{ (isset($data['answers']) && array_search($option->id, array_column($data['answers']->toArray(), 'option_id')) !== false) ? $option->points : $option->label }}</td>
        <td class="align-middle">
        <input id="percent-{{ $option->id }}" name="percent-{{ $option->id }}" type="number" min="0" data-type={{ $option->order }} data-value="" {{ (isset($data['answers']) && array_search($option->id, array_column($data['answers']->toArray(), 'option_id')) !== false) ? 'value=' . $option->percentage : '' }} />
        </td>
        <td class="align-middle">
            <textarea id="note-{{ $option->note->id }}" name="note-{{ $option->note->id }}" class="form-control form-control-sm" placeholder="Example text..."></textarea>
        </td>
    </tr>
@endforeach
