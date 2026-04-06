<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Products</h1></div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('/products/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <!-- Display flash messages -->
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <table id="productsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td>
                                    <?php if (!empty($p['image'])): ?>
                                        <img src="<?= base_url('uploads/products/' . $p['image']) ?>" width="50" height="50" style="object-fit:cover">
                                    <?php else: ?>
                                        <i class="fas fa-box fa-2x text-muted"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($p['name']) ?></td>
                                <td><?= esc($p['sku']) ?></td>
                                <td><?= esc($p['category_name'] ?? 'Uncategorized') ?></td>
                                <td>₱<?= number_format($p['selling_price'], 2) ?></td>
                                <td>
                                    <?php if ($p['stock'] <= $p['min_stock']): ?>
                                        <span class="badge badge-danger"><?= $p['stock'] ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-success"><?= $p['stock'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="badge badge-<?= $p['status'] == 'active' ? 'success' : 'secondary' ?>"><?= $p['status'] ?></span></td>
                                <td>
                                    <a href="<?= base_url('/products/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- Delete form using POST + DELETE method -->
                                    <form action="<?= base_url('/products/delete/' . $p['id']) ?>" method="post" style="display:inline-block;" 
                                          onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
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
    $(function() { 
        $('#productsTable').DataTable(); 
    });
</script>
<?= $this->endSection() ?>