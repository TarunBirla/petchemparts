@extends('user.layouts.master')

@section('title', 'My Profile')

@section('main-content')

<style>
:root { --theme: #13A1F3; }

.profile-wrapper {
    padding: 10px;
}

/* Page heading */
.profile-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
    flex-wrap: wrap;
    gap: 10px;
}
.profile-heading h4 {
    font-size: 20px;
    font-weight: 700;
    color: #1a1a2e;
    margin: 0 0 2px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.profile-heading p {
    font-size: 13px;
    color: #9ca3af;
    margin: 0;
}

/* Layout */
.profile-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 20px;
    align-items: start;
}

/* Profile card (left) */
.profile-left-card {
    background: #fff;
    border: 1px solid #e8edf3;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 1px 6px rgba(0,0,0,0.05);
}
.profile-cover {
    height: 100px;
    background: linear-gradient(135deg, #13A1F3, #0d7ec7);
    position: relative;
}
.profile-avatar-wrap {
    display: flex;
    justify-content: center;
    margin-top: -44px;
    position: relative;
    z-index: 1;
}
.profile-avatar {
    width: 88px;
    height: 88px;
    border-radius: 50%;
    border: 4px solid #fff;
    object-fit: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.12);
}
.profile-left-body {
    padding: 14px 20px 24px;
    text-align: center;
}
.profile-user-name {
    font-size: 17px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 3px;
}
.profile-user-email {
    font-size: 13px;
    color: #9ca3af;
    margin-bottom: 12px;
    word-break: break-all;
}
.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #dbeafe;
    color: #1d4ed8;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: capitalize;
}

/* Profile stats */
.profile-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1px;
    background: #f0f4f8;
    margin-top: 18px;
    border-top: 1px solid #f0f4f8;
}
.stat-item {
    background: #fff;
    padding: 14px 10px;
    text-align: center;
}
.stat-value {
    font-size: 18px;
    font-weight: 700;
    color: #1a1a2e;
}
.stat-label {
    font-size: 11px;
    color: #9ca3af;
    margin-top: 2px;
}

/* Form card (right) */
.form-card {
    background: #fff;
    border: 1px solid #e8edf3;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 1px 6px rgba(0,0,0,0.05);
}
.form-card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 16px 22px;
    border-bottom: 1px solid #f0f4f8;
    background: #f8fafc;
}
.form-card-header-icon {
    width: 34px;
    height: 34px;
    border-radius: 9px;
    background: #dbeafe;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    color: var(--theme);
}
.form-card-header-title {
    font-size: 14px;
    font-weight: 700;
    color: #1a1a2e;
}
.form-card-body {
    padding: 24px 22px;
}

/* Fields */
.field {
    margin-bottom: 18px;
}
.field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
}
.field input {
    width: 100%;
    border: 1px solid #d1d5db;
    border-radius: 9px;
    padding: 10px 14px;
    font-size: 14px;
    color: #1a1a2e;
    background: #fff;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
}
.field input:focus {
    border-color: var(--theme);
    box-shadow: 0 0 0 3px rgba(19,161,243,0.12);
}
.field input:disabled {
    background: #f8fafc;
    color: #9ca3af;
    cursor: not-allowed;
}
.field .error-msg {
    font-size: 12px;
    color: #ef4444;
    margin-top: 4px;
    display: block;
}

/* File manager row */
.file-manager-row {
    display: flex;
    gap: 0;
    border: 1px solid #d1d5db;
    border-radius: 9px;
    overflow: hidden;
}
.file-manager-btn {
    background: var(--theme);
    color: #fff;
    border: none;
    padding: 10px 16px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.15s;
    display: flex;
    align-items: center;
    gap: 6px;
}
.file-manager-btn:hover { background: #0d7ec7; }
.file-manager-input {
    flex: 1;
    border: none !important;
    border-radius: 0 !important;
    padding: 10px 14px !important;
    font-size: 13px !important;
    color: #6b7280 !important;
    background: #f8fafc !important;
}
.file-manager-input:focus {
    box-shadow: none !important;
}

/* Submit button */
.btn-submit {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--theme);
    color: #fff;
    border: none;
    padding: 11px 24px;
    border-radius: 9px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.15s;
    margin-top: 6px;
}
.btn-submit:hover { background: #0d7ec7; }

@media (max-width: 700px) {
    .profile-layout { grid-template-columns: 1fr; }
}
</style>

<div class="profile-wrapper">

    @include('backend.layouts.notification')

    <div class="profile-heading">
        <div>
            <h4>
                <i class="fas fa-user-circle" style="color:var(--theme);"></i>
                My Profile
            </h4>
            <p>Manage your personal information</p>
        </div>
    </div>

    <div class="profile-layout">

        {{-- LEFT: Profile card --}}
        <div class="profile-left-card">
            <div class="profile-cover"></div>
            <div class="profile-avatar-wrap">
                <img src="{{ $profile->photo ?? asset('backend/img/avatar.png') }}"
                     class="profile-avatar"
                     alt="{{ $profile->name }}">
            </div>
            <div class="profile-left-body">
                <div class="profile-user-name">{{ $profile->name }}</div>
                <div class="profile-user-email">{{ $profile->email }}</div>
                <span class="role-badge">
                    <i class="fas fa-shield-alt" style="font-size:10px;"></i>
                    {{ ucfirst($profile->role ?? 'User') }}
                </span>

                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-value">{{ $profile->orders_count ?? 0 }}</div>
                        <div class="stat-label">Orders</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">
                            {{ $profile->created_at ? $profile->created_at->format('Y') : '—' }}
                        </div>
                        <div class="stat-label">Joined</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT: Edit form --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-header-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <span class="form-card-header-title">Edit Profile</span>
            </div>
            <div class="form-card-body">
                <form method="POST" action="{{ route('user-profile-update', $profile->id) }}">
                    @csrf

                    <div class="field">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ $profile->name }}" placeholder="Your full name">
                        @error('name')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label>Email Address <span style="color:#9ca3af; font-weight:400;">(cannot be changed)</span></label>
                        <input type="email" value="{{ $profile->email }}" disabled>
                    </div>

                    <div class="field">
                        <label>Profile Photo</label>
                        <div class="file-manager-row">
                            <button id="lfm" type="button"
                                    data-input="thumbnail"
                                    data-preview="holder"
                                    class="file-manager-btn">
                                <i class="fas fa-folder-open"></i> Choose
                            </button>
                            <input id="thumbnail"
                                   class="file-manager-input"
                                   type="text"
                                   name="photo"
                                   value="{{ $profile->photo }}"
                                   placeholder="No file chosen">
                        </div>
                        @error('photo')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Save Changes
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