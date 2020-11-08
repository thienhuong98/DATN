<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use  App\Http\Requests\LoginRequest;
use  Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(LoginRequest $request)
    {
        $input = $request->only('email', 'password');
        $token = null;
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Email hoặc mật khẩu không chính xác',
            ], 401);
        }
        //$user = Auth::user();
        return response()->json([
            'status' => true,
            'token' => $token,
            //'user' => new UserResource($user),
        ]);
    }
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'status' => true,
                'message' => 'Bạn đã đăng xuất thành công'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Xin lỗi bạn không thể đăng xuất'
            ], 500);
        }
    }
//    protected $redirectTo = '/home';
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
//
//    /**
//     * @param LoginRequest $request
//     * @return mixed
//     */
//    public function login(LoginRequest $request)
//    {
//        $info = $request->only('username', 'password');
//        if (Auth::attempt($info)) {
//            return response()->json([
//                new UserResource($info),
//                'message' => 'Đăng nhập thành công!!'
//            ],200);
//        }
//        return response()->json([
//            'message' => 'Tên đăng nhập hoặc mật khẩu không chính xác'
//        ],400);
//    }
//    public function logout(Request $request)
//    {
//        $request->user()->token()->revoke();
//        return response()->json([
//            'message' => 'Đăng xuất thành công'
//        ]);
//    }
}
