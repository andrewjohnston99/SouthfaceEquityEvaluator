<div id="contact" class="contact mb-5">
    <form id="contactForm" action="{{ route('projects.tables.update', ['project' => $data['id'], 'table' => 'contact'])}}" method="POST">
        @method('PUT')
        @csrf
        <h2 class="text-center font-weight-bold mb-4">Contacts</h2>
        <div class="row">
            <div class="col">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ isset($data['contactInfo']->email) ? $data['contactInfo']->email : '' }}" placeholder="Email" />
            </div>
            <div class="col">
                <label for="communityName">Name</label>
                <input type="text" id="communityName" name="communityName" class="form-control" value="{{ isset($data['contactInfo']->community_name) ? $data['contactInfo']->community_name : '' }}" placeholder="Community Name" />
            </div>
            <div class="col">
                <label for="communityGPS">GPS</label>
                <input type="text" id="communityGPS" name="communityGPS" class="form-control" value="{{ isset($data['contactInfo']->community_gps) ? $data['contactInfo']->community_gps: '' }}" placeholder="Community GPS" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="communityAddress">Address</label>
                <textarea id="communityAddress" class="form-control" name="communityAddress" placeholder="Address">{{ isset($data['contactInfo']->community_address) ? $data['contactInfo']->community_address: '' }}</textarea>
            </div>
        </div>
        <h3 class="text-center mt-4 mb-4">Community/Development</h3>
        <div class="row">
            <div class="col">
                <label for="developerEmail">Email</label>
                <input type="email" id="developerEmail" name="developerEmail" class="form-control" value="{{ isset($data['contactInfo']->developer_email) ? $data['contactInfo']->developer_email : '' }}" placeholder="Email" />
            </div>
            <div class="col">
                <label for="developerPhone">Phone</label>
                <input type="text" id="developerPhone" name="developerPhone" class="form-control" value="{{ isset($data['contactInfo']->developer_phone) ? $data['contactInfo']->developer_phone : '' }}" placeholder="Phone" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="developerAddress">Address</label>
                <textarea id="developerAddress" class="form-control" name="developerAddress" placeholder="Address">{{ isset($data['contactInfo']->developer_address) ? $data['contactInfo']->developer_address : '' }}</textarea>
            </div>
        </div>
        <h2 class="text-center font-weight-bold mb-4 mt-5">Project Info</h2>
        <div class="row">
            <div class="col">
                <label for="1">Acerage</label>
                <input type="number" min="1" id="acerage" name="acerage" class="form-control" value="{{ isset($data['contactInfo']->acerage) ? $data['contactInfo']->acerage : '' }}" placeholder="Acerage" />
            </div>
            <div class="col">
                <label for="1">Approx. Amount of Greenspace</label>
                <input type="number" min="1" id="greenspace" name="greenspace" class="form-control" value="{{ isset($data['contactInfo']->greenspace) ? $data['contactInfo']->greenspace : '' }}" placeholder="Approx. Amount of Greenspace" />
            </div>
            <div class="col">
                <label for="1">Number of Residential Units</label>
                <input type="number" min="1" id="residentialUnits" name="residentialUnits" class="form-control" value="{{ isset($data['contactInfo']->residential_units) ? $data['contactInfo']->residential_units : '' }}" placeholder="Number of Residential Units" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="1">Number of Mult Family Units</label>
                <input type="number" min="1" id="multiFamilyUnits" name="multFamilyUnits" class="form-control" value="{{ isset($data['contactInfo']->multi_family_units) ? $data['contactInfo']->multi_family_units : '' }}" placeholder="Number of Mult Family Units" />
            </div>
            <div class="col">
                <label for="1">Number of Single Family Units</label>
                <input type="number" min="1" id="singleFamilyUnits" name="singleFamilyUnits" class="form-control" value="{{ isset($data['contactInfo']->single_family_units) ? $data['contactInfo']->single_family_units : '' }}" placeholder="Number of Single Family Units" />
            </div>
            <div class="col">
                <label for="1">Sq. Footage of Commercial Space</label>
                <input type="number" min="1" id="commercialSpace" name="commercialSpace" class="form-control" value="{{ isset($data['contactInfo']->commercial_space) ? $data['contactInfo']->commercial_space : '' }}" placeholder="Sq. Footage of Commercial Space" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="1">Sq. Footage of Residential Space</label>
                <input type="number" min="1" id="residentialSpace" name="residentialSpace" class="form-control" value="{{ isset($data['contactInfo']->residential_space) ? $data['contactInfo']->residential_space : '' }}" placeholder="Sq. Footage of Residential Space" />
            </div>
        </div>
    </form>
</div>
