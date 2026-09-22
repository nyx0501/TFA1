<?php

namespace App\Controllers;

class Users extends BaseController
{
    /**
     * User (Staff) Accounts page - GET /users
     * Uses a static PHP array as a temporary data source
     * (stand-in for a database table until the data layer is introduced).
     */
    public function index(): string
    {
        $users = [
            [
                'username'  => 'jsmith',
                'full_name' => 'Joseph Smith',
                'role'      => 'Administrator',
            ],
            [
                'username'  => 'aramos',
                'full_name' => 'Aiza Ramos',
                'role'      => 'Cashier',
            ],
            [
                'username'  => 'ptorres',
                'full_name' => 'Paolo Torres',
                'role'      => 'Cashier',
            ],
            [
                'username'  => 'lmendoza',
                'full_name' => 'Liza Mendoza',
                'role'      => 'Inventory Manager',
            ],
            [
                'username'  => 'rvillar',
                'full_name' => 'Rico Villar',
                'role'      => 'Cashier',
            ],
        ];

        $data = [
            'title' => 'User Accounts',
            'users' => $users,
        ];

        return view('users/index', $data);
    }
}
