<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header"><div class="container-fluid"><h1>Receipt #<?= $sale['invoice_no'] ?></h1></div></div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body" id="receiptContent">
                            <div class="text-center"><h3>INVENTORY SYS</h3><p><?= date('F d, Y h:i A', strtotime($sale['sale_date'])) ?></p></div>
                            <hr>
                            <p><strong>Invoice:</strong> <?= $sale['invoice_no'] ?><br>
                            <strong>Customer:</strong> <?= $sale['customer_name'] ?? 'Walk-in' ?><br>
                            <strong>Cashier:</strong> <?= session()->get('name') ?></p>
                            <table class="table table-sm">
                                <thead><tr><th>Item</th><th>Qty</th><th>Price</th><th>Total</th></tr></thead>
                                <tbody>
                                    <?php foreach($items as $i): ?>
                                    <tr><td><?= $i['name'] ?></td><td><?= $i['quantity'] ?></td><td>₱<?= number_format($i['price'],2) ?></td><td>₱<?= number_format($i['total'],2) ?></td></tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot><tr><th colspan="3" class="text-right">Grand Total:</th><th>₱<?= number_format($sale['grand_total'],2) ?></th></tr></tfoot>
                            </table>
                            <hr><div class="text-center"><p>Thank you!</p></div>
                        </div>
                        <div class="card-footer text-center">
                            <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                            <a href="/sales/pos" class="btn btn-success">New Sale</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>@media print{ .main-header,.main-sidebar,.main-footer,.card-footer,.btn{display:none;} .card{border:none;} }</style>
<?= $this->endSection() ?>