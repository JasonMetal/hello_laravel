<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;
use Mail;

class UsersController extends Controller
{

    public function __construct()
    {

        set_time_limit(0);
        //中间件
        //除了之外 （展示 创建  登录） index 动作来允许游客访问
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail']
        ]);
    }

    public function index()
    {
//        $users = User::all();
//        分页
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        //将用户对象 $user 通过 compact 方法转化为一个关联数组，并作为第二个参数传递给 view 方法，将数据与视图进行绑定。
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:50',
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        //用户注册成功后自动登录
//        Auth::login($user);
        //如果需要获取用户输入的所有数据，可使用：
//            $data = $request->all();
        $ret = $this->sendEmailConfirmationTo($user);
//        print_r($ret);exit;
//        print_r($ret);exit;
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
//        return redirect()->route('users.show', [$user]);
    }

    public function sendEmailConfirmationTo($user)
    {
        $view    = 'emails.confirm';
        $data    = compact('user');
//        $from    = '935216773@qq.com';
//        $name    = 'Aufree';
        $to      = $user->email;
        $subject = "感谢注册 Sample 应用！请确认你的邮箱。";

//        $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
        Mail::send($view, $data, function($message) use($to, $subject) {
            $message->to($to)->subject($subject);
        });

//        $ret = Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
//            $message->from($from, $name)->to($to)->subject($subject);
//        });

    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated        = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }

//    public function destroy()
//    {
//        Auth::logout();
//        session()->flash('success', '您已成功退出！');
//        return redirect('login');
//    }

    /**
     *用户编辑资料
     *
     */
    public function edit(User $user)
    {
        //无权限运行该行为时会抛出 HttpException
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    /**用户更新资料
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        //无权限运行该行为时会抛出 HttpException
        $this->authorize('update', $user);

        $this->validate($request, [
            'name'     => 'required|max:50',
            'password' => 'required|confirmed|min:6'
        ]);

        $data         = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
//        $user->update([
//            'name'=>$request->name,
//            'password'=>bcrypt($request->password),
//        ]);
        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }


}
