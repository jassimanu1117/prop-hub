@extends('layouts.user')

@section('content')
<div class="container">
    <h3 class="mb-4">Your Cart</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->count() > 0)
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr id="cart-item-{{ $item->id }}">
                    <td>{{ $item->product_id }}</td>
                    <td>
                        <div class="input-group" style="max-width:120px;">
                            <button type="button" class="btn btn-outline-secondary" onclick="decreaseQty({{ $item->id }}, this)">-</button>
                            <input type="number" value="{{ $item->quantity }}" min="1"
                                   data-route="{{ route('user.cart.update', ['id' => ':id']) }}"
                                   oninput="updateCart({{ $item->id }}, this)"
                                   class="form-control text-center">
                            <button type="button" class="btn btn-outline-secondary" onclick="increaseQty({{ $item->id }}, this)">+</button>
                        </div>
                    </td>
                    <td class="price">{{ $item->price }}</td>
                    <td class="item-total">{{ $item->price * $item->quantity }}</td>
                    <td>
                        <form method="POST" action="{{ route('user.cart.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Grand Total:</th>
                    <th id="grand-total"></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // ------------------------------
    // Calculate Grand Total
    // ------------------------------
    function calculateGrandTotal() {
        let total = 0;
        document.querySelectorAll('.item-total').forEach(td => {
            total += parseFloat(td.textContent);
        });
        document.getElementById('grand-total').textContent = total.toFixed(2);
    }

    calculateGrandTotal(); // initial calculation

    // ------------------------------
    // Update quantity via AJAX
    // ------------------------------
    window.updateCart = function(id, input) {
        let quantity = parseInt(input.value);
        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
            input.value = 1;
        }

        const baseRoute = input.dataset.route.replace(':id', id);

        fetch(baseRoute, {
            method: 'PATCH', // match your Route::patch
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
            },
            body: JSON.stringify({ quantity })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const row = document.getElementById('cart-item-' + id);
                const price = parseFloat(row.querySelector('.price').textContent);
                row.querySelector('.item-total').textContent = (price * quantity).toFixed(2);
                calculateGrandTotal();
            } else {
                console.error('Failed to update cart');
            }
        })
        .catch(err => console.error('Update error:', err));
    }

    // ------------------------------
    // Increment / Decrement buttons
    // ------------------------------
    window.increaseQty = function(id, btn) {
        const input = btn.parentElement.querySelector('input');
        input.value = parseInt(input.value || 0) + 1;
        updateCart(id, input);
    }

    window.decreaseQty = function(id, btn) {
        const input = btn.parentElement.querySelector('input');
        input.value = Math.max(1, parseInt(input.value || 1) - 1);
        updateCart(id, input);
    }

    // ------------------------------
    // Merge localStorage cart
    // ------------------------------
    @auth
    const cart = JSON.parse(localStorage.getItem("cartItems") || "[]");
    if (cart.length > 0) {
        const mergeUrl = "{{ route('user.cart.merge') }}";
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        if (!csrfToken) console.error('CSRF token not found!');

        fetch(mergeUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ cart })
        })
        .then(async res => {
            const contentType = res.headers.get("content-type") || "";
            if (!contentType.includes("application/json")) {
                const text = await res.text();
                console.error("Cart merge returned non-JSON:", text);
                return;
            }
            return res.json();
        })
        .then(data => {
            if (data && data.success) {
                localStorage.removeItem("cartItems");
                console.log("✅ LocalStorage cart cleared after merge");
                location.reload();
            } else if (data) {
                console.error("❌ Cart merge failed:", data.message);
            }
        })
        .catch(err => console.error("❌ Cart merge error:", err));
    }
    @endauth

});
</script>
@endsection
