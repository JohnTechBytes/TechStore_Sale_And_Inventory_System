<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Products</h1></div>
                <div class="col-sm-6 text-right">
                    <a href="/products/create" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="productsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr><th>ID</th><th>Image</th><th>Name</th><th>SKU</th><th>Category</th><th>Price</th><th>Stock</th><th>Status</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td>
                                    <?php if($p['image']): ?>
                                        <img src="/uploads/products/<?= $p['image'] ?>" width="50" height="50" style="object-fit:cover">
                                    <?php else: ?>
                                        <i class="fas fa-box fa-2x text-muted"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?= $p['name'] ?></td>
                                <td><?= $p['sku'] ?></td>
                                <td><?= $p['category_name'] ?? 'Uncategorized' ?></td>
                                <td>₱<?= number_format($p['selling_price'], 2) ?></td>
                                <td>
                                    <?php if($p['stock'] <= $p['min_stock']): ?>
                                        <span class="badge badge-danger"><?= $p['stock'] ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-success"><?= $p['stock'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="badge badge-<?= $p['status'] == 'active' ? 'success' : 'secondary' ?>"><?= $p['status'] ?></span></td>
                                <td>
                                    <a href="/products/edit/<?= $p['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="/products/delete/<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete product?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() { $('#productsTable').DataTable(); });
</script>
<?= $this->endSection() ?>