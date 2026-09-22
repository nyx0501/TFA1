<?php

namespace App\Controllers;

class Pages extends BaseController
{
    /**
     * Landing page - GET /
     */
    public function index(): string
    {
        $data = [
            'title' => 'Home',
        ];

        return view('pages/landing', $data);
    }

    /**
     * About page - GET /about
     */
    public function about(): string
    {
        $data = [
            'title' => 'About',
        ];

        return view('pages/about', $data);
    }
}
