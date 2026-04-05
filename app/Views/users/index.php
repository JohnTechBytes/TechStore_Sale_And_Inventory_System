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
                            <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Role</th><th>Status</th><th width="150">Actions</th></tr>
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
                                    <td>
                                        <button class="btn btn-sm btn-warning" 
                                                onclick="openEditModal(<?= $u['id'] ?>, '<?= addslashes(esc($u['name'])) ?>', '<?= addslashes(esc($u['email'])) ?>', '<?= addslashes(esc($u['phone'])) ?>', '<?= $u['role'] ?>', '<?= $u['status'] ?>')">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="<?= base_url('users/delete/'.$u['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">
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

<!-- Add User Modal -->
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

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editUserForm" method="post">
                <?= csrf_field() ?>
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
function openEditModal(id, name, email, phone, role, status) {
    document.getElementById('editUserForm').action = '<?= base_url('users/update') ?>/' + id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_phone').value = phone;
    document.getElementById('edit_role').value = role;
    document.getElementById('edit_status').value = status;
    $('#editUserModal').modal('show');
}

$(document).ready(function() {
    $('#usersTable').DataTable();
});
</script>

<?= $this->endSection() ?>