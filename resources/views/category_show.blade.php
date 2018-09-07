@extends('layouts.default')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('packages/editor.md/examples/css/style.css')}}"/>--}}
    <link rel="stylesheet" href="{{URL::asset('packages/editor.md/css/editormd.preview.css')}}"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">

            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active">
                    {{$category['name']}}
                </a>
                @if(count($articles)>0)
                    @foreach($articles as $article)
                        <a href="{{route('article.show',$article)}}" class="list-group-item list-group-item-action"
                           style="padding: 0.2rem 0.3rem;">{{$article['title']}}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-10">
            <div id="layout">
                <div id="test-editormd-view2">
                <textarea id="append-test" style="display:none;">
                    {{$articleForUser['content']}}
                </textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{URL::asset('packages/editor.md/examples/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/lib/marked.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/lib/prettify.min.js')}}"></script>

    <script src="{{URL::asset('packages/editor.md/lib/raphael.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/lib/underscore.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/lib/sequence-diagram.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/lib/flowchart.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/lib/jquery.flowchart.min.js')}}"></script>
    <script src="{{URL::asset('packages/editor.md/editormd.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            var testEditormdView, testEditormdView2;

            $.get("test.md", function (markdown) {

                // testEditormdView = editormd.markdownToHTML("test-editormd-view", {
                //     markdown: markdown,//+ "\r\n" + $("#append-test").text(),
                //     //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                //     htmlDecode: "style,script,iframe",  // you can filter tags decode
                //     //toc             : false,
                //     tocm: true,    // Using [TOCM]
                //     //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                //     //gfm             : false,
                //     //tocDropdown     : true,
                //     // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                //     emoji: true,
                //     taskList: true,
                //     tex: true,  // 默认不解析
                //     flowChart: true,  // 默认不解析
                //     sequenceDiagram: true,  // 默认不解析
                // });

                //console.log("返回一个 jQuery 实例 =>", testEditormdView);

                // 获取Markdown源码
                //console.log(testEditormdView.getMarkdown());

                //alert(testEditormdView.getMarkdown());
            });

            testEditormdView2 = editormd.markdownToHTML("test-editormd-view2", {
                htmlDecode: "style,script,iframe",  // you can filter tags decode
                emoji: true,
                taskList: true,
                tex: true,  // 默认不解析
                flowChart: true,  // 默认不解析
                sequenceDiagram: true,  // 默认不解析
            });
        });
    </script>
@endsection