<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Database\Query\JoinClause;

class UserService extends BaseService
{
    /**
     * [Description for getAllUser]
     *
     * @return array
     *
     */
    public function getAllUser(): array
    {
        try {
            $data = User::join('departments', function (JoinClause $join) {
                $join->on('users.department_id', 'departments.id');
            })
            ->join('users_status', function (JoinClause $join) {
                $join->on('users.status_id', 'users_status.id');
            })
            ->select(
                'users.*',
                'departments.name as department_name',
                'users_status.name as status_name',
            )
            ->paginate(5);

            return $data->toArray();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
