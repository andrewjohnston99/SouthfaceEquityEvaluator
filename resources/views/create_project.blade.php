{{-- <div class="row">
        <div class="col">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h2 class="create-header">Create a New Project</h2>
                </div>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="project-title">Project Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Title" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="site-address">Site Address</label>
                            <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address" required autocomplete="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="charrette-date">Charrette Date</label>
                            <input id="charrette-date" type="date" class="form-control" name="charrette_date" placeholder="Charrette Date" required autocomplete="charrette-date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="kickoff-date">Kickoff Date</label>
                            <input id="kickoff-date" type="date" class="form-control" name="kickoff_date" placeholder="Kickoff Date" required autocomplete="kickoff-date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="martaStation">Which Marta Station is closest to your development?</label>
                        <select class="form-control" id="martaStation" name="martaStation">
                          <option>Choose Your Station</option>
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
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="submit" id="createProjectBtn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="cancel" id="cancelProjectBtn">
                                {{ __('Cancel') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
<div class="modal fade" id="createProjectModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Create a New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('projects') }}" method="POST">
                    @csrf

                    <input id="projectTitle" class="form-control" type="text" name="projectTitle" placeholder="Project Title" required autofocus>
                    <input id="charretteDate" class="form-control" type="text" name="charretteDate" placeholder="Charrette Date" required autofocus>
                    <input id="kickoffDate" class="form-control" type="text" name="kickoffDate" placeholder="Kickoff Date" required autofocus>
                    <select class="form-control" id="martaStation" name="martaStation">
                            <option>Please choose the Marta station closest to your development.</option>
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
                    <textarea id="siteAddress" class="form-control" name="siteAddress" placeholder="Site Address" required></textarea>
                    <div class="row">
                        <div class="text-left">
                            <button type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                        <div class="text-right">
                            <button type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
