@extends('user.layouts.master')

@section('title','User Profile')

@section('main-content')

<style>

:root {
    --theme: #13A1F3;
}

/* Card */
.profile-card {
    border-radius: 12px;
    overflow: hidden;
    margin:10px;
}

/* Header */
.card-header {
    background: #fff;
    border-bottom: 2px solid var(--theme);
}

/* Breadcrumbs */
.breadcrumbs {
    list-style: none;
    display: flex;
    gap: 8px;
    font-size: 14px;
}
.breadcrumbs li a {
    color: #777;
    text-decoration: none;
}
.breadcrumbs .active {
    color: var(--theme);
    font-weight: 600;
}

/* Left Profile */
.profile-left {
    border-radius: 12px;
    overflow: hidden;
}

.profile-bg {
    height: 120px;
    background: linear-gradient(135deg, var(--theme), #0d7ec7);
}

.profile-img-wrapper {
    margin-top: -50px;
}

.profile-img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    border: 4px solid #fff;
    object-fit: cover;
}

/* Role badge */
.role-badge {
    background: var(--theme);
    color: #fff;
    padding: 5px 12px;
    border-radius: 20px;
}

/* Form */
.profile-form {
    border: 1px solid #eee;
    padding: 25px;
    border-radius: 12px;
}

.profile-form label {
    font-weight: 600;
    font-size: 14px;
}

.form-control {
    border-radius: 6px;
}

/* Buttons */
.btn-theme {
    background: var(--theme);
    color: #fff;
    border: none;
    padding: 8px 18px;
    border-radius: 6px;
}

.btn-theme:hover {
    background: #0d7ec7;
    color: #fff;
}
</style>

<div class="card shadow mb-4 profile-card">

    {{-- Notifications --}}
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>

    {{-- Header --}}
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0 font-weight-bold text-primary">Profile</h4>
        <ul class="breadcrumbs mb-0">
            <li><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="active">Profile</li>
        </ul>
    </div>

    {{-- Body --}}
    <div class="card-body">
        <div class="row">

            {{-- LEFT PROFILE CARD --}}
            <div class="col-md-4">
                <div class="card text-center profile-left">
                    <div class="profile-bg"></div>

                    <div class="profile-img-wrapper">
                        <img 
                            src="{{ $profile->photo ?? asset('backend/img/avatar.png') }}" 
                            class="profile-img"
                            alt="Profile Image"
                        >
                    </div>

                    <div class="card-body pt-4">
                        <h5 class="mb-1">{{ $profile->name }}</h5>
                        <p class="text-muted mb-1">{{ $profile->email }}</p>
                        <span class="badge role-badge">{{ ucfirst($profile->role) }}</span>
                    </div>
                </div>
            </div>

            {{-- RIGHT FORM --}}
            <div class="col-md-8">
                <form class="profile-form" method="POST" action="{{ route('user-profile-update',$profile->id) }}">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $profile->name }}" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" disabled value="{{ $profile->email }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Profile Photo</label>
                        <div class="input-group">
                            <button id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-theme">
                                Choose
                            </button>
                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $profile->photo }}">
                        </div>
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-theme mt-2">
                        Update Profile
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush
