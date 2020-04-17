<div id="contact" class="contact mb-5">
    <form id="contactForm" action="" method="POST">
        @csrf
        <h2 class="text-center font-weight-bold mb-4">Contacts</h2>
        <div class="row">
            <div class="col">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email"/>
            </div>
            <div class="col">
                <input type="text" id="communityName" name="communityName" class="form-control" placeholder="Community Name" />
            </div>
            <div class="col">
                <input type="text" id="communityGPS" name="communityGPS" class="form-control" placeholder="Community GPS"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <textarea id="communityAddress" class="form-control" name="communityAddress" placeholder="Address"></textarea>
            </div>
        </div>
        <h3 class="text-center mt-4 mb-4">Developer and Primary Contact</h3>
        <div class="row">
            <div class="col">
                <input type="email" id="developerEmail" name="developerEmail" class="form-control" placeholder="Email"/>
            </div>
            <div class="col">
                <input type="text" id="developerPhone" name="developerPhone" class="form-control" placeholder="Phone"/>
            </div>
            <div class="col">
                <input type="text" id="developerFax" name="developerFax" class="form-control" placeholder="Fax"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <textarea id="developerAddress" class="form-control" name="developerAddress" placeholder="Address"></textarea>
            </div>
        </div>
        <h3 class="text-center mt-4 mb-4">General Contractor Project Manager</h3>
        <div class="row">
            <div class="col">
                 <input type="email" id="gcEmail" name="gcEmail" class="form-control" placeholder="Email"/>
             </div>
            <div class="col">
                <input type="text" id="gcPhone" name="gcPhone" class="form-control" placeholder="Phone"/>
            </div>
            <div class="col">
                <input type="text" id="gcFax" name="gcFax" class="form-control" placeholder="Fax"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <textarea id="gcAddress" class="form-control" name="gcAddress" placeholder="Address"></textarea>
            </div>
        </div>
        <h3 class="text-center mt-4 mb-4">GC Site Supervisor</h3>
        <div class="row">
            <div class="col">
                <input type="email" id="ssEmail" name="ssEmail" class="form-control" placeholder="Email"/>
            </div>
            <div class="col">
                <input type="text" id="ssPhone" name="ssPhone" class="form-control" placeholder="Phone"/>
            </div>
        </div>
        <h2 class="text-center font-weight-bold mb-4 mt-5">Project Info</h2>
        <div class="row">
            <div class="col">
                <input type="number" id="acerage" name="acerage" class="form-control" placeholder="Acerage"/>
            </div>
            <div class="col">
                <input type="number" id="greenspace" name="greenspace" class="form-control" placeholder="Approx. Amount of Greenspace"/>
            </div>
            <div class="col">
                <input type="number" id="residentialUnits" name="residentialUnits" class="form-control" placeholder="Number of Residential Units"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="number" id="multFamilyUnits" name="multFamilyUnits" class="form-control" placeholder="Number of Mult Family Units"/>
            </div>
            <div class="col">
                <input type="number" id="singleFamilyUnits" name="singleFamilyUnits" class="form-control" placeholder="Number of Single Family Units"/>
            </div>
            <div class="col">
                <input type="number" id="commercialSpace" name="commercialSpace" class="form-control" placeholder="Sq. Footage of Commercial Space"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="number" id="residentialSpace" name="residentialSpace" class="form-control" placeholder="Sq. Footage of Residential Space"/>
            </div>
        </div>
    </form>
</div>
