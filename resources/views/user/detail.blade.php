@extends('include.app')
@section('title', 'VPS Details')
@section('content')
    <div class="container py5">
        <h6 style="font-size: 8pt" class="mb-4">
            <a href="{{ route('home') }}" class="text-decoration-none">Home</a> > 
            <a href="{{ route('vps') }}" class="text-decoration-none">User</a> > 
            User Details
        </h6>
        <div class="ht-tm-cat">
            <h5 class="ht-tm-cat-title">User {{ strtoupper($data->ip) }}</h5>
            @if ($message = Session::get('alert'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ $message }}
            </div>
            @endif
            <div class="ht-tm-codeblock">
                <div class="row">
                    <div class="col-xl-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="ht-tm-codeblock ht-tm-btn-replaceable ht-tm-element ht-tm-element-inner">
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" value="{{ $data->password }}">
                                </div>
                                <div class="form-group">
                                    <label>Roles</label>
                                    <br>
                                    <select class="selectpicker" name="role" id="roles" data-live-search="true">
                                        {{-- @php
                                            $roles = ['add', 'update', 'delete'];
                                            $selectedRoles = explode(",", $data->roles);
                                        @endphp
                                        @foreach($roles as $role)
                                            <option style="color: #fff;" value="{{ $role }}" 
                                            {{ in_array($role, $selectedRoles) ? "selected" : "" }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach --}}
                                        @php
                                            $roles = ['superadmin', 'admin', 'user'];
                                            $selectedRole = $data->role;
                                        @endphp
                                        @foreach($roles as $role)
                                            <option style="color: #fff;" value="{{ $role }}" 
                                            {{ $role === $selectedRole ? "selected" : "" }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Update User">
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection