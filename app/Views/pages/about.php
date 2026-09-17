<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <div>
        <p class="eyebrow">About the project</p>
        <h1>A clear foundation for retail operations.</h1>
        <p class="page-intro">Northstar POS demonstrates the route, controller, and view layers of a CodeIgniter application before database integration.</p>
    </div>
</section>

<section class="about-grid">
    <article class="about-copy">
        <p class="eyebrow">Current scope</p>
        <h2>Four pages, one shared experience</h2>
        <p>This first version focuses on application structure. Each URL maps to a controller method, each controller prepares page data, and each view presents that data in a consistent interface.</p>
        <p>Customer and staff records currently live in static PHP arrays. They act as temporary, in-memory data sources and can later be replaced by models connected to a database.</p>
    </article>
    <div class="principles" aria-label="Application architecture">
        <article><span>01</span><div><strong>Routes</strong><p>Match browser URLs to the correct controller methods.</p></div></article>
        <article><span>02</span><div><strong>Controllers</strong><p>Prepare static account data and choose the appropriate view.</p></div></article>
        <article><span>03</span><div><strong>Views</strong><p>Render responsive pages and loop through account records.</p></div></article>
    </div>
</section>

<section class="tech-strip" aria-label="Technology summary">
    <div><span>Framework</span><strong>CodeIgniter 4.7</strong></div>
    <div><span>Language</span><strong>PHP 8.2+</strong></div>
    <div><span>Data source</span><strong>Static arrays</strong></div>
    <div><span>Architecture</span><strong>MVC</strong></div>
</section>
<?= $this->endSection() ?>
