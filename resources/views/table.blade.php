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
                                    <input id="{{ 'option-' . $data['questions']->where('id', $item->question_id)->first()->options->first()->id . '-input' }}" class="planned-input" type="checkbox" data-value="{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->points }}" />
                                    <div class="state p-success-o">
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td id="h10" class="align-middle">
                                <textarea id="h10-input" class="form-control form-control-sm" placeholder="Example text..."></textarea>
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
                                        <input id="{{ $option->id }}-input" class="planned-input" type="checkbox" data-value="{{ $option->points }}" />
                                        <div class="state p-success-o">
                                            <label></label>
                                        </div>
                                    </div>
                                </td>
                                <td id="h10" class="align-middle">
                                    <textarea id="h10-input" class="form-control form-control-sm" placeholder="Example text..."></textarea>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            @endisset
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
                                    <input id="{{ 'option-' . $data['questions']->where('id', $item->question_id)->first()->options->first()->id . '-input' }}" class="planned-input" type="checkbox" data-value="{{ $data['questions']->where('id', $item->question_id)->first()->options->first()->points }}" />
                                    <div class="state p-success-o">
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td id="h10" class="align-middle">
                                <textarea id="h10-input" class="form-control form-control-sm" placeholder="Example text..."></textarea>
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
                                        <input id="{{ $option->id }}-input" class="planned-input" type="checkbox" data-value="{{ $option->points }}" />
                                        <div class="state p-success-o">
                                            <label></label>
                                        </div>
                                    </div>
                                </td>
                                <td id="h10" class="align-middle">
                                    <textarea id="h10-input" class="form-control form-control-sm" placeholder="Example text..."></textarea>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            @endisset
        </tbody>
    </table>
</div>
