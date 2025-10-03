<?php

namespace App\Http\Controllers;

use App\Models\UserBankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BankAccountController extends Controller
{
    /**
     * Get all bank accounts for the authenticated user
     */
    public function index()
    {
        $bankAccounts = Auth::user()->bankAccounts()->orderBy('is_primary', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'data' => $bankAccounts
        ]);
    }

    /**
     * Store a new bank account
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'is_primary' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();

        // If this is set as primary, unset other primary accounts
        if ($request->input('is_primary', false)) {
            $user->bankAccounts()->update(['is_primary' => false]);
        }

        // Create new bank account
        $bankAccount = $user->bankAccounts()->create([
            'provider' => $request->provider,
            'account_number' => $request->account_number,
            'account_holder_name' => $request->account_holder_name,
            'is_primary' => $request->input('is_primary', false),
            'is_active' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Bank account added successfully',
            'data' => $bankAccount
        ], 201);
    }

    /**
     * Update a bank account
     */
    public function update(Request $request, $id)
    {
        $bankAccount = UserBankAccount::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $validator = Validator::make($request->all(), [
            'provider' => 'sometimes|string|max:255',
            'account_number' => 'sometimes|string|max:255',
            'account_holder_name' => 'sometimes|string|max:255',
            'is_primary' => 'sometimes|boolean',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // If setting as primary, unset other primary accounts
        if ($request->has('is_primary') && $request->is_primary) {
            Auth::user()->bankAccounts()->where('id', '!=', $id)->update(['is_primary' => false]);
        }

        $bankAccount->update($request->only([
            'provider',
            'account_number',
            'account_holder_name',
            'is_primary',
            'is_active'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Bank account updated successfully',
            'data' => $bankAccount
        ]);
    }

    /**
     * Delete a bank account
     */
    public function destroy($id)
    {
        $bankAccount = UserBankAccount::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $bankAccount->delete();

        return response()->json([
            'success' => true,
            'message' => 'Bank account deleted successfully'
        ]);
    }

    /**
     * Set a bank account as primary
     */
    public function setPrimary($id)
    {
        $bankAccount = UserBankAccount::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        // Unset all primary accounts
        Auth::user()->bankAccounts()->update(['is_primary' => false]);

        // Set this account as primary
        $bankAccount->update(['is_primary' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Primary bank account updated successfully',
            'data' => $bankAccount
        ]);
    }
}
