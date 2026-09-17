<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <div>
        <p class="eyebrow">Store overview</p>
        <h1>Good day, Virgilio.</h1>
        <p class="page-intro">Your POS foundation is online and ready for account management.</p>
    </div>
    <span class="date-chip"><?= esc(date('F j, Y')) ?></span>
</section>

<section class="metrics" aria-label="System summary">
    <article class="metric-card metric-card--green"><p>Customer accounts</p><strong>6</strong><a href="<?= site_url('customers') ?>">View directory <span aria-hidden="true">&rarr;</span></a></article>
    <article class="metric-card metric-card--blue"><p>User accounts</p><strong>6</strong><a href="<?= site_url('users') ?>">View staff <span aria-hidden="true">&rarr;</span></a></article>
    <article class="metric-card metric-card--gold"><p>Application pages</p><strong>4</strong><a href="<?= site_url('about') ?>">About this build <span aria-hidden="true">&rarr;</span></a></article>
</section>

<section class="content-section">
    <div class="section-heading"><div><p class="eyebrow">Quick access</p><h2>Manage your workspace</h2></div></div>
    <div class="action-grid">
        <a class="action-row" href="<?= site_url('customers') ?>"><span class="action-number">01</span><span><strong>Customer Accounts</strong><small>Review customer contact records</small></span><span class="action-arrow" aria-hidden="true">&rarr;</span></a>
        <a class="action-row" href="<?= site_url('users') ?>"><span class="action-number">02</span><span><strong>User Accounts</strong><small>Review staff roles and usernames</small></span><span class="action-arrow" aria-hidden="true">&rarr;</span></a>
    </div>
</section>
<?= $this->endSection() ?>
