<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading page-heading--compact">
    <div><p class="eyebrow">Administration</p><h1>User Accounts</h1><p class="page-intro">Access overview for <?= count($users) ?> staff members.</p></div>
    <span class="record-count"><?= count($users) ?> records</span>
</section>

<section class="table-section" aria-labelledby="user-list-title">
    <div class="section-heading"><div><p class="eyebrow">Staff list</p><h2 id="user-list-title">Team access</h2></div><span class="data-note">Temporary PHP array</span></div>
    <div class="table-wrap">
        <table>
            <thead><tr><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Role</th></tr></thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td data-label="Username"><code><?= esc($user['username']) ?></code></td>
                        <td data-label="Full name"><span class="person-cell"><span class="initials initials--blue" aria-hidden="true"><?= esc(strtoupper(substr($user['fullName'], 0, 1))) ?></span><strong><?= esc($user['fullName']) ?></strong></span></td>
                        <td data-label="Role"><span class="role-badge"><?= esc($user['role']) ?></span></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
