<?php

namespace App\Library\Admin;

use App\Models\Employee;

class Auth
{
    public function fetchDataByLogin($account, $password)
    {
        $employee = Employee::where('account', $account)
            ->where('password', $password)
            ->get()
            ->toArray();

        if (empty($employee)) {
            throw new \Exception('帳號或密碼輸入錯誤！ #001');
        }

        unset($employee['password']);
        return $employee;
    }
}
