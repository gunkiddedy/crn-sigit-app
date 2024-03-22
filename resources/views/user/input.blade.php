@extends('include.app')
@section('title', 'Users Submit')
@section('content')
    <div class="container py5">
        <h6 style="font-size: 8pt" class="mb-4">
            <a href="{{ route('home') }}" class="text-decoration-none">Home</a> > 
            <a href="{{ route('user') }}" class="text-decoration-none">User</a> > 
            Submit
        </h6>
        <div class="ht-tm-cat">
            <h5 class="ht-tm-cat-title">Submit New User</h5>
            <div class="ht-tm-codeblock">
                <div class="row">
                    <div class="col-xl-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="ht-tm-codeblock ht-tm-btn-replaceable ht-tm-element ht-tm-element-inner">
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group">
                                    <label>Name <font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" placeholder="John Doe" required>
                                </div>
                                <div class="form-group">
                                    <label>Email <font color="red">*</font></label>
                                    <input type="email" class="form-control" name="email" placeholder="admin@admin.com" required>
                                </div>
                                <div class="form-group">
                                    <label>Password <font color="red">*</font></label>
                                    <input type="text" class="form-control" name="password" placeholder="pasword" required>
                                </div>
                                <div class="form-group">
                                    <label>Roles <font color="red">*</font></label>
                                    <br>
                                    <select class="selectpicker" name="role" id="roles" data-live-search="true">
                                        <option style="color: #fff;" value="superadmin">SUPER ADMIN</option>
                                        <option style="color: #fff;" value="admin">ADMIN</option>
                                        <option style="color: #fff;" value="user">USER</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-outline-primary btn-sm">SUBMIT</button>
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