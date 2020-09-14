<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/'; //認証後のリダイレクト先

    protected function authenticated(Request $request)
    {
        $token = Str::random(80);

        // 認証ユーザーのapi_tokenをハッシュ化して保存
        $request->user()->forceFill([
        'api_token' => hash('sha256', $token),
        ])->save();

        $request->user()->update(['api_token' => str_random(60)]);
        
        // ハッシュ化前のapi_tokenをsessionに入れる
        session()->put('api_token', $token);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
