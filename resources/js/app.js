import './bootstrap';

function showToast(message) {
    const el = document.getElementById('toast');
    if (!el) return;
    el.textContent = message;
    el.style.display = 'block';
    el.style.opacity = 1;
    setTimeout(() => {
        el.style.opacity = 0;
        setTimeout(() => el.style.display = 'none', 300);
    }, 2500);
}

function updateCartCount(count) {
    const el = document.getElementById('cart-count');
    if (el) el.textContent = count;
}

document.addEventListener('DOMContentLoaded', () => {
    // If any forms still have class 'add-to-cart-form' they will be handled as AJAX.
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const url = form.action;
            const data = new FormData(form);
            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 'Accept': 'application/json' },
                    body: data
                });
                const json = await res.json();
                if (json.success) {
                    showToast(json.message || 'Added to cart');
                    updateCartCount(json.count ?? 0);
                } else {
                    showToast('Could not add to cart');
                }
            } catch (err) {
                console.error(err);
                showToast('Error adding to cart');
            }
        });
    });

    // The new default behavior: plain add forms submit normally and redirect to cart page.
    // No additional code required for redirect because controller returns a redirect on non-AJAX requests.

    // Handle AJAX cart updates (quantity change)
    document.querySelectorAll('.ajax-cart-update').forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const url = form.action;
            const data = new FormData(form);
            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 'Accept': 'application/json' },
                    body: data
                });
                const json = await res.json();
                if (json.success) {
                    // update item subtotal and totals
                    const pid = form.querySelector('input[name="product_id"]') ? form.querySelector('input[name="product_id"]').value : null;
                    const cartId = form.querySelector('input[name="cart_id"]') ? form.querySelector('input[name="cart_id"]').value : null;
                    const id = pid ?? cartId;
                    if (pid) {
                        const itemEl = document.getElementById('item-subtotal-' + pid);
                        if (itemEl) itemEl.textContent = '$' + json.item_subtotal;
                    }
                    const subtotalEl = document.getElementById('cart-subtotal');
                    const totalEl = document.getElementById('cart-total');
                    if (subtotalEl) subtotalEl.textContent = json.total;
                    if (totalEl) totalEl.textContent = json.total;
                    updateCartCount(json.count ?? 0);
                    showToast(json.message || 'Cart updated');
                } else {
                    showToast('Could not update cart');
                }
            } catch (err) {
                console.error(err);
                showToast('Error updating cart');
            }
        });

        // auto-submit when qty input changes (debounced)
        const qtyInput = form.querySelector('.ajax-qty');
        if (qtyInput) {
            let timer = null;
            qtyInput.addEventListener('input', () => {
                clearTimeout(timer);
                timer = setTimeout(() => form.dispatchEvent(new Event('submit', { cancelable: true })), 600);
            });
        }
    });

    // Handle AJAX remove
    document.querySelectorAll('.ajax-cart-remove').forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!confirm('Remove this item from your cart?')) return;
            const url = form.action;
            const data = new FormData(form);
            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 'Accept': 'application/json' },
                    body: data
                });
                const json = await res.json();
                if (json.success) {
                    const pid = form.querySelector('input[name="product_id"]') ? form.querySelector('input[name="product_id"]').value : null;
                    const cartRow = document.getElementById('cart-row-' + pid);
                    if (cartRow) cartRow.remove();
                    const subtotalEl = document.getElementById('cart-subtotal');
                    const totalEl = document.getElementById('cart-total');
                    if (subtotalEl) subtotalEl.textContent = json.total;
                    if (totalEl) totalEl.textContent = json.total;
                    updateCartCount(json.count ?? 0);
                    showToast(json.message || 'Item removed');
                } else {
                    showToast('Could not remove item');
                }
            } catch (err) {
                console.error(err);
                showToast('Error removing item');
            }
        });
    });
});
