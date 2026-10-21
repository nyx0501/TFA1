<?= $this->include('templates/header') ?>

<h2><?= esc($title) ?></h2>
<div class="card">
    <form action="<?= $action ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="form-group <?= isset($errors['full_name']) ? 'has-error' : '' ?>">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?= esc($customer['full_name'] ?? '') ?>">
            <?php if (isset($errors['full_name'])): ?><div class="error"><?= esc($errors['full_name']) ?></div><?php endif; ?>
        </div>

        <div class="form-group <?= isset($errors['email']) ? 'has-error' : '' ?>">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= esc($customer['email'] ?? '') ?>">
            <?php if (isset($errors['email'])): ?><div class="error"><?= esc($errors['email']) ?></div><?php endif; ?>
        </div>

        <div class="form-group <?= isset($errors['phone']) ? 'has-error' : '' ?>">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= esc($customer['phone'] ?? '') ?>">
            <?php if (isset($errors['phone'])): ?><div class="error"><?= esc($errors['phone']) ?></div><?php endif; ?>
        </div>

        <div class="actions">
            <button type="submit" class="btn">Save</button>
            <a class="btn btn-secondary" href="<?= site_url('customers') ?>">Cancel</a>
        </div>
    </form>
</div>

<?= $this->include('templates/footer') ?>
