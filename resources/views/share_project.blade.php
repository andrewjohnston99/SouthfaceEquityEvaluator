<div id="shareModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="align-middle mb-0">Export and Share Report</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="material-icons align-middle">close</i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url()->current() . '/export' }}" method="POST">
                    @csrf
                    <div class="form-group text-center">
                        <button class="btn btn-outline-primary mr-2" name="emailSelf" type="submit">Email to Yourself</button>
                        <button class="btn btn-outline-success" name="download" type="submit">Download Report</button>
                    </div>
                    <p class="mb-2 mt-4">Want to email the report to somone else?</p>
                    <input class="form-control mb-3" type="email" name="email" id="email" placeholder="Email">
                    <button class="btn btn-outline-warning float-right" type="submit">Send Email</button>
                </form>
            </div>
        </div>
    </div>
</div>
