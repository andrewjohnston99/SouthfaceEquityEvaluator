Hi {{ $data['user'] }}! Below you'll find all the information we have stored about your project.

<hr>
<br>
<h1>Project Details:</h1>
<strong>Project Title:</strong> {{ $data['title'] }} <br>
<strong>Project Owner:</strong> {{ $data['user'] }} <br>
<strong>Associated Marta Station:</strong> {{ $data['station'] }} <br>

<div style="margin-bottom: 40px;"></div>

@component('mail::panel')
<h2 class="text-center">Score Breakdown</h2>
@component('mail::table')
| Table       |          | Score  |
| ------------- |:-------------:| --------:|
@foreach ($data['tables'] as $table)
| {{ $table->name }}     |       | {{ $data['scores'][$table->abbrev]}}      |
@endforeach
| **Total** |       | **{{ $data['scores']['total'] }}**  |
@endcomponent
@endcomponent

<em>This report was generated on {{ $data['date'] }} at {{ $data['time'] }}.</em>
