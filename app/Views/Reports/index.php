<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Reports & Analytics</h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <!-- Sales and Top Products Row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Monthly Sales (<?= date('Y') ?>)</div>
                        <div class="card-body"><canvas id="salesChart" height="250"></canvas></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Top 10 Products</div>
                        <div class="card-body"><canvas id="topProductsChart" height="250"></canvas></div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Products -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">Low Stock Products</div>
                        <div class="card-body">
                            <?php if(isset($low_stock) && !empty($low_stock)): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th>Product</th><th>Current Stock</th><th>Minimum</th><th>Action</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach($low_stock as $p): ?>
                                    <tr>
                                        <td><?= esc($p['name']) ?></td>
                                        <td class="text-danger font-weight-bold"><?= $p['stock'] ?></td>
                                        <td><?= $p['min_stock'] ?></td>
                                        <td><a href="/stock" class="btn btn-sm btn-primary">Restock</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <div class="alert alert-success mb-0">No low stock products found. All stock levels are good.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Logs Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">Recent Activity Logs</div>
                        <div class="card-body">
                            <table id="logsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr><th>User</th><th>Action</th><th>Type</th><th>Date & Time</th><th>Link</th></tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($activity_logs)): ?>
                                        <?php foreach($activity_logs as $log): ?>
                                        <tr>
                                            <td><?= esc($log['user_name'] ?? 'System') ?></td>
                                            <td><?= esc($log['action']) ?></td>
                                            <td><span class="badge badge-secondary"><?= esc($log['type']) ?></span></td>
                                            <td><?= date('M d, Y h:i A', strtotime($log['created_at'])) ?></td>
                                            <td>
                                                <?php
                                                $link = '#';
                                                $text = 'View';
                                                switch($log['type']) {
                                                    case 'PRODUCT': $link = '/products'; break;
                                                    case 'SALE': $link = '/sales/history'; break;
                                                    case 'STOCK': $link = '/stock'; break;
                                                    case 'CATEGORY': $link = '/categories'; break;
                                                    case 'USER': $link = '/users'; break;
                                                    default: $text = 'Details';
                                                }
                                                if ($link != '#') {
                                                    echo '<a href="' . $link . '" class="btn btn-sm btn-info">' . $text . '</a>';
                                                } else {
                                                    echo '—';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="5" class="text-center">No activity logs found.<?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#logsTable').DataTable({
        order: [[3, 'desc']],
        responsive: true
    });

    const monthlyData = <?= $monthly_sales ?>;
    new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{ label: 'Sales (₱)', data: monthlyData, borderColor: 'rgb(75, 192, 192)', tension: 0.1, fill: true }]
        }
    });

    const topProducts = <?= json_encode(array_column($top_products, 'total_sold')) ?>;
    const topLabels = <?= json_encode(array_column($top_products, 'name')) ?>;
    new Chart(document.getElementById('topProductsChart'), {
        type: 'bar',
        data: { labels: topLabels, datasets: [{ label: 'Units Sold', data: topProducts, backgroundColor: 'rgba(54, 162, 235, 0.6)' }] }
    });
});
</script>

<?= $this->endSection() ?>