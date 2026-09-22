<?php

namespace App\Controllers;

class Customers extends BaseController
{
    /**
     * Customer Accounts page - GET /customers
     * Uses a static PHP array as a temporary data source
     * (stand-in for a database table until the data layer is introduced).
     */
    public function index(): string
    {
        $customers = [
            [
                'full_name' => 'Maria Santos',
                'email'     => 'maria.santos@example.com',
                'phone'     => '0917-123-4567',
            ],
            [
                'full_name' => 'Juan Dela Cruz',
                'email'     => 'juan.delacruz@example.com',
                'phone'     => '0918-234-5678',
            ],
            [
                'full_name' => 'Angela Reyes',
                'email'     => 'angela.reyes@example.com',
                'phone'     => '0919-345-6789',
            ],
            [
                'full_name' => 'Marco Villanueva',
                'email'     => 'marco.villanueva@example.com',
                'phone'     => '0920-456-7890',
            ],
            [
                'full_name' => 'Kristine Bautista',
                'email'     => 'kristine.bautista@example.com',
                'phone'     => '0921-567-8901',
            ],
        ];

        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $customers,
        ];

        return view('customers/index', $data);
    }
}
