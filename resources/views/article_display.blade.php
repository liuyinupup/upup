@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-2" style="background-color:lavender;">{{$subcate['name']}}</div>
        <div class="col-md-10" style="background-color:lavenderblush;">文章内容</div>
    </div>
@endsection