<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Stock Management</h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('message')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <table id="stockTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Current Stock</th>
                                <th>Min Stock</th>
                                <th>Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($products) && !empty($products)): ?>
                                <?php foreach($products as $p): ?>
                                <tr>
                                    <td><?= $p['id'] ?></td>
                                    <td><?= esc($p['name']) ?></td>
                                    <td><?= esc($p['sku']) ?></td>
                                    <td class="<?= ($p['stock'] <= $p['min_stock']) ? 'text-danger font-weight-bold' : '' ?>">
                                        <?= $p['stock'] ?>
                                    </td>
                                    <td><?= $p['min_stock'] ?></td>
                                    <td>
                                        <?php if($p['stock'] <= $p['min_stock']): ?>
                                            <span class="badge badge-danger">Low</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Good</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <!-- Use onclick directly -->
                                        <button class="btn btn-sm btn-primary" 
                                                onclick="openStockModal(<?= $p['id'] ?>, '<?= addslashes(esc($p['name'])) ?>')">
                                            <i class="fas fa-plus"></i> Add Stock
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="7" class="text-center">No products found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal (unchanged) -->
<div class="modal fade" id="stockModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url('stock/add') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="product_id" id="modal_product_id">
                <div class="modal-header">
                    <h5 class="modal-title">Add Stock</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Product: <strong id="modal_product_name"></strong></p>
                    <div class="form-group">
                        <label>Quantity *</label>
                        <input type="number" name="quantity" class="form-control" required min="1">
                    </div>
                    <div class="form-group">
                        <label>Reference (optional)</label>
                        <input type="text" name="note" class="form-control" placeholder="PO #, Supplier">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Stock</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Plain JavaScript function to open the modal
function openStockModal(productId, productName) {
    // Set the hidden input and product name span
    document.getElementById('modal_product_id').value = productId;
    document.getElementById('modal_product_name').innerText = productName;
    
    // Show the modal using jQuery (Bootstrap requires jQuery for .modal('show'))
    // If jQuery is loaded, this will work. If not, we'll see an error.
    if (typeof $ !== 'undefined') {
        $('#stockModal').modal('show');
    } else {
        alert('jQuery is not loaded. Modal cannot be shown.');
    }
}

// Optional: initialize DataTable with jQuery if available
$(document).ready(function() {
    if ($.fn.DataTable) {
        $('#stockTable').DataTable();
    }
});
</script>

<?= $this->endSection() ?>