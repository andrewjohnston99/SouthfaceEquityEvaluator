<form action="" method="POST" class="mx-auto">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="userName">Name</label>
        <input type="text" class="form-control" id="userName" placeholder="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="userEmail">Email address</label>
        <input type="email" class="form-control" id="userEmail" placeholder="{{ $user->email }}">
    </div>
    <div class="form-group">
        <label for="userOrganization">Organization</label>
        <input type="text" class="form-control" id="userOrganization" placeholder="">
    </div>
    <div class="text-right">
        <button type="submit" class="btn">Save Changes</button>
    </div>
</form>

