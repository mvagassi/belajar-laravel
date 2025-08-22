<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Helpers\DataTableHelper;
use Illuminate\Database\Eloquent\Builder;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $columns = $request->input('columns');
        $columnMap = [
            'fullname' => 'admins.fullname',
            'email' => 'admins.email',
            'username' => 'admins.username',
            'status_name' => 'case when admins.status = 1 then "Active" else "Inactive" end',
            'role' => 'roles.name',
        ];

        $query = Admin::query()
            ->join('roles', 'roles.id', '=', 'admins.role_id')
            ->selectRaw('admins.*, roles.name as role_name, case when status = 1 then "Active" else "Inactive" end as status_name');

        $response = DataTableHelper::fromQuery($query, $request, $columns, $columnMap, 'admins.created_at');

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
