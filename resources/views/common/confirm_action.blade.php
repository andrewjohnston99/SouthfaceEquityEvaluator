<div id="{{ $modalId }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center mb-4">Are you sure you want to delete this project?</h3>
                <form action="{{ Auth::guest() ? url('guest/' . $data['id']) : route('projects.destroy', ['id' => $projectId]) }}" method="POST">
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
