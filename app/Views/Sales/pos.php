<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>

<style>
    .product-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 1rem;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    /* Image container – fixed aspect ratio 1:1 */
    .product-img-wrapper {
        width: 100%;
        padding-top: 100%; /* 1:1 aspect ratio */
        position: relative;
        background: #f8f9fa;
        overflow: hidden;
    }
    .product-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;  /* Ensures image covers the area without distortion */
        object-position: center;
    }
    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 0.75rem;
    }
    .product-title {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
        line-height: 1.3;
        display: -webkit-box;
        line-clamp: 2;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .product-price {
        font-size: 1rem;
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 0.5rem;
    }
    .cart-item-img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 8px;
    }
    .cart-total {
        font-size: 1.3rem;
        font-weight: bold;
    }
    .checkout-btn {
        background: linear-gradient(135deg, #28a745, #20c997);
        border: none;
        font-weight: 600;
    }
    .qty-btn {
        width: 28px;
        height: 28px;
        padding: 0;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .product-title {
            font-size: 0.8rem;
        }
        .product-price {
            font-size: 0.9rem;
        }
        .input-group-sm .btn {
            padding: 0.2rem 0.4rem;
        }
        .qty-val {
            width: 40px !important;
        }
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1><i class="fas fa-shopping-cart"></i> Point of Sale</h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Products Grid -->
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h3 class="card-title"><i class="fas fa-boxes text-primary"></i> Products</h3>
                            <div class="card-tools">
                                <input type="text" id="productSearch" class="form-control form-control-sm" placeholder="🔍 Search product...">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" id="productsGrid">
                                <?php if(isset($products) && !empty($products)): ?>
                                    <?php foreach($products as $p): ?>
                                    <div class="col-md-3 col-sm-4 col-6 mb-3 product-item" data-name="<?= strtolower($p['name']) ?>">
                                        <div class="card product-card h-100">
                                            <div class="product-img-wrapper">
                                                <img src="<?= base_url(!empty($p['image']) ? 'uploads/products/'.$p['image'] : 'assets/img/no-image.png') ?>" 
                                                     class="product-img" 
                                                     alt="<?= esc($p['name']) ?>"
                                                     loading="lazy"
                                                     onerror="this.src='<?= base_url('assets/img/no-image.png') ?>'">
                                            </div>
                                            <div class="card-body text-center">
                                                <h6 class="product-title"><?= esc($p['name']) ?></h6>
                                                <div class="product-price">₱<?= number_format($p['selling_price'], 2) ?></div>
                                                <div class="input-group input-group-sm justify-content-center">
                                                    <button class="btn btn-outline-secondary qty-decr" type="button">−</button>
                                                    <input type="number" class="form-control form-control-sm text-center qty-val" value="1" min="1" max="99" style="width: 50px;">
                                                    <button class="btn btn-outline-secondary qty-incr" type="button">+</button>
                                                    <button class="btn btn-primary btn-sm add-to-cart ms-2" 
                                                            data-id="<?= $p['id'] ?>" 
                                                            data-name="<?= esc($p['name']) ?>" 
                                                            data-price="<?= $p['selling_price'] ?>"
                                                            data-img="<?= base_url(!empty($p['image']) ? 'uploads/products/'.$p['image'] : 'assets/img/no-image.png') ?>">
                                                        <i class="fas fa-cart-plus"></i> Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-12 text-center text-muted">No products available</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Sidebar (unchanged) -->
                <div class="col-md-4">
                    <div class="card shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-warning text-white">
                            <h3 class="card-title"><i class="fas fa-shopping-cart"></i> Cart</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr><th>Item</th><th>Qty</th><th>Subtotal</th><th></th></tr>
                                </thead>
                                <tbody id="cartBody">
                                    <tr><td colspan="4" class="text-center">Cart is empty</td></tr>
                                </tbody>
                                <tfoot id="cartFooter" style="display:none;">
                                    <tr><td colspan="2"><strong>Total</strong></td>
                                    <td colspan="2"><strong id="cartTotal">₱0.00</strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer bg-light">
                            <form id="checkoutForm" action="<?= base_url('sales/checkout') ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="cart_data" id="cartData">
                                <div class="form-group">
                                    <input type="text" name="customer_name" class="form-control" placeholder="Customer name (optional)">
                                </div>
                                <div class="form-group">
                                    <select name="payment_method" class="form-control" required>
                                        <option value="cash">💵 Cash</option>
                                        <option value="card">💳 Card</option>
                                        <option value="online">📱 Online</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-block checkout-btn" id="checkoutBtn" disabled>
                                    <i class="fas fa-check-circle"></i> Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript remains exactly the same as before
let cart = [];

let savedCart = localStorage.getItem('pos_cart');
if(savedCart) {
    try {
        cart = JSON.parse(savedCart);
    } catch(e) {}
}

function renderCart() {
    let tbody = '';
    let total = 0;
    if(cart.length === 0) {
        tbody = '<tr><td colspan="4" class="text-center">Cart is empty</td></tr>';
        document.getElementById('cartFooter').style.display = 'none';
        document.getElementById('checkoutBtn').disabled = true;
    } else {
        cart.forEach((item, idx) => {
            let subtotal = item.price * item.qty;
            total += subtotal;
            tbody += `
                <tr>
                    <td><img src="${item.img}" class="cart-item-img" onerror="this.src='<?= base_url('assets/img/no-image.png') ?>'"> ${escapeHtml(item.name)}</td>
                    <td>
                        <div class="input-group input-group-sm">
                            <button class="btn btn-outline-secondary qty-minus" data-index="${idx}">−</button>
                            <input type="number" class="form-control form-control-sm text-center cart-qty" data-index="${idx}" value="${item.qty}" min="1" style="width: 60px;">
                            <button class="btn btn-outline-secondary qty-plus" data-index="${idx}">+</button>
                        </div>
                    </td>
                    <td>₱${subtotal.toFixed(2)}</td>
                    <td><button class="btn btn-sm btn-danger remove-item" data-index="${idx}"><i class="fas fa-trash"></i></button></td>
                </tr>
            `;
        });
        document.getElementById('cartFooter').style.display = '';
        document.getElementById('checkoutBtn').disabled = false;
        document.getElementById('cartTotal').innerText = '₱' + total.toFixed(2);
    }
    document.getElementById('cartBody').innerHTML = tbody;
    localStorage.setItem('pos_cart', JSON.stringify(cart));
    attachCartEvents();
}

function attachCartEvents() {
    document.querySelectorAll('.qty-minus').forEach(btn => {
        btn.onclick = () => {
            let idx = parseInt(btn.getAttribute('data-index'));
            if(cart[idx].qty > 1) {
                cart[idx].qty--;
                renderCart();
            }
        };
    });
    document.querySelectorAll('.qty-plus').forEach(btn => {
        btn.onclick = () => {
            let idx = parseInt(btn.getAttribute('data-index'));
            cart[idx].qty++;
            renderCart();
        };
    });
    document.querySelectorAll('.cart-qty').forEach(input => {
        input.onchange = () => {
            let idx = parseInt(input.getAttribute('data-index'));
            let newQty = parseInt(input.value);
            if(isNaN(newQty) || newQty < 1) newQty = 1;
            cart[idx].qty = newQty;
            renderCart();
        };
    });
    document.querySelectorAll('.remove-item').forEach(btn => {
        btn.onclick = () => {
            let idx = parseInt(btn.getAttribute('data-index'));
            cart.splice(idx, 1);
            renderCart();
        };
    });
}

function addToCart(id, name, price, qty, img) {
    let existing = cart.find(item => item.id == id);
    if(existing) {
        existing.qty += qty;
    } else {
        cart.push({ id, name, price, qty, img });
    }
    renderCart();
    let btn = document.querySelector(`.add-to-cart[data-id="${id}"]`);
    if(btn) {
        let originalHtml = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i> Added';
        setTimeout(() => { btn.innerHTML = originalHtml; }, 800);
    }
}

document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.onclick = (e) => {
        e.preventDefault();
        let id = parseInt(btn.getAttribute('data-id'));
        let name = btn.getAttribute('data-name');
        let price = parseFloat(btn.getAttribute('data-price'));
        let qty = parseInt(btn.closest('.input-group').querySelector('.qty-val').value) || 1;
        let img = btn.getAttribute('data-img');
        addToCart(id, name, price, qty, img);
    };
});

