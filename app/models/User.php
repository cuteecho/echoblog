<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    public  $timestamps=false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'remember_token');
    public static $columnForList=['id','username','status','email','sex','articleNums'];
    protected function getStatusAttribute($value){
        return $value==1?'启用':'停用';
    }
    protected  function getSexAttribute($value){
        return  $value==1?'female':'male';
    }
    protected function setSexAttribute($value){
        $this->attributes['sex']=$value=='male'?0:1;
    }
    protected function setPasswordAttribute($value){
        $this->attributes['password']=password_hash($value,PASSWORD_DEFAULT);
    }
    public $columnSearchType=['username'=>'like'];
    //集体复制黑名单
    public $guarded=['email'];
    //public $orderColmns=['status desc'];

    //关系
    public function article(){
        return $this->hasMany('Article');

    }

}
