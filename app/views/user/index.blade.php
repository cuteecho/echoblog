@extends('layouts.master')
@section('container')


<div>
<?php

?>
    <span><a href="{{route('user.edit')}}">add</a></span>
    <span>
        {{Form::open(array('route'=>'user.index','method'=>'post'))}}
            {{Form::text('username',isset($username)?$username:'')}}
            {{Form::submit('search')}}
        {{Form::close()}}
    </span>
    <div>
        <a href="{{route('setLocale','ch')}}">ch </a>
        <a href="{{route('setLocale','en')}}"> en</a>
    </div>

</div>

@if(count($users)>0)
<table>
<tr>
    @foreach($sColumList as $cloum)
    <th>
        {{Lang::get('user.'.$cloum)}}
    </th>

    @endforeach
       <th>
            links
        </th>
</tr>
    @foreach($users as $user)
    <tr>
        @foreach($sColumList as $cloum)

           <td> {{$user->$cloum}}</td>

        @endforeach
        <td><a href="{{route('user.edit',$user->id)}}">edit</a>
        <a href="{{route('article.index',$user->id)}}"> article</a>
        <a href="{{route('role.edit',$user->id)}}"> eidt role</a>
        </td>

    </tr>

    @endforeach
</table>
@endif
<?php echo $users->appends(array('username' => isset($username)?$username:''))->links(); ?>


@stop