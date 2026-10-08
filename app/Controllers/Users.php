<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();
        $users = $userModel->orderBy('id', 'ASC')->findAll();

        return view('users/index', [
            'title' => 'User Accounts',
            'activePage' => 'users',
            'users' => $users,
        ]);
    }

    public function new(): string
    {
        return $this->formPage();
    }

    public function create()
    {
        if (! $this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new UserModel())->insert([
            'username'   => trim((string) $this->request->getPost('username')),
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))->with('success', 'User added successfully.');
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $this->formPage($user);
    }

    public function update(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->rules($id))) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];

        $uploadError = $this->saveAvatar($data);
        if ($uploadError !== null) {
            return redirect()->back()->withInput()->with('errors', ['avatar' => $uploadError]);
        }

        $userModel->update($id, $data);

        return redirect()->to(site_url('users'))->with('success', 'User updated successfully.');
    }

    private function formPage(?array $user = null): string
    {
        return view('users/form', [
            'title'      => $user === null ? 'Add User' : 'Edit User',
            'activePage' => 'users',
            'user'       => $user,
            'errors'     => session('errors') ?? [],
        ]);
    }

    private function rules(?int $id = null): array
    {
        $usernameRule = 'required|max_length[50]|is_unique[users.username]';
        if ($id !== null) {
            $usernameRule = 'required|max_length[50]|is_unique[users.username,id,' . $id . ']';
        }

        return [
            'username'  => $usernameRule,
            'full_name' => 'required|max_length[100]',
        ];
    }

    private function saveAvatar(array &$data): ?string
    {
        $file = $this->request->getFile('avatar');
        if ($file === null || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if (! $file->isValid()) {
            return 'The avatar upload could not be processed.';
        }

        if (! in_array($file->getMimeType(), ['image/jpeg', 'image/png'], true)) {
            return 'Avatar must be a JPG or PNG image.';
        }

        if ($file->getSizeByUnit('kb') > 2048) {
            return 'Avatar must be 2 MB or smaller.';
        }

        $directory = FCPATH . 'uploads/avatars';
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = $file->getRandomName();
        service('image')
            ->withFile($file)
            ->fit(200, 200, 'center')
            ->save($directory . '/' . $filename, 85);

        $data['avatar'] = $filename;

        return null;
    }
}
