@extends('layouts.admin_default')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('packages/editor.md/examples/css/style.css')}}"/>--}}
    <link rel="stylesheet" href="{{URL::asset('packages/editor.md/css/editormd.css')}}"/>
@endsection
@section('content')
    <form action="{{route('article.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">

                <input type="number" class="form-control" id="inputPassword4" placeholder="目录id" name="cate_id">
            </div>
            <div class="form-group col-md-3">

                <input type="number" class="form-control" id="inputPassword4" placeholder="文章顺序" name="order">
            </div>
            <div class="form-group col-md-6">

                <input type="text" class="form-control" id="inputAddress" placeholder="文章标题" name="title">
            </div>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="inputAddress">文章内容</label>--}}
            <div id="test-editormd">
                <textarea style="display:none;" name="content" ></textarea>
            </div>
        {{--</div>--}}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
    <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/editormd.min.js')}}"></script>
    <script type="text/javascript">
        var testEditor;

        $(function () {
            testEditor = editormd("test-editormd", {
                width: "100%",
                height: 640,
                tex: true,
                syncScrolling: "single",
                path: "/packages/editor.md/lib/"
            });

            /*
            // or
            testEditor = editormd({
                id      : "test-editormd",
                width   : "90%",
                height  : 640,
                path    : "../lib/"
            });
            */
        });
    </script>

@endsection
