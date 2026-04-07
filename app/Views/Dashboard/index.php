<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>

<style>
    /* Modern Dashboard UI – works in both light/dark mode */
    .stat-card {
        background: var(--bs-card-bg, rgba(255,255,255,0.1));
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(128,128,128,0.2);
        padding: 1.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        border-color: rgba(128,128,128,0.4);
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
    }
    .stat-icon {
        width: 50px;
        height: 50px;
        background: rgba(128,128,128,0.2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
    }
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0;
        color: inherit; /* uses body text color */
    }
    .stat-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
        color: inherit;
    }
    .quick-action-card {
        background: var(--bs-card-bg, rgba(255,255,255,0.05));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(128,128,128,0.2);
        border-radius: 20px;
        transition: all 0.3s;
    }
    .quick-action-card:hover {
        transform: translateY(-5px);
        background: rgba(128,128,128,0.1);
        border-color: #667eea;
    }
    .action-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.8rem;
        color: white;
    }
    .store-tip {
        background: linear-gradient(135deg, #ffe259, #ffa751);
        border-radius: 15px;
        padding: 1rem;
        color: #2c3e50;
        font-weight: 500;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .modern-table {
        border-radius: 15px;
        overflow: hidden;
    }
    .modern-table thead th {
        background: rgba(128,128,128,0.1);
        border: none;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: inherit;
    }
    .modern-table tbody tr {
        transition: all 0.2s;
        border-bottom: 1px solid rgba(128,128,128,0.1);
    }
    .modern-table tbody tr:hover {
        background: rgba(128,128,128,0.05);
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease forwards;
    }
    /* Ensure links in cards are visible */
    .stat-card a, .quick-action-card a {
        color: inherit;
        text-decoration: none;
        opacity: 0.8;
    }
    .stat-card a:hover, .quick-action-card a:hover {
        opacity: 1;
        text-decoration: underline;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold">🏪 Sari‑Sari Store Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-transparent">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <!-- Stats Cards Row -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-6 animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-value"><?= number_format($total_products ?? 0) ?></div>
                                <div class="stat-label">Total Products</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/products">View all →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-value"><?= number_format($low_stock ?? 0) ?></div>
                                <div class="stat-label">Low Stock Alert</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/stock">Restock now →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-value">₱<?= number_format($today_sales ?? 0, 2) ?></div>
                                <div class="stat-label">Today's Sales</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/sales/history">View details →</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 animate-fade-in-up" style="animation-delay: 0.4s">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-value">₱<?= number_format($month_sales ?? 0, 2) ?></div>
                                <div class="stat-label">This Month's Sales</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/reports">View report →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions + Top Products -->
            <div class="row g-4 mb-4">
                <div class="col-md-7 animate-fade-in-up" style="animation-delay: 0.5s">
                    <div class="card quick-action-card h-100">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><i class="fas fa-bolt text-warning me-2"></i> Quick Actions</h4>
                            <div class="row text-center">
                                <div class="col-4">
                                    <a href="/pos" class="text-decoration-none">
                                        <div class="action-icon mx-auto">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <h6 class="mt-2 mb-0">New Sale</h6>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="/products/create" class="text-decoration-none">
                                        <div class="action-icon mx-auto">
                                            <i class="fas fa-plus-circle"></i>
                                        </div>
                                        <h6 class="mt-2 mb-0">Add Product</h6>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="/stock" class="text-decoration-none">
                                        <div class="action-icon mx-auto">
                                            <i class="fas fa-boxes"></i>
                                        </div>
                                        <h6 class="mt-2 mb-0">Restock</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="store-tip mt-4">
                                <i class="fas fa-lightbulb me-2"></i>
                                <strong>Store Tip:</strong> Best‑sellers at eye level. Check low stock daily before opening.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 animate-fade-in-up" style="animation-delay: 0.6s">
                    <div class="card quick-action-card h-100">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><i class="fas fa-trophy text-warning me-2"></i> Top 5 Best Sellers</h4>
                            <div class="table-responsive">
                                <table class="table modern-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Units Sold</th>
                                        </thead>
                                    <tbody>
                                        <?php if(!empty($top_products)): ?>
                                            <?php foreach($top_products as $p): ?>
                                            <tr>
                                                <td><i class="fas fa-tag text-info me-2"></i> <?= esc($p->name) ?></td>
                                                <td><span class="badge bg-success rounded-pill px-3"><?= $p->total_sold ?></span></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="2" class="text-center text-muted py-4">No sales yet</td>
                                            <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Table (if any) -->
            <?php if(!empty($low_stock_list)): ?>
            <div class="row animate-fade-in-up" style="animation-delay: 0.7s">
                <div class="col-12">
                    <div class="card quick-action-card border-danger">
                        <div class="card-header bg-transparent border-danger">
                            <h3 class="card-title mb-0"><i class="fas fa-exclamation-circle me-2"></i>Low Stock Products</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table modern-table mb-0">
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
                                            <td><?= esc($p['name']) ?></td>
                                            <td class="text-danger fw-bold"><?= $p['stock'] ?></td>
                                            <td><?= $p['min_stock'] ?></td>
                                            <td><a href="/stock" class="btn btn-sm btn-outline-danger rounded-pill">Restock</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>