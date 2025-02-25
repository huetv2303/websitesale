{{--CÓ TRÁCH NHIỆM HIỂN THỊ THÔNG TIN--}}

@extends('admin.layouts.app')

@section('title','Users')

@section('content')
    <div class="card">
        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif
        <h1>
            User list
        </h1>
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm</a>

        </div>

        <form action="" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa"
                       value="{{ request()->keyword }}">
            </div>
            <button type="submit" class="btn btn-submit btn-primary">Search</button>
        </form>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>


                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('users.destroy', $user->id) }}" id="form-delete{{$user->id}}"
                                  method="post">
                                @csrf
                                @method('DELETE')

                            </form>
                            <button class="btn btn-delete btn-danger" data-id="{{ $user->id }}">Delete</button>


                        </td>
                    </tr>

                @endforeach

            </table>
            {{ $users->appends(request()->all())->links() }}
        </div>


    </div>


@endsection

{{--<script>--}}

{{--    // function confirmDelete() {--}}
{{--    //     return confirm('Bạn có chắc chắn muốn xóa không?');--}}
{{--    // }--}}


{{--</script>--}}





