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
            <a href="">Instructions</a>
        </div>
        <div class="col">
            <a href="">General Equity</a>
        </div>
        <div class="col">
            <a href="">Population</a>
        </div>
        <div class="col">
            <a href="">Physical Form</a>
        </div>
        <div class="col">
            <a href="">Affordability</a>
        </div>
    </div>
</div>