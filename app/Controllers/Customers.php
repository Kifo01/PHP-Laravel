<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['fullName' => 'Angela Reyes', 'email' => 'angela.reyes@example.com', 'phone' => '0917 245 8103'],
            ['fullName' => 'Marco Santos', 'email' => 'marco.santos@example.com', 'phone' => '0928 516 7742'],
            ['fullName' => 'Bianca Cruz', 'email' => 'bianca.cruz@example.com', 'phone' => '0995 308 1264'],
            ['fullName' => 'Paolo Mendoza', 'email' => 'paolo.mendoza@example.com', 'phone' => '0918 663 4920'],
            ['fullName' => 'Sofia Garcia', 'email' => 'sofia.garcia@example.com', 'phone' => '0906 731 5589'],
            ['fullName' => 'Daniel Lim', 'email' => 'daniel.lim@example.com', 'phone' => '0961 482 9075'],
        ];

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'activePage' => 'customers',
            'customers' => $customers,
        ]);
    }
}
