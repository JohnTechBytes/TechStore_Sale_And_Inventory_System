<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>

<style>
    /* Custom overrides for a sari‑sari store feel */
    .small-box {
        border-radius: 1rem;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .small-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .quick-action-btn {
        border-radius: 1rem;
        padding: 1rem;
        transition: all 0.2s;
        font-weight: 600;
    }
    .quick-action-btn:hover {
        transform: scale(1.02);
        filter: brightness(1.05);
    }
    .store-tip {
        background: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 0.75rem;
        border-radius: 0.5rem;
        color: #856404;
    }
    .table th {
        background-color: #f8f9fa;
    }
    .badge-stock {
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">🏪 Sari‑Sari Store Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <!-- Stats Cards – updated gradient backgrounds -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background: linear-gradient(135deg, #17a2b8, #0d6efd); color: white;">
                        <div class="inner">
                            <h3><?= $total_products ?? 0 ?></h3>
                            <p>Total Products</p>
                        </div>
                        <div class="icon"><i class="fas fa-boxes"></i></div>
                        <a href="/products" class="small-box-footer" style="color: white;">View products <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background: linear-gradient(135deg, #ffc107, #fd7e14); color: #212529;">
                        <div class="inner">
                            <h3><?= $low_stock ?? 0 ?></h3>
                            <p>Low Stock Alert</p>
                        </div>
                        <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                        <a href="/stock" class="small-box-footer" style="color: #212529;">Restock now <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background: linear-gradient(135deg, #28a745, #20c997); color: white;">
                        <div class="inner">
                            <h3>₱<?= number_format($today_sales ?? 0, 2) ?></h3>
                            <p>Today's Sales</p>
                        </div>
                        <div class="icon"><i class="fas fa-chart-line"></i></div>
                        <a href="/sales/history" class="small-box-footer" style="color: white;">View details <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background: linear-gradient(135deg, #6f42c1, #d63384); color: white;">
                        <div class="inner">
                            <h3>₱<?= number_format($month_sales ?? 0, 2) ?></h3>
                            <p>This Month's Sales</p>
                        </div>
                        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                        <a href="/reports" class="small-box-footer" style="color: white;">View report <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions + Top Products row -->
            <div class="row">
                <div class="col-md-7">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h3 class="card-title"><i class="fas fa-bolt text-warning"></i> Quick Actions</h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-4">
                                    <a href="/pos" class="btn btn-success quick-action-btn w-100 mb-3">
                                        <i class="fas fa-shopping-cart fa-2x"></i><br>
                                        New Sale
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="/products/create" class="btn btn-info quick-action-btn w-100 mb-3">
                                        <i class="fas fa-plus-circle fa-2x"></i><br>
                                        Add Product
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="/stock" class="btn btn-warning quick-action-btn w-100 mb-3">
                                        <i class="fas fa-boxes fa-2x"></i><br>
                                        Restock
                                    </a>
                                </div>
                            </div>
                            <div class="store-tip mt-2">
                                <i class="fas fa-lightbulb text-warning"></i> <strong>Sari‑Sari Store Tip:</strong><br>
                                Place best‑sellers at counter level. Check low stock daily before opening.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h3 class="card-title"><i class="fas fa-trophy text-warning"></i> Top 5 Best Sellers</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Units Sold</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($top_products)): ?>
                                        <?php foreach($top_products as $p): ?>
                                        <tr>
                                            <td><i class="fas fa-tag text-info"></i> <?= $p->name ?></td>
                                            <td><span class="badge bg-success rounded-pill"><?= $p->total_sold ?></span></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="2" class="text-center text-muted">No sales yet</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Table (improved styling) -->
            <?php if(!empty($low_stock_list)): ?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card border-danger shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h3 class="card-title"><i class="fas fa-exclamation-circle"></i> Low Stock Products</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Current Stock</th>
                                        <th>Minimum Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($low_stock_list as $p): ?>
                                    <tr>
                                        <td><?= $p['name'] ?></td>
                                        <td class="text-danger fw-bold"><?= $p['stock'] ?></td>
                                        <td><?= $p['min_stock'] ?></td>
                                        <td><a href="/stock" class="btn btn-sm btn-outline-danger">Restock</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>