<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Northstar POS account management foundation">
    <title><?= esc($title) ?> | Northstar POS</title>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <a class="brand" href="<?= site_url('/') ?>" aria-label="Northstar POS home">
                <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span><span></span></span>
                <span><strong>Northstar</strong><small>Point of Sale</small></span>
            </a>

            <nav class="navigation" aria-label="Primary navigation">
                <p class="nav-label">Workspace</p>
                <a class="nav-link <?= $activePage === 'home' ? 'is-active' : '' ?>" href="<?= site_url('/') ?>"><span class="nav-icon" aria-hidden="true">01</span>Dashboard</a>
                <a class="nav-link <?= $activePage === 'customers' ? 'is-active' : '' ?>" href="<?= site_url('customers') ?>"><span class="nav-icon" aria-hidden="true">02</span>Customers</a>
                <a class="nav-link <?= $activePage === 'users' ? 'is-active' : '' ?>" href="<?= site_url('users') ?>"><span class="nav-icon" aria-hidden="true">03</span>Users</a>
                <a class="nav-link <?= $activePage === 'about' ? 'is-active' : '' ?>" href="<?= site_url('about') ?>"><span class="nav-icon" aria-hidden="true">04</span>About</a>
            </nav>

            <div class="sidebar-footer">
                <span class="status-dot" aria-hidden="true"></span>
                <span><strong>System online</strong><small>CodeIgniter 4</small></span>
            </div>
        </aside>

        <main class="main-content">
            <header class="topbar">
                <div><p class="eyebrow">Northstar Retail</p><p class="topbar-title"><?= esc($title) ?></p></div>
                <div class="profile" aria-label="Signed in user">
                    <span class="avatar">VM</span>
                    <span><strong>Virgilio Marquez Jr.</strong><small>Administrator</small></span>
                </div>
            </header>

            <div class="page-content"><?= $this->renderSection('content') ?></div>
        </main>
    </div>
</body>
</html>
