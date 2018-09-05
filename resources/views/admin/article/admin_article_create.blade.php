@extends('layouts.default_admin')
@section('content')
    <form action="{{route('article.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">目录id</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="目录id" name="cate_id">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">文章顺序</label>
                <input type="number" class="form-control" id="inputPassword4" placeholder="文章顺序" name="order">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">文章标题</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="文章标题" name="title">
        </div>
        <div class="form-group">
            <label for="inputAddress">文章内容</label>
            <div id="test-editormd">
                <textarea name="content" style="display:none;"></textarea>
            </div>

            @include('markdown::encode',['editors'=>['test-editormd']])
        </div>
        <button type="submit" class="btn btn-primary">提交</button>
    </form>

@endsection
