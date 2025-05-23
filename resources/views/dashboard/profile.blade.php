@extends('layouts.appV1')

@push('styles-css')
@endpush

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1 class="h3 d-inline align-middle">Profile Pengguna</h1>
        <h5 class="p-2 bg-white rounded-pill h5">
            {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h5>
    </div>
@endsection
@section('content2')
    <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile Details</h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ Auth::check() && Auth::user()->photo_profile_path ? asset(Auth::user()->photo_profile_path) : asset('avatar.png') }}"
                    alt="Photo_Profile" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                <h5 class="card-title mb-0">{{ Auth::user()->name }}</h5>
                <div class="text-muted mb-2">{{ Auth::user()->email }}</div>

                <div>
                    <span
                        class="badge bg-primary p-2">{{ Auth::user()->role == 'admin' ? 'Role : Admin' : 'Role : User' }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-xl-9">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Profile</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', Auth::user()->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', Auth::user()->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username', Auth::user()->username) }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                    </div>
                    <div class="mb-3">
                        <label for="photo_profile" class="form-label">Profile Photo</label>
                        <input type="file" class="form-control" id="photo_profile" name="photo_profile">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection
