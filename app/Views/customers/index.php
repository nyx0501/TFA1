<?= $this->include('templates/header') ?>

<div class="toolbar">
    <h2>Customer Accounts</h2>
    <a class="btn" href="<?= site_url('customers/new') ?>">New Customer</a>
</div>
<table>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= esc($customer['full_name']) ?></td>
            <td><?= esc($customer['email']) ?></td>
            <td><?= esc($customer['phone']) ?></td>
            <td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('templates/footer') ?>
