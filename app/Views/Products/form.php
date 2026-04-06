<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1><?= isset($product) ? 'Edit Product' : 'Add Product' ?></h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <!-- Display validation errors -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Display success/error messages -->
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url(isset($product) ? '/products/update/'.$product['id'] : '/products/store') ?>" 
                          method="post" 
                          enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="<?= isset($product) ? 'PUT' : 'POST' ?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name *</label>
                                    <input type="text" name="name" class="form-control" 
                                           value="<?= old('name', $product['name'] ?? '') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>SKU *</label>
                                    <input type="text" name="sku" class="form-control" 
                                           value="<?= old('sku', $product['sku'] ?? '') ?>" 
                                           <?= isset($product) ? 'readonly' : 'required' ?>>
                                </div>
                                <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
        <option value="">-- Select Category --</option>
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= (old('category_id', $product['category_id'] ?? '') == $cat['id']) ? 'selected' : '' ?>>
                    <?= esc($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="" disabled>No categories available</option>
        <?php endif; ?>
    </select>
</div>
                                <div class="form-group">
                                    <label>Buying Price (Cost)</label>
                                    <input type="number" step="0.01" name="buying_price" class="form-control" 
                                           value="<?= old('buying_price', $product['buying_price'] ?? 0) ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Selling Price *</label>
                                    <input type="number" step="0.01" name="selling_price" class="form-control" 
                                           value="<?= old('selling_price', $product['selling_price'] ?? 0) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Stock Quantity</label>
                                    <input type="number" name="stock" class="form-control" 
                                           value="<?= old('stock', $product['stock'] ?? 0) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Minimum Stock Alert</label>
                                    <input type="number" name="min_stock" class="form-control" 
                                           value="<?= old('min_stock', $product['min_stock'] ?? 5) ?>">
                                </div>
                                <div class="form-group">
                                    <label>Product Image</label>
                                    <input type="file" name="image" class="form-control-file" accept="image/*">
                                    <?php if (isset($product) && !empty($product['image'])): ?>
                                        <div class="mt-2">
                                            <img src="<?= base_url('uploads/products/' . $product['image']) ?>" width="80" class="img-thumbnail">
                                            <label class="mt-1">
                                                <input type="checkbox" name="remove_image" value="1"> Remove existing image
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" <?= old('status', $product['status'] ?? 'active') == 'active' ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= old('status', $product['status'] ?? 'active') == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="<?= base_url('/products') ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>