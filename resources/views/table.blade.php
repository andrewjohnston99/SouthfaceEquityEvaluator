<form action="{{ route('projects.tables.update', ['project' => $data['id'], 'table' => $data['tableInfo']->abbrev]) }}" method="POST" id="tableForm">
    @method('PUT')
    @csrf
    <div id="{{ $data['tableInfo']->abbrev }}" class="table-responsive">
        <table id="{{ $data['tableInfo']->abbrev . 'Table' }}" class="table table-bordered">
            <thead>
                <tr class="text-center header">
                    <th class="text-center align-middle font-weight-bold title" colspan="2">{{ strtoupper($data['tableInfo']->name) }}</th>
                    <th class="points">Points</th>
                    <th class="planned">Planned</th>
                    <th class="notes">Notes: DATE</th>
                </tr>
            </thead>
            <tbody>
                @isset($data['requiredItems'])
                    <tr class="table-info header">
                        <th class="text-center" scope="col" colspan="6">REQUIRED</th>
                    </tr>
                    @foreach ($data['requiredItems'] as $item)
                        @if (count($data['questions']->where('id', $item->question_id)->first()->options) == 1)
                            <tr class="text-center">
                                <th scope="row" class="align-middle">{{ $item->item }}</th>
                                <td class="text-left align-middle">{{ $data['questions']->where('id', $item->question_id)->pluck('header')->first() }}</td>
                                <td class="align-middle">{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->points }}</td>
                                <td id="{{ 'option-' . $data['questions']->where('id', $item->question_id)->first()->options->first()->id}}" class="align-middle">
                                    <div class="pretty p-default p-thick p-smooth">
                                        <input id="{{ 'option-' . $data['questions']->where('id', $item->question_id)->first()->options->first()->id . '-input' }}" name="{{ 'option-' . $data['questions']->where('id', $item->question_id)->first()->options->first()->id . '-input' }}" class="planned-input" type="checkbox" data-value="{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->points }}" />
                                        <div class="state p-success-o">
                                            <label></label>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <textarea id="option-{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->id }}-note" name="option-{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->id }}-note" class="form-control form-control-sm" placeholder="Example text..."></textarea>
                                </td>
                            </tr>
                        @else
                            <tr class="text-center">
                                <th scope="row" rowspan="{{ count($data['questions']->where('id', $item->question_id)->first()->options) + 2 }}" class="align-middle">{{ $item->item }}</th>
                            </tr>
                            <tr class="text-center">
                                <td class="text-left align-middle">{{ $data['questions']->where('id', $item->question_id)->pluck('header')->first() }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach ($data['questions']->where('id', $item->question_id)->first()->options as $option)
                                <tr class="text-center">
                                    <td class="text-left align-middle">{{ $option->title }}</td>
                                    <td class="align-middle">{{ $option->points }}</td>
                                    <td class="align-middle">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input id="option-{{ $option->id }}-input" name="option-{{ $option->id }}-input" class="planned-input" type="checkbox" data-value="{{ $option->points }}" />
                                            <div class="state p-success-o">
                                                <label></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <textarea id="option-{{ $option->id }}-note" name="option-{{ $option->id }}-note" class="form-control form-control-sm" placeholder="Example text..."></textarea>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                @endisset
                @isset($data['optionalItems'])
                    <tr class="table-info header">
                        <th class="text-center" scope="col" colspan="6">OPTIONAL</th>
                    </tr>
                    @foreach ($data['optionalItems'] as $item)
                        @if (count($data['questions']->where('id', $item->question_id)->first()->options) == 1)
                            <tr class="text-center">
                                <th scope="row" class="align-middle">{{ $item->item }}</th>
                                <td class="text-left align-middle">{{ $data['questions']->where('id', $item->question_id)->pluck('header')->first() }}</td>
                                <td class="align-middle">{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->points }}</td>
                                <td id="{{ 'option-' . $data['questions']->where('id', $item->question_id)->first()->options->first()->id}}" class="align-middle">
                                    <div class="pretty p-default p-thick p-smooth">
                                        <input id="option-{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->id}}" name="option-{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->id}}" type="checkbox" data-value="{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->points }}" {{ !is_null($item->option_id) ? 'checked="checked"' : '' }}/>
                                        <div class="state p-success-o">
                                            <label></label>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <textarea id="note-{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->note->id }}" name="note-{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->note->id }}" class="form-control form-control-sm" placeholder="Example text...">{{ !is_null($data['questions']->where('id', $item->question_id)->first()->options->first()->note->text) ? $data['questions']->where('id', $item->question_id)->first()->options->first()->note->text : '' }}</textarea>
                                </td>
                            </tr>
                        @else
                            <tr class="text-center">
                                <th scope="row" rowspan="{{ count($data['questions']->where('id', $item->question_id)->first()->options) + 2 }}" class="align-middle">{{ $item->item }}</th>
                            </tr>
                            <tr class="text-center">
                                <td class="text-left align-middle">{{ $data['questions']->where('id', $item->question_id)->pluck('header')->first() }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach ($data['questions']->where('id', $item->question_id)->first()->options as $option)
                                <tr class="text-center">
                                    <td class="text-left align-middle">{{ $option->title }}</td>
                                    <td class="align-middle">{{ $option->points }}</td>
                                    <td class="align-middle">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input id="option-{{ $option->id }}" name="option-{{ $option->id }}" type="checkbox" data-value="{{ $option->points }}" {{ !is_null($item->option_id) ? 'checked="checked"' : '' }} />
                                            <div class="state p-success-o">
                                                <label></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                    <textarea id="note-{{ $option->note->id }}" name="note-{{ $option->note->id }}" class="form-control form-control-sm" placeholder="Example text...">{{ !is_null($option->note->text) ? $option->note->text : '' }}</textarea>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                @endisset
                <tr class="table-secondary text-center">
                    <td colspan="3">{{ strtoupper($data['tableInfo']->name) }} TOTAL</td>
                    <td id="equity_planned">{{ $data['tableScore'] }}</td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
