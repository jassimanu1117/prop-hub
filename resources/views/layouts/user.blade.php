<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="/user/dashboard">User Panel</a>
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button class="btn btn-light btn-sm" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
  
<script>
/* ==========================
   --- Merge wishlists 
   #
   <meta name="csrf-token" content="{{ csrf_token() }}"> 
   # This is common layout page for user dashboard pages.
   # This script runs once per page load and when items are in localStorage.
   # Place this near the end of your layout.
   # Putting it in the layout means it will automatically run on all user dashboard pages.
   # If the user logged in and localStorage contains wishlist items   
========================== */    
document.addEventListener("DOMContentLoaded", function () {
    @auth
        const wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

        if (wishlist.length > 0) {
            fetch("{{ route('wishlist.merge') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ wishlist }),
            })
            .then(res => res.json())
            .then(data => {
                console.log("✅ Merge response:", data);
                if (data.success) {
                    localStorage.removeItem("wishlist");
                    console.log("LocalStorage wishlist cleared after merge");
                }
            })
            .catch(err => console.error("❌ Merge error:", err));
        }
    @endauth
});
/* ==========================
   Exact flow:
   - This is the same method many e-commerce sites use
   - Script runs once after login
   - LocalStorage merged then cleared
   - Clean, automatic, no extra code on each page
========================== */


/* ==========================
   --- Merge cart items 
   #<meta name="csrf-token" content="{{ csrf_token() }}"> 
   # This is common layout page for user dashboard pages.
   # This script runs once per page load and when items are in localStorage.
   # Place this near the end of your layout.
   # Putting it in the layout means it will automatically run on all user dashboard pages.
   # If the user logged in and localStorage contains cart items
========================== */ 
document.addEventListener("DOMContentLoaded", function () {
    @auth
        const cart = JSON.parse(localStorage.getItem("cartItems") || "[]");

        if (cart.length > 0) {
            fetch("{{ route('user.cart.merge') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ cart }),
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    localStorage.removeItem("cartItems");
                    console.log("LocalStorage cart cleared after merge");
                }
            })
            .catch(err => console.error("Cart merge error:", err));
        }
    @endauth
});
/* ==========================
   Exact flow:
   - This is the same method many e-commerce sites use
   - Script runs once after login
   - LocalStorage merged then cleared
   - Clean, automatic, no extra code on each page
========================== */
</script>
    
</body>
</html>
