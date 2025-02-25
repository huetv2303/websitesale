{{--CÓ TRÁCH NHIỆM HIỂN THỊ THÔNG TIN--}}

@extends('admin.layouts.app')

@section('title','Category')

@section('content')
    <div class="card">
        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif
        <h1>
            Category list
        </h1>
        <div>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm</a>

        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent Name</th>
                </tr>

                @foreach($categories as $cate)
                    <tr>
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->parent_name }}</td>
                        <td>
                                <a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('categories.destroy', $cate->id) }}" method="post" id="form-delete{{ $cate->id }}" >
                                    @csrf
                                    @method('DELETE')

                                </form>

                            <button class="btn btn-delete btn-danger" data-id="{{ $cate->id }}">Delete</button>
                        </td>
                    </tr>


                @endforeach

            </table>
                {{ $categories->links() }}
        </div>
    </div>

@endsection