document.querySelectorAll('.qty-incr').forEach(inc => {
    inc.onclick = () => {
        let input = inc.closest('.input-group').querySelector('.qty-val');
        input.value = parseInt(input.value) + 1;
    };
});
document.querySelectorAll('.qty-decr').forEach(dec => {
    dec.onclick = () => {
        let input = dec.closest('.input-group').querySelector('.qty-val');
        let val = parseInt(input.value);
        if(val > 1) input.value = val - 1;
    };
});

document.getElementById('productSearch').addEventListener('keyup', function() {
    let val = this.value.toLowerCase();
    document.querySelectorAll('.product-item').forEach(el => {
        let name = el.getAttribute('data-name');
        el.style.display = name.indexOf(val) !== -1 ? '' : 'none';
    });
});

document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    if(cart.length === 0) {
        alert('Cart is empty');
        e.preventDefault();
        return false;
    }
    document.getElementById('cartData').value = JSON.stringify(cart);
    localStorage.removeItem('pos_cart');
    return true;
});

function escapeHtml(str) {
    if(!str) return '';
    return str.replace(/[&<>]/g, function(m) {
        if(m === '&') return '&amp;';
        if(m === '<') return '&lt;';
        if(m === '>') return '&gt;';
        return m;
    });
}

renderCart();
</script>
<?= $this->endSection() ?>