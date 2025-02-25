{{--CÓ TRÁCH NHIỆM HIỂN THỊ THÔNG TIN--}}

@extends('admin.layouts.app')

@section('title','Roles')

@section('content')
    <div class="card">
        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif
        <h1>
            Role list
        </h1>
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Thêm</a>

        </div>

            <form action="" method="GET">
                <div class="form-group">
                    <input type="text" class="form-control"  name="keyword" placeholder="Nhập từ khóa" value="{{ request()->keyword }}">
                </div>
                <button type="submit" class="btn btn-submit btn-primary">Search</button>
            </form>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DisplayName</th>
                </tr>

                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('roles.destroy', $role->id) }}" id="form-delete{{$role->id}}"
                                  method="post">
                                @csrf
                                @method('DELETE')

                            </form>
                            <button class="btn btn-delete btn-danger" data-id="{{ $role->id }}">Delete</button>



                        </td>
                    </tr>

                @endforeach

            </table>
                {{ $roles->links() }}
        </div>
    </div>

@endsection
