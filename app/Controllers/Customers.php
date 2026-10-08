<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();
        $customers = $customerModel->orderBy('id', 'ASC')->findAll();

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'activePage' => 'customers',
            'customers' => $customers,
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

        (new CustomerModel())->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer added successfully.');
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $this->formPage($customer);
    }

    public function update(int $id)
    {
        $customerModel = new CustomerModel();

        if ($customerModel->find($id) === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer updated successfully.');
    }

    private function formPage(?array $customer = null): string
    {
        return view('customers/form', [
            'title'      => $customer === null ? 'Add Customer' : 'Edit Customer',
            'activePage' => 'customers',
            'customer'   => $customer,
            'errors'     => session('errors') ?? [],
        ]);
    }

    private function rules(): array
    {
        return [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[25]',
        ];
    }
}
