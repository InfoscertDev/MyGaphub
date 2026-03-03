<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\AccountDeletion;

class UsersManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::with(['profile', 'accountDeletion']);

        // Handle deleted users filter
        if ($request->status === 'deleted') {
            $query->onlyTrashed();
        } elseif ($request->status === 'active') {
            // Only non-deleted users (default behavior)
        } else {
            // Include both active and deleted users
            $query->withTrashed();
        }

        // Handle verification filter
        if ($request->verification === 'verified') {
            $query->whereNotNull('email_verified_at');
        } elseif ($request->verification === 'unverified') {
            $query->whereNull('email_verified_at');
        }

        // Handle search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                  ->orWhere('surname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Handle sorting
        $sortField = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');

        $allowedSortFields = ['firstname', 'surname', 'email', 'created_at', 'email_verified_at'];
        if (in_array($sortField, $allowedSortFields)) {
            $query->orderBy($sortField, $sortOrder);
        } else {
            $query->latest();
        }

        $users = $query->paginate(20);

        return view('admin.people.users', compact('users'));
    }

    public function show($id)
    {
        $user = User::withTrashed()->with(['profile', 'accountDeletion'])->findOrFail($id);
        return view('admin.people.user-detail', compact('user'));
    }

    public function restore($id)
    {
        try {
            $user = User::withTrashed()->findOrFail($id);
            $user->restore();

            // Optionally, you can keep the deletion record for audit purposes
            // or delete it if you prefer
            // $user->accountDeletion()->delete();

            return redirect()->back()->with(['success' => "User restored successfully"]);

        } catch (\Exception $e) {

            return redirect()->back()->with(['success' =>  'Error restoring user: ' . $e->getMessage() ]);
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Error restoring user: ' . $e->getMessage()
            // ], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            // Create account deletion record with admin reason
            AccountDeletion::create([
                'user_id' => $user->id,
                'reason'  => 'Account deleted by administrator',
                'deleted_by_admin' => true // Add this field to track admin deletions
            ]);

            $user->delete(); // Soft delete

            return response()->json([
                'status' => true,
                'message' => 'User deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error deleting user: ' . $e->getMessage()
            ], 500);
        }
    }
}