<form method="POST" action="{{ route('update.account') }}" class="mx-auto">
    @csrf

    <div class="form-group">
        <label for="userName">Name</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="{{ $user->name }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="userEmail">Email address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="{{ $user->email }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
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
