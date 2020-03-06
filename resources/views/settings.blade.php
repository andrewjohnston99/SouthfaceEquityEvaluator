@extends('common.default')

@include('common.project-header')

@section('css')
    <style>
        html, body {
            margin-top: 10;
        }
    </style>
@endsection

@section('content')

<div class="create-project container-fluid d-flex align-items-center">
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


<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h1>Objective</h1>
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
           <p> The TransFormation Alliance is a broad partnership of organizations from the private, public and nonprofit sectors dedicated to creating thriving, mixed-income communities anchored by transit and linked to all the opportunities and amenities that make Atlanta great. Our mission is to offer all residents the opportunities for a high quality of life, linked by our region’s critically important transit system.</p>
           <p>Equitable TOD combines place-based and people-based approaches to develop solutions that address the needs of all residents. The result is mixed-income communities that make connections to employment opportunities, daily needs, affordable housing and employment available to everyone. Equitable TOD achieves:</p>
           <li>1. Increases in property values without displacing the residents who would most benefit from the increase</li>
           <li>2. Greater economic opportunity by creating easier access for low and moderate income households</li>
           <li>3. A balance between return on investment for private investors and equity goals</li>
        </div>
      </div>
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <h1>Instructions</h1>
            </button>
          </h5>
        </div>

        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
              <p>For projects wholly contained within a 20 minute walk of a transit station as determined by Walk Score® (https://www.walkscore.com/). Projects meeting required elements for the station area and a score indicated in the required column for the appropriate developer track will receive the "Equitable TOD" designation and qualify for benefits as established by The TransFormation Alliance.</p>
          </div>
        </div>

        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
              <h1>Legend</h1>
            </button>
          </h5>
        </div>

        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
              <h3>Program Verification</h3>
              <p>The Transformation Alliance Equity Evaluator Scorecard indicates the status of all items through the following columns:</p>
              <h2>Points</h2>
              <li>This indicates the numbers of points that may be earned for each item</li>
              <li>Items showing no points, or zero points, are indicated as “-“ which indicates requirements of the program	</li>
              <h2>Planned</h2>
              <li>Each equity TOD project will indicate which items they plan to achieve by inputing the items point value in this column.  Once an item is indicated with a point value, the cell will turn green to indicate the project’s intent to satisfy the item’s requirements.  If the cell turns black, it indicates that an incorrect point value has been placed in that cell;  Submitted worksheets with any black cells will not be accepted.	</li>
              <h2>Status</h2>
              <li>Yes (cell turns green) when project achieves program standards</li>
              <li>Not compliant with program standards (required cell turns red)</li>
              <li>Incorrect points entered (too low or too high)</li>
              <li>No points planned (leave cells blank rather than entering 0)</li>
              <h3>Program Requirements</h3>
              <p>The Transformation Alliance Equity Evaluator Worksheet indicates required items using headers to designate that all the items under that heading are either:</p>
              <li>Required on all projects</li>
              <li>Items under this heading are pre-requisites of the program for all projects</li>
              <li>Optional on all projects</li>
              <li>Items under this heading are optional on all projects</li>
            </div>
        </div>
    </div>
  </div>
</div>





@endsection

{{-- @section('content')
<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Edit Profile') }}
        </a>
    </li>
    <li class="list-group-item">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Password') }}
        </a>
    </li>
    <li class="list-group-item">
        <a class="nav-link" href="#">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </li>
  </ul>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<form>
  <div class="form-group">
    <label for="exampleName">Name</label>
    <input type="name" class="form-control" id="exampleName" aria-describedby="emailHelp" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
  </div>
  <div class="form-group">
    <label for="exampleOrganization">Organization</label>
    <input type="organization" class="form-control" id="exampleOrganization" placeholder="Organization">
  </div>
  <div class="form-group">
    <label for="userType">User Type</label>
    <select class="form-control" id="userType">
      <option>Enterprise User</option>
      <option>Community User</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Save Changes</button>
</form>


@endsection --}}

