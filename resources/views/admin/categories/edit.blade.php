@extends('admin.layouts.app')

@section('title','Edit' .$cate->name)

@section('content')
    <div class="card">
        <h1>Create category</h1>

        <div>
            <form action="{{ route('categories.update', $cate->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group input-group-static mb-4">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name') ?? $cate->name }}">
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                @if($cate->children->count() >= 1)
                    <div class="input-group input-group-static mb-4">
                        <label name="group" class="ms-0">Parent Category</label>
                        <select name="parent_id" class="form-control">
                            @foreach($parentCategories as $par)
                                <option value="{{ $par->id }}" {{ old('parent_id') ?? ($cate->parent_id == $par->id ? 'selected' : '') }}>
                                    {{ $par->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('parent_id')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
