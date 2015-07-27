<?php

class Article extends Eloquent{


    protected $table = 'articles';
    public static  $columnForList=['title','username','content','created_at'];

    public function getContentAttribute($value){
       return mb_strlen($value)>8?mb_substr($value,0,8,'utf8').'...':$value;
    }

    public function user(){
        return  $this->belongsTo('User');
    }


}