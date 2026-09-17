<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

final class PosPagesTest extends CIUnitTestCase
{
    use FeatureTestTrait;

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

    public function testCustomerPageDisplaysStaticRecords(): void
    {
        $result = $this->get('/customers');

        $result->assertOK();
        $result->assertSee('Customer Accounts');
        $result->assertSee('Angela Reyes');
        $result->assertSee('daniel.lim@example.com');
    }

    public function testUserPageDisplaysStaticRecords(): void
    {
        $result = $this->get('/users');

        $result->assertOK();
        $result->assertSee('User Accounts');
        $result->assertSee('admin.vmarquez');
        $result->assertSee('Customer Support');
    }
}
