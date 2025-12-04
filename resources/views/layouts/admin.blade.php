<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Admin Dashboard')</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Google Fonts Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

</head>
<body>
<!-- Sidebar -->
 @include('layouts.partials.admin.sidebar')


<!-- Top Navbar -->
 @include('layouts.partials.admin.top-navbar')

<!-- Main Content -->
<div class="main-content">
     @yield('content')
</div>


<script>
/*for topbar toggle (common for all pages) */
function toggleProfileMenu(){ 
    let menu = document.getElementById('profileMenu'); 
    menu.style.display = menu.style.display==='block'?'none':'block'; 
}    
/*for toggle sidebar (common for all pages)*/    
function toggleSidebar(){ 
    let sidebar = document.getElementById('sidebar');
    if(window.innerWidth <= 992){
        sidebar.classList.toggle('active');
    }else{
        sidebar.classList.toggle('collapsed');
    }
}
/*for toggle sidebar menus (common for all pages)*/
document.querySelectorAll('.menu-toggle').forEach(item => {
    item.addEventListener('click', function() {
        this.classList.toggle('active');
        let submenu = this.nextElementSibling;
        if(submenu.style.display === "flex"){
            submenu.style.display = "none";
        } else {
            submenu.style.display = "flex";
        }
    });
});
</script>    

@stack('scripts')

<form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

</body>
</html>
