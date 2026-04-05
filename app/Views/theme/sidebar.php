<aside class="main-sidebar sidebar-light-primary elevation-4" id="mainSidebar">
    <div class="brand-link bg-warning" id="brandLink" style="border-bottom: none;">
        <img src="<?= base_url('assets/adminlte/dist/img/AdminLTELogo.png') ?>" 
             alt="Logo" 
             class="brand-image img-circle elevation-3" 
             style="opacity: .9">
        <span class="brand-text font-weight-bold" style="color: white;">INVENTORY SYS</span>
    </div>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Point of Sale -->
                <li class="nav-item">
                    <a href="<?= base_url('sales/pos') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'sales' && service('uri')->getSegment(2) == 'pos' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Point of Sale</p>
                    </a>
                </li>

                <!-- Sales History -->
                <li class="nav-item">
                    <a href="<?= base_url('sales/history') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'sales' && service('uri')->getSegment(2) == 'history' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Sales History</p>
                    </a>
                </li>

                <!-- ========== ADMIN ONLY ========== -->
                <?php if(session()->get('role') == 'admin'): ?>
                
                <!-- Products Management -->
                <li class="nav-item">
                    <a href="<?= base_url('products') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'products' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Products</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="<?= base_url('categories') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'categories' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <!-- Stock Management -->
                <li class="nav-item">
                    <a href="<?= base_url('stock') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'stock' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Stock Management</p>
                    </a>
                </li>

                <!-- User Management (Accounts) -->
                <li class="nav-item">
                    <a href="<?= base_url('users') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'users' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>User Management</p>
                    </a>
                </li>

                <?php endif; ?>
                <!-- ========== END ADMIN ONLY ========== -->

                <!-- Reports (available for all logged in users) -->
                <li class="nav-item">
                    <a href="<?= base_url('reports') ?>" class="nav-link <?= service('uri')->getSegment(1) == 'reports' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Reports & Analytics</p>
                    </a>
                </li>

                <!-- Logout (always visible) -->
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<style>
/* Force icons to display properly */
.nav-icon {
    display: inline-block;
    width: 1.6rem;
    text-align: center;
    font-size: 1.1rem;
}

/* Sidebar enhancements (orange hover bar) */
.nav-sidebar .nav-link {
    border-radius: 12px;
    margin: 4px 12px;
    padding: 10px 16px;
    font-weight: 500;
    transition: all 0.25s ease;
    position: relative;
}
.nav-sidebar .nav-icon {
    transition: transform 0.2s ease;
}
.nav-sidebar .nav-link:hover .nav-icon {
    transform: translateX(3px);
}
.nav-sidebar .nav-link::before {
    content: "";
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%) scaleY(0);
    height: 60%;
    width: 4px;
    background: linear-gradient(135deg, #ff9800, #ffc107);
    border-radius: 0 4px 4px 0;
    transition: transform 0.2s ease;
}
.nav-sidebar .nav-link.active::before,
.nav-sidebar .nav-link:hover::before {
    transform: translateY(-50%) scaleY(1);
}
.nav-sidebar .nav-link:hover,
.nav-sidebar .nav-link.active {
    background: linear-gradient(95deg, rgba(255,165,0,0.08), rgba(255,165,0,0.02)) !important;
}
.nav-sidebar .nav-link.active .nav-icon {
    color: #ff9800;
}
body.dark-mode .main-sidebar .nav-link {
    color: #e0e4f0 !important;
}
body.dark-mode .nav-sidebar .nav-link.active .nav-icon {
    color: #ffb74d;
}
body.dark-mode .brand-link {
    background: #1f2a3e !important;
}
body.dark-mode .brand-text {
    color: #ffc107 !important;
}
</style>