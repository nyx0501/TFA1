<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private array $roles = ['Administrator', 'Cashier', 'Inventory Manager'];

    private function rules(?int $id = null): array
    {
        $unique = $id === null ? 'is_unique[users.username]' : 'is_unique[users.username,id,' . $id . ']';

        return [
            'username'  => 'required|max_length[50]|' . $unique,
            'full_name' => 'required|max_length[100]',
            'role'      => 'required|in_list[' . implode(',', $this->roles) . ']',
        ];
    }

    private function avatarRules(): array
    {
        return [
            'avatar' => 'is_image[avatar]'
                . '|mime_in[avatar,image/jpg,image/jpeg,image/png]'
                . '|ext_in[avatar,jpg,jpeg,png]'
                . '|max_size[avatar,2048]',
        ];
    }

    private function avatarDir(): string
    {
        $dir = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR;

        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        return $dir;
    }

    public function index(): string
    {
        $model = new UserModel();

        $data = [
            'title' => 'User Accounts',
            'users' => $model->orderBy('id', 'ASC')->findAll(),
        ];

        return view('users/index', $data);
    }

    public function new(): string
    {
        $data = [
            'title'  => 'New User',
            'user'   => [],
            'roles'  => $this->roles,
            'action' => site_url('users/create'),
            'errors' => [],
            'isEdit' => false,
        ];

        return view('users/form', $data);
    }

    public function create()
    {
        if (! $this->validate($this->rules())) {
            $data = [
                'title'  => 'New User',
                'user'   => $this->request->getPost(),
                'roles'  => $this->roles,
                'action' => site_url('users/create'),
                'errors' => $this->validator->getErrors(),
                'isEdit' => false,
            ];

            return view('users/form', $data);
        }

        $model = new UserModel();
        $model->insert([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'role'      => $this->request->getPost('role'),
        ]);

        return redirect()->to(site_url('users'));
    }

    public function edit(int $id): string
    {
        $model = new UserModel();
        $user  = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'  => 'Edit User',
            'user'   => $user,
            'roles'  => $this->roles,
            'action' => site_url('users/update/' . $id),
            'errors' => [],
            'isEdit' => true,
        ];

        return view('users/form', $data);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user  = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $file    = $this->request->getFile('avatar');
        $hasFile = $file !== null && $file->getError() !== UPLOAD_ERR_NO_FILE;

        $rules = $this->rules($id);

        if ($hasFile) {
            $rules += $this->avatarRules();
        }

        if (! $this->validate($rules)) {
            $data = [
                'title'  => 'Edit User',
                'user'   => array_merge($user, $this->request->getPost()),
                'roles'  => $this->roles,
                'action' => site_url('users/update/' . $id),
                'errors' => $this->validator->getErrors(),
                'isEdit' => true,
            ];

            return view('users/form', $data);
        }

        $values = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'role'      => $this->request->getPost('role'),
        ];

        if ($hasFile && $file->isValid()) {
            $dir  = $this->avatarDir();
            $name = $file->getRandomName();

            service('image')
                ->withFile($file->getTempName())
                ->fit(150, 150, 'center')
                ->save($dir . $name);

            if (! empty($user['avatar']) && is_file($dir . basename($user['avatar']))) {
                unlink($dir . basename($user['avatar']));
            }

            $values['avatar'] = $name;
        }

        $model->update($id, $values);

        return redirect()->to(site_url('users'));
    }
}
