<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $start = intval($request->input('start'));
        $length = intval($request->input('length'));

        $page = intval($start / $length) + 1;

        $orderColumnIndex = $request->input('order.0.column');
        $requestedColumn = $columns[$orderColumnIndex]['data'] ?? null;
        $columns = $request->input('columns');
        $columnMap = [
            'fullname' => 'admins.fullname',
            'email' => 'admins.email',
            'username' => 'admins.username',
            'status_name' => 'status_name',
            'role' => 'roles.name',
        ];

        // fallback ke created_at kalau tidak ada di mapping
        $orderColumn = $requestedColumn && isset($columnMap[$requestedColumn])
            ? $columnMap[$requestedColumn]
            : 'admins.created_at';
        // $orderColumn = $columns[$orderColumnIndex]['data'] ?? 'created_at';
        $orderDirection = $request->input('order.0.dir');

        if (empty($orderDirection)) {
            $orderDirection = 'desc';
        }

        $data = Admin::query()
            ->join('roles', 'roles.id', '=', 'admins.role_id')
            ->when($request->input('search.value'), function (Builder $query, $search) {
                $query->where('fullname', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhereRaw('case when admins.status = 1 then "Active" else "Inactive" end like ?', ["%$search%"])
                    ->orWhere('roles.name', 'like', '%' . $search . '%');
            })
            ->selectRaw('admins.*, roles.name as role_name, case when status = 1 then "Active" else "Inactive" end as status_name')
            ->orderBy($orderColumn, $orderDirection)
            ->paginate($length, ['*, case when status = 1 then "Active" else "Inactive" end as status_name'], 'page', $page);

        return response()->json([
            'recordsTotal' => $data->total(),
            'recordsFiltered' => $data->total(),
            'data' => $data->items()
        ]);
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
