<?php

class BaseController extends Controller
{


    /**
     * 初始化
     */
    public function __construct()
    {
        //语言
        $this->initLanguage();
        //检查登陆
        $this->checkLogin();
        //权限验证
        //
        self::initModel();
    }

    /**
     * 初始化语言
     */
    protected function initLanguage()
    {
        if (Session::has('locale')) {
            App::SetLocale(Session::get('locale'));
        } else {
            App::SetLocale('ch');
        }
    }

    protected function checkLogin()
    {
        if (Auth::check()) {
            $this->viewVars['longin_username'] = Auth::User()->username;
        } else {
//            echo 23;
            echo Redirect::route('login.login');
            exit;
        }
    }

    //初始化当前Model

    private function initModel()
    {
        $this->_model = App::make($this->_modelName);
        $_model = $this->_modelName;
        $sColumList = $_model::$columnForList;
        $this->viewVars['sColumList'] = $sColumList;

    }

    /**
     * 选择语言版本
     */
    public function setLocale($type)
    {
        if (in_array($type, Config::get('config.allowLocale'))) {
            Session::put('locale', $type);
            echo Redirect::back();
        }
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}
