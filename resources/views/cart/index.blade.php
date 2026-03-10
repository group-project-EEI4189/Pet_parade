@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($cartItems->isEmpty())
        <div class="text-center py-5">
            <p class="lead">Your cart is empty.</p>
            <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    @else
    <div class="row">
        <div class="col-md-8">
            <div class="cart-panel p-4 rounded-4 shadow-sm mb-3">
                <div class="table-responsive">
                    <table class="table align-middle cart-table mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Product</th>
                            <th>Price</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Subtotal</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr id="cart-row-{{ $item->product->id }}">
                            <td class="product-col ps-4">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="product-thumb">
                                        @if($item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid" style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                                        @else
                                            <div style="width:100px; height:100px; background:#fff0f0; display:flex; align-items:center; justify-content:center; color:#e89080; border-radius:8px;">No Image</div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="product-image-name">{{ $item->product->name }}</div>
                                        <div class="text-muted small product-desc">{{ $item->product->description ?? '' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="color:#123b57; font-weight:700;">${{ number_format($item->product->price, 2) }}</td>
                            <td>
                                <form id="update-form-{{ $item->product->id }}" action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center ajax-cart-update">
                                    @csrf
                                    @if(isset($item->id))
                                        <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                    @else
                                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                    @endif
                                    <button type="button" class="btn-action-outline btn-sm me-1" onclick="changeQty(this, -1)">-</button>
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm qty-input ajax-qty" data-product-id="{{ $item->product->id }}" style="width:80px;">
                                    <button type="button" class="btn-action-outline btn-sm ms-1" onclick="changeQty(this, 1)">+</button>
                                </form>
                            </td>
                            <td style="font-weight:600;" id="item-subtotal-{{ $item->product->id }}">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            <td class="text-end pe-4">
                                <div class="d-flex action-btn-group justify-content-space-between">
                                    <button type="button" class="btn btn-blue btn-sm d-flex align-items-center" onclick="submitUpdateForm({{ $item->product->id }})">
                                        <svg width="20" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1" aria-hidden>
                                            <path d="M5 13l4 4L19 7" stroke="#042f4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ms-2">Update</span>
                                    </button>
                                    <form action="{{ route('cart.remove') }}" method="POST" class="ajax-cart-remove ms-2 d-inline" onsubmit="return confirm('Remove this item from your cart?');">
                                        @csrf
                                        @method('DELETE')
                                        @if(isset($item->id))
                                            <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                        @else
                                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                        @endif
                                        <button type="submit" class="btn-remove btn-sm d-flex justify-content-space-between">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1" aria-hidden>
                                                <path d="M3 6h18" stroke="#e05165" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" stroke="#e05165" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10 11v6m4-6v6" stroke="#e05165" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span  class="btn btn-blue btn-sm d-flex justify-content-space-between">Remove</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('shop') }}" class="btn btn-secondary">Continue </a>
                <button type="button" class="btn btn-confirm ms-2" onclick="document.querySelector('.btn-confirm')?.click();">Confirm </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card cart-card">
                <div class="card-body">
                    <h5 class="card-title" style="color:#123b57; font-weight:700;">Order Summary</h5>
                    @php $subtotal = $cartItems->sum(fn($i) => $i->product->price * $i->quantity); @endphp
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="text-muted small">Subtotal</div>
                        <div style="font-weight:700; color:#123b57;">$<span id="cart-subtotal">{{ number_format($subtotal, 2) }}</span></div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted">Total</div>
                        <div style="font-size:1.2rem; font-weight:800; color:#123b57;">$<span id="cart-total">{{ number_format($subtotal, 2) }}</span></div>
                    </div>
                    @auth
                        <form action="{{ route('order.confirm') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-confirm w-100">Confirm Order</button>
                        </form>
                    @else
                        <form action="{{ route('order.confirm') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label small">Name</label>
                                <input type="text" name="guest_name" class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small">Email</label>
                                <input type="email" name="guest_email" class="form-control form-control-sm" required>
                            </div>
                            <button type="submit" class="btn btn-confirm w-100">Confirm Order</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeQty(el, delta) {
            const form = el.closest('form');
            const input = form.querySelector('.qty-input');
            if (!input) return;
            let val = parseInt(input.value) || 0;
            val = Math.max(1, val + delta);
            input.value = val;
        }

        function submitUpdateForm(productId) {
            const form = document.getElementById('update-form-' + productId);
            if (!form) return;
            form.requestSubmit ? form.requestSubmit() : form.submit();
        }
    </script>
    @endif
</div>
@endsection
