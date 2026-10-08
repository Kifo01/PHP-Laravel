<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php $isEdit = $customer !== null; ?>
<section class="page-heading page-heading--compact">
    <div><p class="eyebrow">Customer record</p><h1><?= $isEdit ? 'Edit Customer' : 'Add Customer' ?></h1><p class="page-intro">Enter the customer contact details below.</p></div>
    <a class="button button--secondary" href="<?= site_url('customers') ?>">Back to customers</a>
</section>

<section class="form-card">
    <form method="post" action="<?= $isEdit ? site_url('customers/' . $customer['id']) : site_url('customers') ?>">
        <?= csrf_field() ?>
        <div class="form-grid">
            <div class="form-field">
                <label for="full_name">Full name</label>
                <input id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required>
                <?php if (isset($errors['full_name'])): ?><p class="field-error"><?= esc($errors['full_name']) ?></p><?php endif ?>
            </div>
            <div class="form-field">
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required>
                <?php if (isset($errors['email'])): ?><p class="field-error"><?= esc($errors['email']) ?></p><?php endif ?>
            </div>
            <div class="form-field">
                <label for="phone">Phone number</label>
                <input id="phone" name="phone" type="text" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>">
                <?php if (isset($errors['phone'])): ?><p class="field-error"><?= esc($errors['phone']) ?></p><?php endif ?>
            </div>
        </div>
        <div class="form-actions"><button class="button" type="submit"><?= $isEdit ? 'Save changes' : 'Add customer' ?></button><a class="text-link" href="<?= site_url('customers') ?>">Cancel</a></div>
    </form>
</section>
<?= $this->endSection() ?>
