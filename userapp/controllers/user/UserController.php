<?php

class UserController extends BaseController
{

    protected $_modelName = 'User';


    public function index()
    {


//        echo "<pre>";
//        var_dump(get_class_methods('Input'));exit;
        $params = Input::except(['_token', 'page']);
        $sCondition = [];
        foreach ($params as $key => $value) {
            if (!empty($value)) {
                $sCondition[$key] = $value;
            }
        }

        eval('$users=$this->_model->where($sCondition)->paginate(5);');
        foreach ($users as &$value) {
            $value->articleNums = User::find($value->id)->article()->count();
        }

//        $this->_model->find(1)->Article()->update(['title'=>'wer']);exit;

        $this->viewVars['users'] = $users;

        $this->layout = View::make('user.index')->with(Input::all())->with($this->viewVars);
//        var_dump( $this->layout );exit;
    }

    /**添加编辑
     * @param null $id
     */
    public function edit($id = null)
    {
        if (Request::method() == 'POST') {
            if ($id) {
                $user = $this->_model->where('id', $id)->first();
            } else {
                $user = $this->_model;
            }

            $user->username = Input::has('username') ? Input::get('username') : '';
            $user->password = Input::has('password') ? Input::get('password') : '';
            $user->email = Input::has('email') ? Input::get('email') : '';
            $user->status = Input::has('status') ? Input::get('status') : '';
            $user->sex = Input::has('sex') ? Input::get('sex') : '';

            $validator = Validator::make(
                array(
                    'username' => $user->username,
                    'email' => $user->email,
                    'status' => $user->status
                ),
                array(
                    'username' => 'required|max:15|alpha_dash',
                    'email' => 'email|max:15',
                    'status' => 'required|max:5'
                )
            );

            if ($validator->fails()) {
                $messages = $validator->messages();
//                return Redirect::back()->withError($messages);
                echo $messages->first();
                exit;
            }

            if ($user->save()) {
//echo $user->id;exit;
                Cache::setDefaultDriver(Cache::getDefaultDriver());
                Cache::put($user->id,$user->getAttributes(),5);
                return Redirect::route('user.index');
            } else {
                return Redirect::back();
            }
            exit;
        }
        if ($id) {


            Cache::setDefaultDriver(  Cache::getDefaultDriver());
//            $obj = $obj->newFromBuilder(array('id'=>4,'username'=>'yy'));
            if($aAttributes=Cache::get($id)) {
                var_dump($aAttributes);echo "缓存";

//                Cache::forget($id);
                $user = $this->_model;
                $user = $user->newFromBuilder($aAttributes);
            }else{
                $user = $this->_model->where('id', $id)->first();
//                var_dump($user->getAttributes());exit;

                Cache::put($id,$user->getAttributes(),60);
                echo "读取";
            }

        } else {
            $user = $this->_model;
        }

        $this->viewVars['user'] = $user;
        $this->layout = View::make('user.edit')->with($this->viewVars);
    }



}