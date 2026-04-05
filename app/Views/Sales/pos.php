<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Point of Sale</h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Products Grid -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
                            <div class="card-tools">
                                <input type="text" id="productSearch" class="form-control form-control-sm" placeholder="Search...">
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row p-3" id="productsGrid">
                                <?php if(isset($products) && !empty($products)): ?>
                                    <?php foreach($products as $p): ?>
                                    <div class="col-md-3 col-sm-4 col-6 mb-2 product-item" data-name="<?= strtolower($p['name']) ?>">
                                        <form action="<?= base_url('sales/addToCart') ?>" method="post">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-outline-primary w-100" style="padding: 15px 5px;">
                                                <i class="fas fa-box-open fa-2x d-block mb-1"></i>
                                                <strong><?= $p['name'] ?></strong><br>
                                                ₱<?= number_format($p['selling_price'], 2) ?>
                                            </button>
                                        </form>
                                    </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-12 text-center">No products available</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Sidebar -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h3 class="card-title">Shopping Cart</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr><th>Product</th><th>Qty</th><th>Subtotal</th><th></th></tr>
                                </thead>
                                <tbody id="cartBody">
                                    <?php 
                                    $cart = session()->get('cart') ?? [];
                                    if(empty($cart)): ?>
                                    <tr><td colspan="4" class="text-center">Cart is empty</td></tr>
                                    <?php else: 
                                        $total = 0;
                                        foreach($cart as $item):
                                            $subtotal = $item['price'] * $item['qty'];
                                            $total += $subtotal;
                                    ?>
                                    <tr>
                                        <td><?= $item['name'] ?></td>
                                        <td>
                                            <form action="<?= base_url('sales/updateCart') ?>" method="post" style="display:inline;">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                                <input type="number" name="quantity" value="<?= $item['qty'] ?>" min="1" class="form-control form-control-sm" style="width: 70px;" onchange="this.form.submit()">
                                            </form>
                                        </td>
                                        <td>₱<?= number_format($subtotal, 2) ?></td>
                                        <td>
                                            <a href="<?= base_url('sales/removeFromCart/'.$item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remove item?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr class="table-active">
                                        <td colspan="2"><strong>Total</strong></td>
                                        <td colspan="2"><strong>₱<?= number_format($total, 2) ?></strong></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <form action="<?= base_url('sales/checkout') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <input type="text" name="customer_name" class="form-control" placeholder="Customer Name (optional)">
                                </div>
                                <div class="form-group">
                                    <select name="payment_method" class="form-control">
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                        <option value="online">Online</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-block" <?= empty($cart) ? 'disabled' : '' ?>>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Simple search filter (still works)
$('#productSearch').on('keyup', function() {
    let val = $(this).val().toLowerCase();
    $('.product-item').each(function() {
        let name = $(this).data('name');
        $(this).toggle(name.indexOf(val) !== -1);
    });
});
</script>

<?= $this->endSection() ?>