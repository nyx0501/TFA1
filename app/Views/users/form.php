<?= $this->include('templates/header') ?>

<?php $placeholder = 'data:image/svg+xml;utf8,' . rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96"><rect width="96" height="96" fill="#cdd6e0"/><circle cx="48" cy="36" r="18" fill="#8a94a3"/><path d="M12 96c0-22 16-34 36-34s36 12 36 34z" fill="#8a94a3"/></svg>'); ?>

<h2><?= esc($title) ?></h2>
<div class="card">
    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>

        <div class="form-group <?= isset($errors['username']) ? 'has-error' : '' ?>">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?= esc($user['username'] ?? '') ?>">
            <?php if (isset($errors['username'])): ?><div class="error"><?= esc($errors['username']) ?></div><?php endif; ?>
        </div>

        <div class="form-group <?= isset($errors['full_name']) ? 'has-error' : '' ?>">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?= esc($user['full_name'] ?? '') ?>">
            <?php if (isset($errors['full_name'])): ?><div class="error"><?= esc($errors['full_name']) ?></div><?php endif; ?>
        </div>

        <div class="form-group <?= isset($errors['role']) ? 'has-error' : '' ?>">
            <label for="role">Role</label>
            <select id="role" name="role">
                <?php foreach ($roles as $role): ?>
                <option value="<?= esc($role) ?>" <?= ($user['role'] ?? 'Cashier') === $role ? 'selected' : '' ?>><?= esc($role) ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['role'])): ?><div class="error"><?= esc($errors['role']) ?></div><?php endif; ?>
        </div>

        <?php if ($isEdit): ?>
        <div class="form-group <?= isset($errors['avatar']) ? 'has-error' : '' ?>">
            <label for="avatar">Profile Picture</label>
            <?php if (! empty($user['avatar']) && is_file(FCPATH . 'uploads/avatars/' . basename($user['avatar']))): ?>
                <img class="avatar-lg" src="<?= base_url('uploads/avatars/' . rawurlencode($user['avatar'])) ?>" alt="Current avatar">
            <?php else: ?>
                <img class="avatar-lg" src="<?= $placeholder ?>" alt="No avatar">
            <?php endif; ?>
            <input type="file" id="avatar" name="avatar" accept="image/png,image/jpeg">
            <div class="hint">JPG or PNG, maximum 2MB.</div>
            <?php if (isset($errors['avatar'])): ?><div class="error"><?= esc($errors['avatar']) ?></div><?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="actions">
            <button type="submit" class="btn">Save</button>
            <a class="btn btn-secondary" href="<?= site_url('users') ?>">Cancel</a>
        </div>
    </form>
</div>

<?= $this->include('templates/footer') ?>
