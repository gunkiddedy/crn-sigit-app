@extends('include.app')
@section('title', 'cPanel List')
@section('content')
    <div class="container py5">
        <h6 style="font-size: 8pt" class="mb-4">
            <a href="{{ route('home') }}" class="text-decoration-none">Home</a> > 
            User
        </h6>
        <div class="ht-tm-cat">
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control col-md-6 mb-1" placeholder="{{ (isset($_GET['keyword']) !== false) ? $_GET['keyword'] : 'name, email, roles' }}" name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary btn-sm" type="button">Search</button>
                    </div>
                </div>
            </form>
            <h5 class="ht-tm-cat-title mb-3">
                Users List <a href="{{ route('user') }}/new" class="btn btn-outline-primary btn-sm mb-2 pull-right" title="Submit New cPanel"><span class="fa fa fa-plus-square fa-fw"></span> Submit New</a>
            </h5>

            @if ($message = Session::get('alert'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ $message }}
            </div>
            @endif
            
            <div class="ht-tm-codeblock" style="max-width: 100%; overflow: scroll;">
                <table class="table table-hover table-striped ht-tm-element border">
                    <thead class="thead-dark">
                        <tr>
                        <th width="30">#</th>
                        <th width="200">Name</th>
                        <th width="500">Email</th>
                        <th width="200">Password</th>
                        <th width="200">Roles</th>
                        <th class="text-center" width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        @php
                            $skipped = ($data->currentPage() * $data->perPage()) - $data->perPage();
                        @endphp
                        <tr>
                            <th scope="row">{{ $loop->iteration + $skipped }}</th>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->password }}</td>
                            <td>{{ $d->role }}</td>
                            <td class="text-center">
                                <form style="display: flex" method="POST" action="{{ route('user') }}/delete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ Crypt::encryptString($d->id) }}">
                                    <a href="{{ route('user') }}/detail/{{ Crypt::encryptString($d->id) }}" class="btn btn-outline-primary btn-sm" title="Detail User"><span class="fa fa-eye fa-fw"></span></a>
                                    <button class="btn btn-outline-primary btn-sm" title="Delete User" onclick="return confirm('Are you sure?')"><span class="fa fa-trash fa-fw"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $data->links() !!}
            </div>
        </div>
    </div>
@endsection