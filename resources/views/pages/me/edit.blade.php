@extends('layouts.master')
@section('content')
@section('title', 'Me')
<section id="complex-header-datatable">
    <div class="row">
        <div class="offset-2 col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Details</h4>
                </div>
                <div class="card-body py-2 my-25">
                    <!-- form -->
                    <form action="{{ route('me.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountFirstName">Name</label>
                                <input type="text" class="form-control" id="accountFirstName" name="name"
                                    placeholder="John" value="{{ $edit->name }}" data-msg="Please enter first name" />
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountEmail">Email</label>
                                <input type="email" class="form-control" id="accountEmail" name="email"
                                    placeholder="Email" value="{{ $edit->email }}" />
                            </div>
                            {{-- <input type="hidden"> --}}
                            <div class="col-12 col-sm-12 mb-1">
                                <div class="form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            name="password" required autocomplete="current-password" />
                                        <span class="input-group-text cursor-pointer"><i
                                                class="ti ti-eye-off"></i></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3" style="text-align: right">
                                <a href="{{ route('me.index') }}" class="btn btn-outline-secondary mt-1 me-1">Back</a>
                                <button type="submit" class="btn btn-primary mt-1 ">Save changes</button>
                            </div>
                        </div>
                    </form>
                    <!--/ form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection