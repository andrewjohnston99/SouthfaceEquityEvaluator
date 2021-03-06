<form method="POST" action="{{ route('change.password') }}" class="mx-auto">
    @csrf

    @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
    @endforeach

    <div class="form-group">
        <label for="password">Current Password</label>
            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
    </div>
    <div class="form-group">
        <label for="password">New Password</label>
            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
    </div>
    <div class="form-group">
        <label for="password">Confirm New Password</label>
            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
    </div>
    <div class="text-right">
            <button type="submit" class="save passoword">
                <span>
                    <i class="material-icons align-middle">save</i>
                </span>
                Update Password
            </button>
    </div>
</form>
