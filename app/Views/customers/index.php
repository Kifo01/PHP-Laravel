<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading page-heading--compact">
    <div><p class="eyebrow">Directory</p><h1>Customer Accounts</h1><p class="page-intro">Contact details for <?= count($customers) ?> active customer records.</p></div>
    <div class="page-actions"><a class="button" href="<?= site_url('customers/new') ?>">Add customer</a><span class="record-count"><?= count($customers) ?> records</span></div>
</section>

<section class="table-section" aria-labelledby="customer-list-title">
    <div class="section-heading"><div><p class="eyebrow">Customer list</p><h2 id="customer-list-title">Account directory</h2></div><span class="data-note">MySQL database</span></div>
    <div class="table-wrap">
        <?php if (session('success')): ?><p class="flash-success"><?= esc(session('success')) ?></p><?php endif ?>
        <table>
            <thead><tr><th scope="col">Customer</th><th scope="col">Email address</th><th scope="col">Phone number</th><th scope="col">Actions</th></tr></thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td data-label="Customer"><span class="person-cell"><span class="initials" aria-hidden="true"><?= esc(strtoupper(substr($customer['full_name'], 0, 1))) ?></span><strong><?= esc($customer['full_name']) ?></strong></span></td>
                        <td data-label="Email"><a href="mailto:<?= esc($customer['email']) ?>"><?= esc($customer['email']) ?></a></td>
                        <td data-label="Phone"><?= esc($customer['phone']) ?></td>
                        <td data-label="Actions"><a class="text-link" href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
