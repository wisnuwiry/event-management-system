<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;

class BankSettingController extends Controller
{
    public function index(Request $request)
    {
        // Capture search keyword   
        $search = $request->input('search');

        $banks = BankAccount::when($search, function ($query, $search) {
            $query->where('account_holder', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'asc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.settings.bank.index', compact('banks', 'search'));
    }

    public function create()
    {
        return view('admin.settings.bank.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'bank_name' => 'required|string|max:255',
                'account_number' => 'required|numeric',
                'account_holder' => 'required|string|max:255',
            ]);

            BankAccount::create($request->all());

            return redirect()->route('admin.settings.bank.index')->with('success', 'Bank Account created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
            ->withInput()
            ->with('error', 'Failed to create bank account');
        }
    }

    public function edit($id)
    {
        $bank = BankAccount::findOrFail($id);
        return view('admin.settings.bank.edit', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'bank_name' => 'required|string|max:255',
                'account_number' => 'required|numeric',
                'account_holder' => 'required|string|max:255',
            ]);

            $bank = BankAccount::findOrFail($id);

            $bank->update($request->all());

            return redirect()->route('admin.settings.bank.index')->with('success', 'Bank Account updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
            ->withInput()
            ->with('error', 'Failed to update bank account');
        }
    }

    public function destroy($id)
    {
        try {
            $bank = BankAccount::findOrFail($id);
            $bank->delete();

            return redirect()->route('admin.settings.bank.index')->with('success', 'Bank Account deleted successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete bank account');
        }
    }
}
