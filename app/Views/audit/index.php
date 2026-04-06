<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Activity Logs</h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">System Activity Logs</h3>
                </div>
                <div class="card-body table-responsive">
                    <?php if (!empty($logs)): ?>
                    <table id="logsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Action</th>
                                <th>Type</th>
                                <th>Date & Time</th>
                            </thead>
                        <tbody>
                            <?php foreach ($logs as $log): ?>
                            <tr>
                                <!-- Use 'username' column from activity_logs -->
                                <td><?= esc($log['username'] ?? 'System') ?></td>
                                <td><?= esc($log['action']) ?></td>
                                <td><span class="badge badge-secondary"><?= esc($log['type'] ?? 'GENERAL') ?></span></td>
                                <td><?= date('M d, Y h:i A', strtotime($log['created_at'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <div class="alert alert-info">No activity logs found. Start performing actions (login, add products, make sales) to see logs here.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#logsTable').DataTable({
        order: [[3, 'desc']],
        responsive: true
    });
});
</script>
<?= $this->endSection() ?>