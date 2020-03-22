<div class="row">
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
    </div>
