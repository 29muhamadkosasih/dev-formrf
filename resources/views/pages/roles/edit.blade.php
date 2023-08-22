@extends('layouts/master')

@section('title', 'Roles')

@section('content')
<!-- Invoice table -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Roles</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="John Doe"
                        name="title" value="{{ old('title', $role->title) }}" />
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Short Code</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class=" form-control @error('short_code') is-invalid @enderror"
                            placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2"
                            name="short_code" value="{{ old('short_code', $role->short_code) }}" />
                        @error('short_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3" id="permissions-select">
                    <label class="form-label" for="multicol-country">Permissions</label>
                    <select id="multicol-language"
                        class="select2 form-select @error('permissions') is-invalid @enderror" multiple id="permissions"
                        name="permissions[]">
                        @foreach ($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->
                            permissions->contains($id)) ? 'selected' :
                            '' }}>{{ $permission }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary float-end ">Back</a>
            </form>
        </div>
    </div>
</div>
<!-- /Invoice table -->
@endsection