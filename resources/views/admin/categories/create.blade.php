@extends('admin.layouts.app')

@section('title','Create')

@section('content')
    <div class="card">
        <h1>Create category</h1>

        <div>
            <form action="{{ route('categories.store') }}" method="POST">
                  @csrf

                <div class="input-group input-group-static mb-4">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Parent Category</label>
                    <select name="parent_id" class="form-control" >
                        @foreach($parentCategories as $par )
                            <option value="">Select category</option>
                            <option value="{{ $par->id }}" {{ old('parent_id') == $par->id ? 'selected' : '' }}>
                                {{ $par->name }}</option>
                        @endforeach


                    </select>

                    @error('parent_ids')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
