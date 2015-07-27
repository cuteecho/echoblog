<?php
/**
 * Created by PhpStorm.
 * User: ubuntu-anvo
 * Date: 15-2-11
 * Time: 上午9:33
 */
class LoginController extends Controller{
    public function login(){

        if (Auth::check())
        {
            echo "已经登陆";
        }else if(Request::method() == 'POST'){
            $username=Input::get('username');
            $password=password_hash(Input::get('password'),PASSWORD_DEFAULT);
            $user=User::where(array('username'=>'admin','password'=>$password))->get();
            print_r($user);

            if ($user && Auth::attempt(array('username' => $username, 'password' => $password )))
            {
                echo "登陆成功";
            }else{
                echo '登陆失败';
            }
        }else{
            $this->layout = View::make('layouts.login');
        }
    }
    public function Logout(){
        if(Auth::check()){
            if(Auth::logout()){
                Redirect::Route('user.index');
            }
        }
    }


}