<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Sales History</h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="salesTable" class="table table-bordered table-striped">
                        <thead>
                            <tr><th>Invoice</th><th>Customer</th><th>Total</th><th>Payment</th><th>Date</th><th>Cashier</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php if(isset($sales) && !empty($sales)): ?>
                                <?php foreach($sales as $s): ?>
                                <tr>
                                    <td><?= $s['invoice_no'] ?></td>
                                    <td><?= $s['customer_name'] ?? 'Walk-in' ?></td>
                                    <td>₱<?= number_format($s['grand_total'], 2) ?></td>
                                    <td><?= ucfirst($s['payment_method']) ?></td>
                                    <td><?= date('M d, Y h:i A', strtotime($s['sale_date'])) ?></td>
                                    <td><?= session()->get('name') ?></td>
                                    <td><a href="/sales/receipt/<?= $s['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Receipt</a></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $('#salesTable').DataTable({
        order: [[4, 'desc']],
        responsive: true
    });
});
</script>

<?= $this->endSection() ?>