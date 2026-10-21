<?= $this->include('templates/header') ?>

<?php $placeholder = 'data:image/svg+xml;utf8,' . rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96"><rect width="96" height="96" fill="#cdd6e0"/><circle cx="48" cy="36" r="18" fill="#8a94a3"/><path d="M12 96c0-22 16-34 36-34s36 12 36 34z" fill="#8a94a3"/></svg>'); ?>

<div class="toolbar">
    <h2>User Accounts</h2>
    <a class="btn" href="<?= site_url('users/new') ?>">New User</a>
</div>
<table>
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?php if (! empty($user['avatar']) && is_file(FCPATH . 'uploads/avatars/' . basename($user['avatar']))): ?>
                    <img class="avatar" src="<?= base_url('uploads/avatars/' . rawurlencode($user['avatar'])) ?>" alt="<?= esc($user['full_name']) ?>">
                <?php else: ?>
                    <img class="avatar" src="<?= $placeholder ?>" alt="No avatar">
                <?php endif; ?>
            </td>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>
            <td><?= esc($user['role']) ?></td>
            <td><a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('templates/footer') ?>
