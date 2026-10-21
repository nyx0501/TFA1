<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    private array $rules = [
        'full_name' => 'required|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'phone'     => 'permit_empty|max_length[20]',
    ];

    public function index(): string
    {
        $model = new CustomerModel();

        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $model->orderBy('id', 'ASC')->findAll(),
        ];

        return view('customers/index', $data);
    }

    public function new(): string
    {
        $data = [
            'title'    => 'New Customer',
            'customer' => [],
            'action'   => site_url('customers/create'),
            'errors'   => [],
        ];

        return view('customers/form', $data);
    }

    public function create()
    {
        if (! $this->validate($this->rules)) {
            $data = [
                'title'    => 'New Customer',
                'customer' => $this->request->getPost(),
                'action'   => site_url('customers/create'),
                'errors'   => $this->validator->getErrors(),
            ];

            return view('customers/form', $data);
        }

        $model = new CustomerModel();
        $model->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function edit(int $id): string
    {
        $model    = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'    => 'Edit Customer',
            'customer' => $customer,
            'action'   => site_url('customers/update/' . $id),
            'errors'   => [],
        ];

        return view('customers/form', $data);
    }

    public function update(int $id)
    {
        $model    = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->rules)) {
            $data = [
                'title'    => 'Edit Customer',
                'customer' => $this->request->getPost(),
                'action'   => site_url('customers/update/' . $id),
                'errors'   => $this->validator->getErrors(),
            ];

            return view('customers/form', $data);
        }

        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to(site_url('customers'));
    }
}
