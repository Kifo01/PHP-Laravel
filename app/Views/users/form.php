<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php $isEdit = $user !== null; ?>
<section class="page-heading page-heading--compact">
    <div><p class="eyebrow">Staff account</p><h1><?= $isEdit ? 'Edit User' : 'Add User' ?></h1><p class="page-intro">Set the account information<?= $isEdit ? ' and optional avatar' : '' ?>.</p></div>
    <a class="button button--secondary" href="<?= site_url('users') ?>">Back to users</a>
</section>

<section class="form-card">
    <form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('users/' . $user['id']) : site_url('users') ?>">
        <?= csrf_field() ?>
        <div class="form-grid">
            <div class="form-field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required>
                <?php if (isset($errors['username'])): ?><p class="field-error"><?= esc($errors['username']) ?></p><?php endif ?>
            </div>
            <div class="form-field">
                <label for="full_name">Full name</label>
                <input id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required>
                <?php if (isset($errors['full_name'])): ?><p class="field-error"><?= esc($errors['full_name']) ?></p><?php endif ?>
            </div>
            <?php if ($isEdit): ?>
                <div class="form-field">
                    <label for="avatar">Avatar (JPG or PNG, max 2 MB)</label>
                    <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
                    <?php if (isset($errors['avatar'])): ?><p class="field-error"><?= esc($errors['avatar']) ?></p><?php endif ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-actions"><button class="button" type="submit"><?= $isEdit ? 'Save changes' : 'Add user' ?></button><a class="text-link" href="<?= site_url('users') ?>">Cancel</a></div>
    </form>
</section>
<?= $this->endSection() ?>
