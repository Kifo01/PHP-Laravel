<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Northstar POS account management foundation">
    <title><?= esc($title) ?> | Northstar POS</title>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css?v=2') ?>">
</head>
<body>
    <header class="site-header">
        <div class="header-content">
            <a class="brand" href="<?= site_url('/') ?>">Northstar POS</a>
            <nav class="navigation" aria-label="Primary navigation">
                <a class="nav-link <?= $activePage === 'home' ? 'is-active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                <a class="nav-link <?= $activePage === 'customers' ? 'is-active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                <a class="nav-link <?= $activePage === 'users' ? 'is-active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
                <a class="nav-link <?= $activePage === 'about' ? 'is-active' : '' ?>" href="<?= site_url('about') ?>">About</a>
            </nav>
        </div>
    </header>

    <main class="page-content">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="site-footer">Northstar POS - CodeIgniter 4 Activity</footer>
</body>
</html>
