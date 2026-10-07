<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Database;

final class PosPagesTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();

        $forge = Database::forge('tests');
        $forge->dropTable('customers', true);
        $forge->dropTable('users', true);

        $forge->addField([
            'id' => ['type' => 'INTEGER', 'auto_increment' => true],
            'full_name' => ['type' => 'TEXT'],
            'email' => ['type' => 'TEXT'],
            'phone' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'TEXT'],
        ]);
        $forge->addKey('id', true);
        $forge->createTable('customers');

        $forge->addField([
            'id' => ['type' => 'INTEGER', 'auto_increment' => true],
            'username' => ['type' => 'TEXT'],
            'full_name' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'TEXT'],
        ]);
        $forge->addKey('id', true);
        $forge->createTable('users');

        $db = Database::connect('tests');
        $db->table('customers')->insertBatch([
            ['full_name' => 'Angela Reyes', 'email' => 'angela.reyes@example.com', 'phone' => '09172458103', 'created_at' => '2026-10-03 10:30:00'],
            ['full_name' => 'Sofia Garcia', 'email' => 'sofia.garcia@example.com', 'phone' => '09067315589', 'created_at' => '2026-10-03 10:30:00'],
        ]);
        $db->table('users')->insertBatch([
            ['username' => 'admin.vmarquez', 'full_name' => 'Virgilio Marquez Jr.', 'created_at' => '2026-10-03 10:30:00'],
            ['username' => 'inventory.ramos', 'full_name' => 'Rafael Ramos', 'created_at' => '2026-10-03 10:30:00'],
        ]);
    }

    public function testHomePageLoads(): void
    {
        $result = $this->get('/');

        $result->assertOK();
        $result->assertSee('Good day, Virgilio.');
    }

    public function testAboutPageLoads(): void
    {
        $result = $this->get('/about');

        $result->assertOK();
        $result->assertSee('Four pages, one shared experience');
    }

    public function testCustomerPageDisplaysDatabaseRecords(): void
    {
        $result = $this->get('/customers');

        $result->assertOK();
        $result->assertSee('Customer Accounts');
        $result->assertSee('Angela Reyes');
        $result->assertSee('sofia.garcia@example.com');
    }

    public function testUserPageDisplaysDatabaseRecords(): void
    {
        $result = $this->get('/users');

        $result->assertOK();
        $result->assertSee('User Accounts');
        $result->assertSee('admin.vmarquez');
        $result->assertSee('Rafael Ramos');
    }
}
