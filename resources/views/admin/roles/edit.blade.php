@extends('admin.layouts.app')

@section('title','Edit' .$role->name)

@section('content')
    <div class="card">
        <h1>Create role</h1>

        <div>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group input-group-static mb-4">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name') ?? $role->name }}">
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label for="">Display Name</label>
                    <input name="display_name" type="text" class="form-control"  value="{{ old('display_name') ?? $role->display_name }}">
                    @error('display_name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>


                <div>
                    <label> Group</label>
                    <select name='group' class="form-select" aria-label="Default select example" value = {{ $role->group }}>
                        <option value="system">System</option>
                        <option value="user">User</option>
                    </select>
                    @error('group')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label for="">Permission</label>
                </div>
                <div class="row">
                    @foreach($permissions as $groupName => $per)
                        <div class="col-4">
                            <h4>{{ $groupName }}</h4>
                            <div>
                                @foreach($per  as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                               {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                               value="{{ $item->id }}">
                                        <label class="custom-control-input"  for="customCheck1">{{ $item->display_name }}</label>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>


                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
