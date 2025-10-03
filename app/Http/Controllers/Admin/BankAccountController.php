<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankAccountController extends Controller
{
    /**
     * Display a listing of bank accounts
     */
    public function index()
    {
        $bankAccounts = AdminBankAccount::ordered()->paginate(20);
        
        return view('admin.bank-accounts.index', compact('bankAccounts'));
    }

    /**
     * Show the form for creating a new bank account
     */
    public function create()
    {
        return view('admin.bank-accounts.form');
    }

    /**
     * Store a newly created bank account
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'bank_logo_url' => 'nullable|url|max:500',
            'is_active' => 'sometimes|boolean',
            'sort_order' => 'sometimes|integer|min:0',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        AdminBankAccount::create([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder_name' => $request->account_holder_name,
            'bank_logo_url' => $request->bank_logo_url,
            'is_active' => $request->has('is_active') ? true : false,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.bank-accounts.index')
            ->with('success', 'Rekening berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified bank account
     */
    public function edit($id)
    {
        $bankAccount = AdminBankAccount::findOrFail($id);
        
        return view('admin.bank-accounts.form', compact('bankAccount'));
    }

    /**
     * Update the specified bank account
     */
    public function update(Request $request, $id)
    {
        $bankAccount = AdminBankAccount::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'bank_logo_url' => 'nullable|url|max:500',
            'is_active' => 'sometimes|boolean',
            'sort_order' => 'sometimes|integer|min:0',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $bankAccount->update([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder_name' => $request->account_holder_name,
            'bank_logo_url' => $request->bank_logo_url,
            'is_active' => $request->has('is_active') ? true : false,
            'sort_order' => $request->sort_order ?? $bankAccount->sort_order,
        ]);

        return redirect()
            ->route('admin.bank-accounts.index')
            ->with('success', 'Rekening berhasil diupdate');
    }

    /**
     * Remove the specified bank account
     */
    public function destroy($id)
    {
        $bankAccount = AdminBankAccount::findOrFail($id);
        $bankAccount->delete();

        return redirect()
            ->route('admin.bank-accounts.index')
            ->with('success', 'Rekening berhasil dihapus');
    }

    /**
     * Toggle active status
     */
    public function toggleActive($id)
    {
        $bankAccount = AdminBankAccount::findOrFail($id);
        $bankAccount->is_active = !$bankAccount->is_active;
        $bankAccount->save();

        return back()->with('success', 'Status rekening berhasil diupdate');
    }
}
