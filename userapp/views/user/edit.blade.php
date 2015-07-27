@extends('layouts.master')

@section('container')
<?php
if(isset($error)){
var_dump($error);
}
?>
{{Form::open(['url'=>route('user.edit',$user->id?$user->id:null),'method'=>'post'])}}
username:{{Form::text('username',$user->username)}}
password:{{Form::password('password','')}}
email:{{Form::text('email',$user->email)}}
female{{Form::radio('sex','female',$user->sex=='female'?true:'')}}
male{{Form::radio('sex','male',$user->sex=='male'?true:'')}}
status：{{Form::select('status',['0'=>'停用','1'=>'启用'])}}
{{Form::submit('submit')}}

{{Form::close()}}

@stop