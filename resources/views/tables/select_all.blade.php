<tr class="text-center">
<th scope="row" rowspan="{{ count($question->options) + 1 }}" class="align-middle">{{ $question->item->name }}</th>
    <td class="text-left align-middle">{{ $question->header }}</td>
    <td class="align-middle" colspan="2">Select One:</td>
    <td class="align-middle">-</td>
</tr>
@foreach ($question->options as $option)
    @if ($loop->first)
        <tr class="text-center">
            <td class="text-left align-middle">{{ $option->title }}</td>
            <td class="align-middle">{{ isset($option->label) ? $option->label : $option->points }}</td>
            <td class="align-middle" rowspan="{{ $loop->count }}">
            <select multiple name="option-{{ $option->id }}" id="option-{{ $option->id }}">
                    @foreach ($option->question->options as $item)
                        <option value="{{ isset($item->points) ? $item->points : '' }}">{{ $item->label }}</option>
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
            <td class="align-middle">{{ isset($option->label) ? $option->label : $option->points }}</td>
        </tr>
    @endif
@endforeach

