<a id="project-{{ array_search($project, $projects) }}" class="project-card d-flex flex-column" type="submit" href="/projects/{{ array_search($project, $projects) }}">
    <div class="row project-title">
        <h2>{{ $project['title'] }}</h2>
    </div>
    <div class="row">
        <h3><strong>Kickoff Date:</strong> {{ $project['kickoff'] }}</h3>
    </div>
    <div class="row">
        <h3><strong>Charrette Date:</strong> {{ $project['charrette'] }}</h3>
    </div>
    <div class="row">
        <h3 class="site-address"><strong>Site Address:</strong> {!! nl2br(e($project['address'])) !!}</h3>
    </div>
</a>
