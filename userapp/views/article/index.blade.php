@extends('layouts.master')
@section('container')
{{-- 列表--}}
<table>
    <tr>
    @foreach($sColumList as $sClolum)
        <th>
            {{Lang::get('article.'.$sClolum)}}
        </th>
    @endforeach()
        <th>
            links
        </th>
    </tr>
    @foreach($articles as $article)
    <tr>
        @foreach($sColumList as $sClolum)
        <td>
        {{$article->$sClolum}}
        </td>
        @endforeach
        <td>
        编辑
        </td>


    </tr>
    @endforeach
</table>


@stop