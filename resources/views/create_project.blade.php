<div class="modal fade create-project" id="createProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h2 class="create-header">Create a New Project</h2>
            </div>
            <div class="modal-body">
                <form action="{{ url('projects') }}" method="POST">
                    @csrf

                    <select class="form-control" id="martaStation" name="martaStation">
                        <option selected disabled hidden>Please choose the Marta station closest to your development.</option>
                        <option>Arts Center</option>
                        <option>Ashby</option>
                        <option>Avondale</option>
                        <option>Bankhead</option>
                        <option>Buckhead</option>
                        <option>Chamblee</option>
                        <option>Civic Center</option>
                        <option>College Park</option>
                        <option>Decatur</option>
                        <option>Doraville</option>
                        <option>Dunwoody</option>
                        <option>East Point</option>
                        <option>Eastlake</option>
                        <option>Edgewood Candler Park</option>
                        <option>Five Points</option>
                        <option>Garnett</option>
                        <option>Georgia Dome/GWCC/Philips Arena/CNN Center</option>
                        <option>Georgia State</option>
                        <option>Hamilton Holmes</option>
                        <option>Indian Creek</option>
                        <option>Inman Park</option>
                        <option>Kensington</option>
                        <option>King Memorial</option>
                        <option>Lakewood Fort McPherson</option>
                        <option>Lenox</option>
                        <option>Lindbergh</option>
                        <option>Medical Center</option>
                        <option>Midtown</option>
                        <option>North Avenue</option>
                        <option>North Springs</option>
                        <option>Oakland City</option>
                        <option>Peachtree Center</option>
                        <option>Sandy Spring</option>
                        <option>Vine City</option>
                        <option>West End</option>
                        <option>West Lake</option>
                    </select>
                    <input id="projectTitle" class="form-control" type="text" name="projectTitle" placeholder="Project Title" required autofocus>
                    <input id="charretteDate" class="form-control flatpickr flatpickr-input" type="date" name="charretteDate" placeholder="Charrette Date" required autofocus>
                    <input id="kickoffDate" class="form-control" type="date" name="kickoffDate" placeholder="Kickoff Date" required autofocus>
                    <textarea id="siteAddress" class="form-control" name="siteAddress" placeholder="Site Address" required></textarea>
                    <div class="row">
                        <button class="close-btn" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="create" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
