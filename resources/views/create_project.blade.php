<div class="modal fade create-project" id="createProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h2 class="create-header">Create a New Project</h2>
            </div>
            <div class="modal-body">
                <form action="{{ Auth::guest() ? route('guest.create') : url('projects') }}" method="POST">
                    @csrf
                    <label for="martaStation">Marta Station</label>
                    <select class="form-control" id="martaStation" name="martaStation" required>
                        <option value="" selected disabled hidden>Please choose the Marta station closest to your development.</option>
                        @isset($data['stations'])
                            @foreach ($data['stations'] as $station)
                                <option>{{ $station }}</option>
                            @endforeach
                        @endisset
                    </select>
                    <label for="projectTitle">Project Title</label>
                    <input id="projectTitle" class="form-control" type="text" name="projectTitle" placeholder="Project Title" required />
                    <label for="meetingDate">Project Team or Community Meeting Date</label>
                    <input id="meetingDate" class="form-control" type="text" name="meetingDate" placeholder="mm/dd/yyyy" data-input />
                    <label for="startDate">Anticipated Project Start Date</label>
                    <input id="startDate" class="form-control" type="text" name="startDate" placeholder="mm/dd/yyyy" data-input />
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
