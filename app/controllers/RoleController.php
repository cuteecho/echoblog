<?php
class RoleController extends BaseController{


    protected $_modelName='Role';
    public  function edit($id){
//        $admin = new Role;
//        $admin->name = 'Admins';
//        $admin->save();
//        exit;

        $user=new User;
        $owner = new Role;
//        $user=$user->find('1');
//        $roles=$owner->find('1');
//        $user->attachRole( $roles );

        $managePost = new Permission;
//        $managePosts->name = Route::currentRouteAction();
//        $managePosts->display_name = Route::currentRouteAction();
//        $managePosts->save();
//        $p=$managePosts->all()->toArray();

        $users=$user->find('1')->first();
//        var_dump($users);exit;
        $managePosts=$managePost->find('1')->first();
//        var_dump($managePosts->toArray());exit;
//        echo $managePosts->id;exit;
        $users->perms()->sync(array($managePosts->id));

//        $users=$user->find('1');
//        var_dump($users->hasRole("Admin"));exit;
//        if($users->hasRole("Admin")){
//            echo 213;
//        }


//        var_dump($p);
        exit;
        $this->layout = View::make('role.edit')->with(Input::all())->with($this->viewVars);

    }

}