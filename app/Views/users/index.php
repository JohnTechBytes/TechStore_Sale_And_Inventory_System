<?= $this->extend('theme/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1>User Accounts</h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('message')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        <i class="fas fa-user-plus"></i> Add User
                    </button>
                </div>
                <div class="card-body">
                    <table id="usersTable" class="table table-bordered table-striped">
                        <thead>
                            <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Role</th><th>Status</th><th width="180">Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php if(isset($users) && !empty($users)): ?>
                                <?php foreach($users as $u): ?>
                                <tr>
                                    <td><?= $u['id'] ?></td>
                                    <td><?= esc($u['name']) ?></td>
                                    <td><?= esc($u['email']) ?></td>
                                    <td><?= esc($u['phone']) ?></td>
                                    <td><?= $u['role'] == 'admin' ? '<span class="badge badge-danger">Admin</span>' : '<span class="badge badge-info">Staff</span>' ?></td>
                                    <td><?= $u['status'] == 'active' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>' ?></td>
                                    <td class="text-nowrap" style="min-width: 160px;">
                                        <button class="btn btn-sm btn-warning edit-user-btn" 
                                                data-id="<?= $u['id'] ?>"
                                                data-name="<?= esc($u['name']) ?>"
                                                data-email="<?= esc($u['email']) ?>"
                                                data-phone="<?= esc($u['phone']) ?>"
                                                data-role="<?= $u['role'] ?>"
                                                data-status="<?= $u['status'] ?>"
                                                style="width: 70px; margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="<?= base_url('users/delete/'.$u['id']) ?>" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Delete this user?')"
                                           style="width: 70px;">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="7" class="text-center">No users found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal (unchanged) -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('users/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header"><h5>Add User</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <div class="form-group"><label>Full Name *</label><input type="text" name="name" class="form-control" required></div>
                    <div class="form-group"><label>Email *</label><input type="email" name="email" class="form-control" required></div>
                    <div class="form-group"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
                    <div class="form-group"><label>Password *</label><input type="password" name="password" class="form-control" required></div>
                    <div class="form-group"><label>Role</label>
                        <select name="role" class="form-control">
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal (unchanged, but ensure PUT method) -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editUserForm" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-header"><h5>Edit User</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <div class="form-group"><label>Full Name *</label><input type="text" name="name" id="edit_name" class="form-control" required></div>
                    <div class="form-group"><label>Email *</label><input type="email" name="email" id="edit_email" class="form-control" required></div>
                    <div class="form-group"><label>Phone</label><input type="text" name="phone" id="edit_phone" class="form-control"></div>
                    <div class="form-group"><label>New Password (leave blank to keep)</label><input type="password" name="password" class="form-control"></div>
                    <div class="form-group"><label>Role</label>
                        <select name="role" id="edit_role" class="form-control">
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Status</label>
                        <select name="status" id="edit_status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable();

    // Edit button handler (using data attributes)
    $(document).on('click', '.edit-user-btn', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let phone = $(this).data('phone');
        let role = $(this).data('role');
        let status = $(this).data('status');

        $('#editUserForm').attr('action', '<?= base_url('users/update') ?>/' + id);
        $('#edit_name').val(name);
        $('#edit_email').val(email);
        $('#edit_phone').val(phone);
        $('#edit_role').val(role);
        $('#edit_status').val(status);
        $('#editUserModal').modal('show');
    });
});
</script>

<?= $this->endSection() ?>