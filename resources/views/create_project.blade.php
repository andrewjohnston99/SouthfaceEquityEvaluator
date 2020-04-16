<div class="modal fade create-project" id="createProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h2 class="create-header">Create a New Project</h2>
            </div>
            <div class="modal-body">
                <form action="{{ url('projects') }}" method="POST">
                    @csrf
                    <label for="martaStation">Marta Station</label>
                    <select class="form-control" id="martaStation" name="martaStation" required>
                        <option value="" selected disabled hidden>Please choose the Marta station closest to your development.</option>
                        @foreach ($data['stations'] as $station)
                            <option>{{ $station }}</option>
                        @endforeach
                    </select>
                    <label for="projectTitle">Project Title</label>
                    <input id="projectTitle" class="form-control" type="text" name="projectTitle" placeholder="Project Title" required />
                    <label for="charretteDate">Charrette Date</label>
                    <input id="charretteDate" class="form-control" type="text" name="charretteDate" placeholder="Charrette Date" data-input />
                    <label for="kickoffDate">Kickoff Date</label>
                    <input id="kickoffDate" class="form-control" type="text" name="kickoffDate" placeholder="Kickoff Date" data-input />
                    <label for="siteAddress">Site Address</label>
                    <textarea id="siteAddress" class="form-control" name="siteAddress" placeholder="123 ABC Rd&#13;&#10;Atlanta, GA 30332"></textarea>
                    <div class="row">
                        <button class="close-btn" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="create" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
