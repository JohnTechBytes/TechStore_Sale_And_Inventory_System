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
            <div class="card">
                <div class="card-body">
                    <form action="<?= isset($product) ? '/products/update/'.$product['id'] : '/products/store' ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name *</label>
                                    <input type="text" name="name" class="form-control" value="<?= old('name', $product['name'] ?? '') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>SKU *</label>
                                    <input type="text" name="sku" class="form-control" value="<?= old('sku', $product['sku'] ?? '') ?>" <?= isset($product) ? 'readonly' : 'required' ?>>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">-- None --</option>
                                        <?php if(isset($categories) && !empty($categories)): ?>
                                            <?php foreach($categories as $cat): ?>
                                                <?php 
                                                $selected = false;
                                                if(isset($product['category_id']) && $product['category_id'] == $cat['id']) {
                                                    $selected = true;
                                                } elseif(isset($selected_category) && $selected_category == $cat['id'] && empty($product['category_id'])) {
                                                    $selected = true;
                                                } elseif(old('category_id') == $cat['id']) {
                                                    $selected = true;
                                                }
                                                ?>
                                                <option value="<?= $cat['id'] ?>" <?= $selected ? 'selected' : '' ?>>
                                                    <?= esc($cat['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="" disabled>No categories found. Please add a category first.</option>
                                        <?php endif; ?>
                                    </select>
                                    <?php if(empty($categories)): ?>
                                        <small class="text-danger"><a href="/categories">Click here to add a category</a></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Buying Price</label>
                                    <input type="number" step="0.01" name="buying_price" class="form-control" value="<?= old('buying_price', $product['buying_price'] ?? 0) ?>">
                                </div>
                            </div>
                          <div class="col-md-6">
    <div class="form-group">
        <label>Selling Price *</label>
        <input type="number" step="0.01" name="selling_price" class="form-control" value="<?= old('selling_price', $product['selling_price'] ?? 0) ?>" required>
    </div>
    <div class="form-group">
        <label>Stock Quantity</label>
        <input type="number" name="stock" class="form-control" value="<?= old('stock', $product['stock'] ?? 0) ?>" required>
    </div>
    <div class="form-group">
        <label>Minimum Stock Alert</label>
        <input type="number" name="min_stock" class="form-control" value="<?= old('min_stock', $product['min_stock'] ?? 5) ?>">
    </div>
                                <div class="form-group">
                                    <label>Product Image</label>
                                    <input type="file" name="image" class="form-control-file">
                                    <?php if(isset($product) && $product['image']): ?>
                                        <img src="/uploads/products/<?= $product['image'] ?>" width="80" class="mt-2">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" <?= (old('status', $product['status'] ?? 'active') == 'active') ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= (old('status', $product['status'] ?? 'active') == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/products" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>