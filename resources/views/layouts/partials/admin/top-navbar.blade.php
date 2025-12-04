<div class="top-navbar">
    <div class="d-flex align-items-center">
        <i class="bi bi-list fs-3 me-3 text-white" onclick="toggleSidebar()"></i>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
    </div>
    <div class="d-flex align-items-center">
        <div class="profile ms-3" onclick="toggleProfileMenu()">
           <img src="{{ $profile && $profile->profile_image ? asset('storage/' . $profile->profile_image) : 'https://i.pravatar.cc/50' }}" 
     alt="{{ $admin->name ?? 'Admin' }}" 
     class="rounded-circle" 
     style="width:40px; height:40px; object-fit:cover;">
<span>{{ $admin->name ?? 'Admin' }}</span>

            <div class="profile-menu" id="profileMenu">
                <a href="{{ route('admin.profile.index') }}">Profile</a>
                <a href="{{ route('admin.site.settings.index') }}">Settings</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">Logout</a>
            </div>
        </div>
    </div>
</div>