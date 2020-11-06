<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        $info = $request->only(['username', 'password']);

        if (!$token = auth()->attempt($info)) {
            return response()->error(["Tên đăng nhập hoặc mật khẩu bạn nhập không chính xác."]);
        }

        return response()->success(["token" => $token], ["Đăng nhập thành công."]);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Đăng xuất thành công'
        ]);
    }
}
