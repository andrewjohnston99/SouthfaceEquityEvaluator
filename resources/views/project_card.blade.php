<a id="project-{{ array_search($project, $data['projects']) }}" class="project-card d-flex flex-column" type="submit" href="/projects/{{ array_search($project, $data['projects']) }}">
    <div class="row project-title">
        <h2>{{ $project['title'] }}</h2>
        <i class="material-icons align-middle btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</i>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button class="dropdown-item delete-toggle" data-toggle="modal" data-target="#deleteModal" type="button">Delete Project</button>
        </div>
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

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center mb-4">Are you sure you want to delete this project?</h3>
                <form action="{{ route('projects.destroy', ['id' => array_search($project, $data['projects'])]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="row p-0 mt-4 d-flex flex-row justify-content-around">
                        <button class="close-btn" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
