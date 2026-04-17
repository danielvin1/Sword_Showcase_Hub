<!doctype html>
<html lang="en">
<head>
    <link rel='icon' type='image/png' sizes='16x16' href='/images/bladeshare-favicon-16.png'>
    <link rel='icon' type='image/png' sizes='32x32' href='/images/bladeshare-favicon-32.png'>
    <link rel='icon' type='image/png' sizes='48x48' href='/images/bladeshare-favicon-48.png'>
    <link rel='icon' type='image/png' sizes='64x64' href='/images/bladeshare-favicon-64.png'>
    <link rel='icon' type='image/png' sizes='128x128' href='/images/bladeshare-favicon-128.png'>
    <link rel='apple-touch-icon' sizes='128x128' href='/images/bladeshare-favicon-128.png'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop | Sword Showcase Hub</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            padding: 34px 20px 80px;
            font-family: "Cormorant Garamond", Georgia, serif;
            color: #f3ece2;
            background-color: #090807;
            background-image:
                radial-gradient(circle at 14% 10%, rgba(217,168,103,0.14), transparent 32%),
                radial-gradient(circle at 80% 16%, rgba(0, 0, 0, 0.65), transparent 36%),
                repeating-linear-gradient(135deg, rgba(255,255,255,0.04) 0 1px, transparent 1px 16px),
                linear-gradient(180deg, #0d0c0b 0%, #151311 48%, #090807 100%);
        }
        .shell { max-width: 1250px; margin: 0 auto; }
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
            padding: 14px 18px;
            border: 1px solid #e2e2df;
            border-radius: 14px;
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(6px);
            flex-wrap: wrap;
            color: #111111;
            font-family: "Poppins", "Trebuchet MS", sans-serif;
        }
        .brand { font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; }
        .menu {
            display: flex;
            gap: 18px;
            font-size: 14px;
            flex-wrap: nowrap;
            overflow-x: auto;
            max-width: 100%;
            white-space: nowrap;
            padding-bottom: 2px;
        }
        .menu a { color: inherit; text-decoration: none; opacity: 0.8; }
        .menu a:hover { opacity: 1; }
        .cart-trigger {
            border: 1px solid rgba(255,255,255,0.16);
            background: linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.03));
            color: #ece3d6;
            border-radius: 999px;
            min-height: 38px;
            padding: 8px 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: inset 0 0 0 1px rgba(0,0,0,0.18);
            transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
        }
        .cart-trigger:hover {
            background: linear-gradient(180deg, rgba(255,255,255,0.09), rgba(255,255,255,0.05));
            border-color: rgba(241,216,168,0.45);
            transform: translateY(-1px);
        }
        .cart-count {
            display: inline-grid;
            place-items: center;
            min-width: 22px;
            height: 22px;
            padding: 0 6px;
            border-radius: 999px;
            background: rgba(217,168,103,0.2);
            border: 1px solid rgba(217,168,103,0.55);
            color: #f1d8a8;
            font-size: 12px;
            font-weight: 800;
        }
        .shop-hero {
            border-radius: 22px;
            border: 1px solid rgba(255,255,255,0.08);
            background:
                radial-gradient(circle at 20% 18%, rgba(217,168,103,0.18), transparent 30%),
                linear-gradient(180deg, rgba(34, 31, 28, 0.98) 0%, rgba(17, 15, 13, 0.98) 100%);
            box-shadow: 0 18px 36px rgba(0,0,0,0.28);
            padding: 28px;
            margin-bottom: 18px;
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(260px, 0.8fr);
            gap: 20px;
            align-items: center;
        }
        .shop-hero-copy h1 {
            margin: 0;
            font-family: "Cinzel", serif;
            font-size: clamp(30px, 3.8vw, 50px);
            line-height: 1.06;
            letter-spacing: -0.015em;
            text-wrap: balance;
            max-width: 14ch;
        }
        .shop-hero-side p {
            margin: 0;
            color: #b9aa97;
            font-size: 16px;
            line-height: 1.7;
        }
        .hero-meta { margin-top: 14px; display: flex; gap: 10px; flex-wrap: wrap; }
        .pill {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            border: 1px solid rgba(241,216,168,0.2);
            background: rgba(241,216,168,0.08);
            color: #f1d8a8;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 10px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 14px;
        }
        .card {
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.08);
            background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
            overflow: hidden;
            box-shadow: 0 12px 24px rgba(0,0,0,0.24);
            display: grid;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #111;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .card-body { padding: 14px; display: grid; gap: 10px; }
        .card h3 { margin: 0; font-size: 18px; color: #f3ece2; }
        .card p { margin: 0; color: #b9aa97; font-size: 13px; line-height: 1.55; }
        .meta { display: flex; gap: 8px; flex-wrap: wrap; }
        .meta span {
            font-size: 12px;
            color: #d7c6ae;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 999px;
            padding: 4px 8px;
            background: rgba(255,255,255,0.03);
        }
        .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .price { color: #f1d8a8; font-size: 20px; font-weight: 700; }
        .add-btn {
            border: 1px solid rgba(217,168,103,0.6);
            background: rgba(217,168,103,0.2);
            color: #f3ece2;
            border-radius: 999px;
            min-height: 36px;
            padding: 8px 12px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }
        .add-btn:hover { background: rgba(217,168,103,0.34); }
        .cart-panel {
            position: fixed;
            right: 0;
            top: 0;
            bottom: 0;
            width: min(420px, 100vw);
            transform: translateX(100%);
            transition: transform 0.25s ease;
            border-left: 1px solid rgba(255,255,255,0.1);
            background: linear-gradient(180deg, rgba(19,17,15,0.98), rgba(10,9,8,0.98));
            box-shadow: -18px 0 30px rgba(0,0,0,0.38);
            z-index: 90;
            display: grid;
            grid-template-rows: auto 1fr auto;
        }
        .cart-panel.show { transform: translateX(0); }
        .cart-head, .cart-foot { padding: 16px; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .cart-head { display: flex; justify-content: space-between; align-items: center; gap: 10px; }
        .cart-head h2 { margin: 0; font-size: 18px; color: #f1d8a8; font-family: "Cinzel", serif; }
        .close-btn { border: 0; background: transparent; color: #f3ece2; font-size: 24px; line-height: 1; cursor: pointer; }
        .cart-items { padding: 14px; overflow-y: auto; display: grid; gap: 10px; align-content: start; }
        .cart-item {
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            background: rgba(255,255,255,0.03);
            padding: 10px;
            display: grid;
            gap: 8px;
        }
        .cart-item strong { color: #f3ece2; font-size: 14px; }
        .cart-item small { color: #b9aa97; font-size: 12px; }
        .qty-row { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .qty-controls { display: inline-flex; align-items: center; gap: 8px; }
        .qty-controls button, .remove-btn {
            border: 1px solid rgba(217,168,103,0.45);
            background: rgba(217,168,103,0.16);
            color: #f3ece2;
            border-radius: 999px;
            min-height: 28px;
            min-width: 28px;
            padding: 0 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .remove-btn { min-width: auto; padding: 0 10px; }
        .cart-total { margin: 0 0 10px; color: #f1d8a8; font-size: 20px; font-weight: 700; }
        .checkout-note { color: #b9aa97; font-size: 12px; min-height: 16px; margin-bottom: 10px; }
        .backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.55);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
            z-index: 80;
        }
        .backdrop.show { opacity: 1; pointer-events: auto; }
        .empty { color: #b9aa97; border: 1px dashed rgba(255,255,255,0.2); border-radius: 12px; padding: 14px; }
        .site-footer {
            margin-top: 24px;
            padding-top: 14px;
            border-top: 1px solid rgba(255,255,255,0.12);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            color: #b9aa97;
            font-size: 13px;
        }
        .site-footer a {
            text-decoration: none;
            color: inherit;
        }
        @media (max-width: 720px) {
            .topbar { padding: 12px; }
            .menu { gap: 12px; font-size: 13px; row-gap: 8px; }
            .shop-hero {
                padding: 20px;
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .shop-hero-copy h1 { max-width: none; }
            body { padding: 20px 14px 70px; }
        }
    </style>
    <script src="https://www.paypal.com/sdk/js?client-id={{ urlencode(config('services.paypal.client_id', 'sb')) }}&currency={{ urlencode(config('services.paypal.currency', 'EUR')) }}"></script>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>
<body>
<div class="shell">
    <div class="topbar">
        <div class="brand">Sword Showcase Hub</div>
        <nav class="menu" aria-label="Top navigation">
            <a href="/welcome">Explore</a>
            <a href="/feed">Feed</a>
            <a href="/shop">Shop</a>
            <a href="/discussions">Discussions</a>
            <a href="/profile">Profile</a>
            <a href="/upload">Upload Sword</a>
        </nav>
        <button class="cart-trigger" type="button" id="open-cart-btn" aria-label="Open cart">
            <span>Cart</span>
            <span class="cart-count" id="cart-count">0</span>
        </button>
    </div>

    <section class="shop-hero">
        <div class="shop-hero-copy">
            <h1>Buy showcase swords directly from the shop.</h1>
        </div>
        <div class="shop-hero-side">
            <p>Browse published swords, add them to your cart, and complete payment with PayPal from the cart drawer.</p>
            <div class="hero-meta">
                <span class="pill">{{ $swordCount }} swords available</span>
                <span class="pill">Secure checkout with PayPal</span>
            </div>
        </div>
    </section>

    <section class="grid">
        @foreach ($swords as $sword)
            <article class="card" data-sword-id="{{ $sword['id'] }}" data-sword-name="{{ $sword['name'] }}" data-sword-type="{{ $sword['type'] }}" data-sword-price="{{ number_format((float) $sword['price'], 2, '.', '') }}">
                <img src="{{ $sword['image'] }}" alt="{{ $sword['name'] }}">
                <div class="card-body">
                    <h3>{{ $sword['name'] }}</h3>
                    <p>{{ $sword['description'] }}</p>
                    <div class="meta">
                        <span>{{ $sword['type'] }}</span>
                        <span>By {{ $sword['maker'] }}</span>
                    </div>
                    <div class="row">
                        <div class="price">EUR {{ number_format((float) $sword['price'], 2) }}</div>
                        <button class="add-btn" type="button">Add to cart</button>
                    </div>
                </div>
            </article>
        @endforeach
    </section>

    <footer class="site-footer" aria-label="Site footer">
        <span>© {{ date('Y') }} Sword Showcase Hub</span>
        <span>
            <a href="/privacy">Privacy</a>
            ·
            <a href="/terms">Terms</a>
        </span>
    </footer>

</div>

<div class="backdrop" id="cart-backdrop"></div>
<aside class="cart-panel" id="cart-panel" aria-label="Cart checkout panel">
    <div class="cart-head">
        <h2>Your Cart</h2>
        <button class="close-btn" type="button" id="close-cart-btn" aria-label="Close cart">&times;</button>
    </div>

    <div class="cart-items" id="cart-items">
        <div class="empty" id="cart-empty">Your cart is empty. Add swords from the shop to start checkout.</div>
    </div>

    <div class="cart-foot">
        <p class="cart-total" id="cart-total">EUR 0.00</p>
        <div class="checkout-note" id="checkout-note">Pay with PayPal after adding items.</div>
        <div id="paypal-button-container"></div>

        <form method="POST" action="/orders" id="checkout-form" style="display:none;">
            @csrf
            <input type="hidden" name="cart_items" id="cart-items-input">
            <input type="hidden" name="total_amount" id="total-amount-input">
            <input type="hidden" name="paypal_order_id" id="paypal-order-id-input">
            <input type="hidden" name="description" value="Shop checkout purchase">
        </form>
    </div>
</aside>

<script>
window.addEventListener('DOMContentLoaded', () => {
    const openCartBtn = document.getElementById('open-cart-btn');
    const closeCartBtn = document.getElementById('close-cart-btn');
    const cartPanel = document.getElementById('cart-panel');
    const backdrop = document.getElementById('cart-backdrop');
    const cartCount = document.getElementById('cart-count');
    const cartItemsEl = document.getElementById('cart-items');
    const cartEmpty = document.getElementById('cart-empty');
    const cartTotalEl = document.getElementById('cart-total');
    const checkoutNote = document.getElementById('checkout-note');
    const cartItemsInput = document.getElementById('cart-items-input');
    const totalAmountInput = document.getElementById('total-amount-input');
    const paypalOrderIdInput = document.getElementById('paypal-order-id-input');
    const checkoutForm = document.getElementById('checkout-form');

    const cart = [];

    const setNote = (text, isError = false) => {
        checkoutNote.textContent = text;
        checkoutNote.style.color = isError ? '#f4d7d2' : '#b9aa97';
    };

    const openCart = () => {
        cartPanel.classList.add('show');
        backdrop.classList.add('show');
    };
    const closeCart = () => {
        cartPanel.classList.remove('show');
        backdrop.classList.remove('show');
    };

    openCartBtn?.addEventListener('click', openCart);
    closeCartBtn?.addEventListener('click', closeCart);
    backdrop?.addEventListener('click', closeCart);

    const cartTotalValue = () => cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

    const syncHiddenFields = () => {
        cartItemsInput.value = JSON.stringify(cart.map((item) => ({
            name: item.name,
            type: item.type,
            price: item.price,
            quantity: item.quantity,
        })));
        totalAmountInput.value = cartTotalValue().toFixed(2);
    };

    const renderCart = () => {
        cartItemsEl.querySelectorAll('.cart-item').forEach((item) => item.remove());
        cartEmpty.style.display = cart.length === 0 ? 'block' : 'none';

        cart.forEach((item, index) => {
            const el = document.createElement('div');
            el.className = 'cart-item';
            el.innerHTML = `
                <strong>${item.name}</strong>
                <small>${item.type} • EUR ${item.price.toFixed(2)}</small>
                <div class="qty-row">
                    <div class="qty-controls">
                        <button type="button" data-action="decrease" data-index="${index}">-</button>
                        <span>${item.quantity}</span>
                        <button type="button" data-action="increase" data-index="${index}">+</button>
                    </div>
                    <button type="button" class="remove-btn" data-action="remove" data-index="${index}">Remove</button>
                </div>
            `;
            cartItemsEl.appendChild(el);
        });

        cartCount.textContent = String(cart.reduce((sum, item) => sum + item.quantity, 0));
        cartTotalEl.textContent = `EUR ${cartTotalValue().toFixed(2)}`;
        syncHiddenFields();
    };

    document.querySelectorAll('.card .add-btn').forEach((btn) => {
        btn.addEventListener('click', (event) => {
            const card = event.target.closest('.card');
            if (!card) {
                return;
            }

            const swordId = Number(card.dataset.swordId);
            const swordName = card.dataset.swordName || 'Sword';
            const swordType = card.dataset.swordType || 'Custom Sword';
            const swordPrice = Number(card.dataset.swordPrice || 0);

            if (!Number.isFinite(swordId) || !Number.isFinite(swordPrice) || swordPrice <= 0) {
                setNote('Could not add this item to cart.', true);
                return;
            }

            const existing = cart.find((item) => item.id === swordId);
            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({
                    id: swordId,
                    name: swordName,
                    type: swordType,
                    price: Number(swordPrice.toFixed(2)),
                    quantity: 1,
                });
            }

            setNote('Item added to cart.');
            renderCart();
            openCart();
        });
    });

    cartItemsEl.addEventListener('click', (event) => {
        const target = event.target;
        if (!(target instanceof HTMLElement)) {
            return;
        }

        const action = target.getAttribute('data-action');
        const index = Number(target.getAttribute('data-index'));

        if (!action || !Number.isInteger(index) || index < 0 || index >= cart.length) {
            return;
        }

        const item = cart[index];
        if (action === 'increase') {
            item.quantity += 1;
        }
        if (action === 'decrease') {
            item.quantity -= 1;
            if (item.quantity <= 0) {
                cart.splice(index, 1);
            }
        }
        if (action === 'remove') {
            cart.splice(index, 1);
        }

        renderCart();
    });

    renderCart();

    if (window.paypal) {
        window.paypal.Buttons({
            style: { layout: 'horizontal', shape: 'pill' },
            onClick: (_data, actions) => {
                if (cart.length === 0) {
                    setNote('Add at least one sword before checkout.', true);
                    return actions.reject();
                }

                setNote('Redirecting to PayPal checkout...');
                return actions.resolve();
            },
            createOrder: (_data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: cartTotalValue().toFixed(2),
                            currency_code: @json(config('services.paypal.currency', 'EUR')),
                        },
                        description: `Sword shop checkout (${cart.length} items)`,
                    }],
                });
            },
            onApprove: async (data, actions) => {
                await actions.order.capture();
                paypalOrderIdInput.value = data.orderID || '';
                setNote('Payment approved. Saving your order...');
                checkoutForm.submit();
            },
            onCancel: () => {
                setNote('Checkout cancelled. Your cart is still here.', true);
            },
            onError: () => {
                setNote('PayPal error. Please try again.', true);
            },
        }).render('#paypal-button-container');
    }

});
</script>
</body>
</html>
