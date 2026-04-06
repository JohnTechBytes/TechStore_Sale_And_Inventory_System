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
                        <div class="card-body">
                            <canvas id="salesChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Top 10 Products</div>
                        <div class="card-body">
                            <canvas id="topProductsChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Products -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">Low Stock Products</div>
                        <div class="card-body">
                            <?php if (!empty($low_stock)): ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Current Stock</th>
                                            <th>Minimum</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($low_stock as $p): ?>
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
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Monthly sales chart
        const monthlyData = <?= $monthly_sales ?>;
        const ctxSales = document.getElementById('salesChart').getContext('2d');
        new Chart(ctxSales, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales (₱)',
                    data: monthlyData,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { callback: value => '₱' + value.toLocaleString() }
                    }
                }
            }
        });

        // Top 10 products chart
        const topProducts = <?= json_encode(array_column($top_products, 'total_sold')) ?>;
        const topLabels = <?= json_encode(array_column($top_products, 'name')) ?>;
        const ctxProducts = document.getElementById('topProductsChart').getContext('2d');
        new Chart(ctxProducts, {
            type: 'bar',
            data: {
                labels: topLabels,
                datasets: [{
                    label: 'Units Sold',
                    data: topProducts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });
    });
</script>
<?= $this->endSection() ?>