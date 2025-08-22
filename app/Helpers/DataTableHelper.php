<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class DataTableHelper
{
    /**
     * Generate DataTables response from query
     */
    public static function fromQuery(Builder $query, $request, $columns, $columnMap, $defaultOrder = 'created_at')
    {
        $start = intval($request->input('start', 0));
        $length = intval($request->input('length', 10));
        $page = intval($start / $length) + 1;

        // Order
        $orderColumnIndex = $request->input('order.0.column');
        $requestedColumn = $columns[$orderColumnIndex]['data'] ?? null;
        $orderColumn = $requestedColumn && isset($columnMap[$requestedColumn])
            ? $columnMap[$requestedColumn]
            : $defaultOrder;

        $orderDirection = $request->input('order.0.dir', 'desc');

        // Search
        $search = $request->input('search.value');
        if ($search) {
            $query->where(function (Builder $q) use ($search, $columnMap) {
                foreach ($columnMap as $col) {
                    // kalau ada raw (misal case when status)
                    if (str_contains($col, 'case ')) {
                        $q->orWhereRaw("$col like ?", ["%$search%"]);
                    } else {
                        $q->orWhere($col, 'like', "%$search%");
                    }
                }
            });
        }

        // Ordering + Pagination
        $data = $query
            ->orderBy($orderColumn, $orderDirection)
            ->paginate($length, ['*'], 'page', $page);

        return [
            'recordsTotal' => $data->total(),
            'recordsFiltered' => $data->total(),
            'data' => $data->items(),
        ];
    }
}
