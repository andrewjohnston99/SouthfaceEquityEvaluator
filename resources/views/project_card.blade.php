<a id="project-{{ $project['id'] }}" class="project-card d-flex flex-column" type="submit" href="/projects/{{ $project['id'] }}">
    <div class="row project-title">
        <h2>{{ $project['title'] }}</h2>
        <i class="material-icons align-middle btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</i>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button class="dropdown-item delete-toggle" data-toggle="modal" data-target="#deleteModal" type="button">Delete Project</button>
        </div>
    </div>
    <div class="row">
        <h3><strong>Anticipated Start Date:</strong> {{ $project['start'] }}</h3>
    </div>
    <div class="row">
        <h3><strong>Project Meeting Date:</strong> {{ $project['meeting'] }}</h3>
    </div>
    <div class="row">
        <h3 class="site-address"><strong>Site Address:</strong> {!! nl2br(e($project['address'])) !!}</h3>
    </div>
</a>
