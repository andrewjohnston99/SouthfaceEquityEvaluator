<tr class="text-center">
    <th scope="row" rowspan="{{ count($question->options) + 1 }}" class="align-middle">{{ $question->item->name }}</th>
    <td class="text-left align-middle">{{ $question->header }}</td>
    <td class="align-middle" colspan="2">Select One:</td>
    <td class="align-middle"></td>
</tr>
@foreach ($question->options as $option)
    @if ($loop->first)
        <tr class="text-center">
            <td class="text-left align-middle">{{ $option->title }}</td>
            <td class="align-middle">{{ isset($option->points) ? $option->points : $option->label }}</td>
            <td class="align-middle" rowspan="{{ $loop->count }}">
                <select class="form-control" name="select-{{ $option->id }}" id="select-{{ $option->id }}">
                    <option value="">Select an item</option>
                    @foreach ($option->question->options as $item)
                        <option value="{{ $item->id }}" {{ (isset($data['answers']) && array_search($item->id, array_column($data['answers']->toArray(), 'option_id')) !== false) ? 'selected="selected"' : '' }}>{{ $item->label }}</option>
                    @endforeach
                </select>
            </td>
            <td class="align-middle" rowspan="{{ $loop->count }}">
                <textarea id="note-{{ $option->note->id }}" name="note-{{ $option->note->id }}" class="form-control form-control-sm" placeholder="Example text..."></textarea>
            </td>
        </tr>
    @else
        <tr class="text-center">
            <td class="text-left align-middle">{{ $option->title }}</td>
            <td class="align-middle">{{ isset($option->points) ? $option->points : $option->label }}</td>
        </tr>
    @endif
@endforeach

