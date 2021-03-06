<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('mobile.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $request['ip'] = $request->getClientIp();
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'between:4,12'],
            'phone'    => ['required', 'string', 'min:11', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'captcha'  => ['required', 'captcha'],
        ], [
            'name.required'     => '用户名不能为空',
            'phone.required'    => '手机号不能为空',
            'phone.min'         => '手机号格式不对',
            'phone.unique'      => '手机号已存在',
            'name.between'      => '用户名在4到12位之间',
            'password.required' => '密码不能为空',
            'password.between'  => '密码在6到18位之间',
            'captcha.required'  => '验证码不能为空',
            'captcha.captcha'   => '请输入正确的验证码',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'        => $data['name'],
            'phone'       => $data['phone'],
            'password'    => Hash::make($data['password']),
            'register_ip' => $data['ip'],
            'avatar'      => 'resources/images/user/'.mt_rand(1, 12).'.png',
            'api_token'   => Str::random(60),
        ]);
    }
}
