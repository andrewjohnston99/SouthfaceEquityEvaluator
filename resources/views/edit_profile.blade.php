@extends('common.default')

@include('common.setting-header')

@section('css')
    <style>
        html, body {
            margin-top: 10;
        }
    </style> 
@endsection

@section('content')
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

@endsection

