<div class="sidebar" id="sidebar">
   <div id="brand" class="brand">Mamas Craft</div>
    <!-- Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="active"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a>

    <!-- Products Menu -->
    <div class="sidebar-menu">
        <a href="#" class="menu-toggle"><i class="bi bi-box-seam"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <div class="submenu">
            <a href="{{ route('admin.categories.index') }}"><i class="bi bi-tags"></i><span>Categories</span></a>
            <a href="{{ route('admin.property.categories.index') }}"><i class="bi bi-tags"></i><span>Categories</span></a>

            <a href="{{ route('admin.brands.index') }}"><i class="bi bi-star"></i><span>Brands</span></a>
             {{-- 
    <a href="{{ route('admin.accessory.index') }}">
        <i class="bi bi-card-list"></i>
        <span>Accessory</span>
    </a>
    --}}

            <a href="{{ route('admin.products.index') }}"><i class="bi bi-box-arrow-in-right"></i><span>Products</span></a>
           
        </div>
    </div>

    <!-- Orders  -->
    <div class="sidebar-menu">
        <a href="#" class="menu-toggle"><i class="bi bi-cart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <div class="submenu">
            <a href="{{ route('admin.orders.index') }}"><i class="bi bi-cart"></i><span> Orders</span></a>

        </div>

    </div>

    <!-- User Management -->
    <div class="sidebar-menu">
       {{--  
        <a href="#" class="menu-toggle"><i class="bi bi-person-badge"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <div class="submenu">
            <a href="#"><i class="bi bi-person-badge"></i><span> Users</span></a>
        </div>
       --}} 
    </div>

    <script>
document.getElementById('brand').addEventListener('click', function() {
    window.location.href = "{{ route('admin.profile.index') }}";
});
</script>

    <!--Logout -->
    <a href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a>


</div>

