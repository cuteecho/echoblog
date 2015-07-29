<div class="head">
@if(isset($longin_username))
{{$longin_username}}
@endif

<a href="{{route('login.out')}}">注销</a>
</div>