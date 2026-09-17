<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin.vmarquez', 'fullName' => 'Virgilio Marquez Jr.', 'role' => 'Administrator'],
            ['username' => 'manager.aco', 'fullName' => 'Alyssa Co', 'role' => 'Store Manager'],
            ['username' => 'cashier.jflores', 'fullName' => 'Joshua Flores', 'role' => 'Cashier'],
            ['username' => 'cashier.mtan', 'fullName' => 'Mika Tan', 'role' => 'Cashier'],
            ['username' => 'inventory.ramos', 'fullName' => 'Rafael Ramos', 'role' => 'Inventory Staff'],
            ['username' => 'support.diaz', 'fullName' => 'Camille Diaz', 'role' => 'Customer Support'],
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'activePage' => 'users',
            'users' => $users,
        ]);
    }
}
