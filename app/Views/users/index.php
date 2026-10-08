<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading page-heading--compact">
    <div><p class="eyebrow">Administration</p><h1>User Accounts</h1><p class="page-intro">Access overview for <?= count($users) ?> staff members.</p></div>
    <div class="page-actions"><a class="button" href="<?= site_url('users/new') ?>">Add user</a><span class="record-count"><?= count($users) ?> records</span></div>
</section>

<section class="table-section" aria-labelledby="user-list-title">
    <div class="section-heading"><div><p class="eyebrow">Staff list</p><h2 id="user-list-title">Team access</h2></div><span class="data-note">MySQL database</span></div>
    <div class="table-wrap">
        <?php if (session('success')): ?><p class="flash-success"><?= esc(session('success')) ?></p><?php endif ?>
        <table>
            <thead><tr><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Created at</th><th scope="col">Actions</th></tr></thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td data-label="Username"><code><?= esc($user['username']) ?></code></td>
                        <td data-label="Full name"><span class="person-cell"><?php if (! empty($user['avatar'])): ?><img class="avatar-image" src="<?= base_url('uploads/avatars/' . rawurlencode($user['avatar'])) ?>" alt="<?= esc($user['full_name']) ?> avatar"><?php else: ?><span class="initials initials--blue" aria-hidden="true"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></span><?php endif ?><strong><?= esc($user['full_name']) ?></strong></span></td>
                        <td data-label="Created at"><span class="role-badge"><?= esc(date('M j, Y', strtotime($user['created_at']))) ?></span></td>
                        <td data-label="Actions"><a class="text-link" href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
