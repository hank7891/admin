<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Admin\Auth;

class IndexController extends Controller
{
    /**
     * 後台首頁
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin/index');
    }

    /**
     * 登入
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('admin/login');
    }

    /**
     * 執行登入
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginDo(Request $request, Auth $auth)
    {
        try {
            $account  = $request->account;
            $password = $request->password;

            if (trim($account) == '' || trim($password) == '') {
                throw new \Exception('請輸入帳號及密碼！ #001');
            }

            $employee = $auth->fetchDataByLogin($account, $password);
            session(['admin_auth_session' => $employee]);

            return redirect('admin/');
        } catch (\Exception $e) {

            return redirect('admin/login');
        }

    }

    /**
     * 執行登出
     */
    public function logout()
    {
        session()->forget('admin_auth_session');
        return redirect('admin/login');
    }
}
