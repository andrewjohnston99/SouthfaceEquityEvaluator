<div class="project-header container-fluid d-flex">
    <div class="row">
        <div class="col btn-col">
            <button id="backBtn" class="back-btn d-flex justify-content-center" onclick="window.location='{{ url('home') }}'">
                @include('icons.back-arrow')
                <span>
                    Back to Dashboard
                </span>
            </button>
        </div>
        <div class="col btn-col btn-col-2">
            <button id="shareProject" class="share-btn">Share Project</button>
            <button id="saveChanges" class="save-btn">Save Changes</button>
        </div>
    </div>
    <div class="row nav-row">
        <div class="col">
            <a href="">Cover Sheet</a>
        </div>
        <div class="col">
            <a href="#instructions">Instructions</a>
        </div>
        <div class="col">
            <a href="#genEquity">Project Evaluation Scorecard</a>
        </div>
        <!-- <div class="col">
            <a href="#genEquity">General Equity</a>
        </div>
        <div class="col">
            <a href="#services">Services/Employment</a>
        </div>
        <div class="col">
            <a href="#population">Population</a>
        </div>
        <div class="col">
            <a href="#community">Community</a>
        </div>
        <div class="col">
            <a href="#housing">Housing</a>
        </div>
        <div class="col">
            <a href="#physical">Physical Form</a>
        </div> -->
        <div class="col">
            <a href="">Contacts & Info</a>
        </div>
        <div class="col">
            <a href="{{ url('affordability') }}">Affordability</a>
        </div>
    </div>
</div>