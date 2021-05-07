<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 这里直接用Auth而没有带命名空间，是因为在config/app.php里面定义了别名
// 'Auth' => Illuminate\Support\Facades\Auth::class,
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);

        $this->middleware('throttle:10,10', [
           'only' => ['store']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials, $request->has('remember'))) {
            if(Auth::user()->activated){
                session()->flash('success', '欢迎回来！');
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback);
            } else {
                Auth::logout();
                session()->flash('warning', '你的账号未激活，请检查邮箱中的注册邮件进行激活');
                return redirect('/');
            }
        } else {
            // 登录失败
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');

            /*
             * 我们在 store 方法内使用了 Laravel 提供的 Auth::user() 方法来获取 当前登录用户 的信息，
             * 并将数据传送给路由。
             * 这时如果尝试输入错误密码则会显示登录失败的提示信息。
             * 使用 withInput() 后模板里 old('email') 将能获取到上一次用户提交的内容
             * 这样用户就无需再次输入邮箱等内容
             *
             */
            return redirect()->back()->withInput();
        }
    }

    /**
     * @return
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
