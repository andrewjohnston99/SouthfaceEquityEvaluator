<form action="{{ route('projects.tables.update', ['project' => $data['id'], 'table' => $data['tableInfo']->abbrev])}}" method="POST" id="tableForm">
    @method('PUT')
    @csrf
    <div id="{{ $data['tableInfo']->abbrev }}" class="table-responsive">
        <table id="{{ $data['tableInfo']->abbrev }}Table" class="table table-bordered">
            <thead>
                <tr class="text-center header">
                    <th class="text-center align-middle font-weight-bold title" colspan="2">{{ strtoupper($data['tableInfo']->name) }}</th>
                    <th class="points">Points</th>
                    <th class="planned">Planned</th>
                    <th class="notes">Notes: DATE</th>
                </tr>
            </thead>
            <tbody>
                @isset($data['requiredQuestions'])
                    <tr class="table-warning header">
                        <th class="text-center" scope="col" colspan="6">REQUIRED</th>
                    </tr>
                    @foreach ($data['requiredQuestions'] as $question)
                        @if ($question->item->name == "PF 0.5")
                            <tr class="text-center">
                                <td class="font-weight-bold" colspan="5">Green Building Certification - EarthCraft, GreenGlobes, LEED, Other</td>
                            </tr>
                        @endif
                        @switch($question->type)
                            @case(1)
                                @include('tables.not_specified', ['question' => $question])
                                @break
                            @case(2)
                                @include('tables.yes_no', ['question' => $question])
                                @break
                            @case(3)
                                @include('tables.select_one', ['question' => $question])
                                @break
                            @case(4)
                                @include('tables.select_all', ['question' => $question])
                                @break
                            @case(5)
                                @include('tables.select_all', ['question' => $question])
                                @break
                            @case(6)
                                @include('tables.enter_percentage', ['question' => $question])
                                @break
                            @default
                                @include('tables.not_specified', ['question' => $question])
                                @break
                        @endswitch
                    @endforeach
                @endisset
                @isset($data['optionalQuestions'])
                    <tr class="table-info header">
                        <th class="text-center" scope="col" colspan="6">OPTIONAL</th>
                    </tr>
                    @foreach ($data['optionalQuestions'] as $question)
                        @if ($question->item->name == "PF 0.5")
                            <tr class="text-center">
                                <td class="font-weight-bold" colspan="5">Green Building Certification - EarthCraft, GreenGlobes, LEED, Other</td>
                            </tr>
                        @endif
                        @switch($question->type)
                            @case(1)
                                @include('tables.not_specified', ['question' => $question])
                                @break
                            @case(2)
                                @include('tables.yes_no', ['question' => $question])
                                @break
                            @case(3)
                                @include('tables.select_one', ['question' => $question])
                                @break
                            @case(4)
                                @include('tables.select_all', ['question' => $question])
                                @break
                            @case(5)
                                @include('tables.select_all', ['question' => $question])
                                @break
                            @case(6)
                                @include('tables.enter_percentage', ['question' => $question])
                                @break
                            @default
                                @include('tables.not_specified', ['question' => $question])
                        @endswitch
                    @endforeach
                @endisset
                <tr class="table-secondary text-center">
                    <td colspan="3">{{ strtoupper($data['tableInfo']->name) }} TOTAL</td>
                    <td id="tableScore" data-value="{{ $data['tableScore'] }}">{{ $data['tableScore'] }}</td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
