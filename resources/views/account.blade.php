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
    @isset($user->organization)
        <div class="form-group">
            <label for="userOrganization">Organization</label>
            <input type="text" class="form-control" id="userOrganization" placeholder="{{ $user->organization }}">
        </div>
    @endisset
    <div class="text-right">
        <button type="submit" class="save">
            <span>
                <i class="material-icons align-middle">save</i>
            </span>
            Changes
        </button>
    </div>
</form>
