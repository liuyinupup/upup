@extends('layouts.admin_default')
@section('nav')
    <h1>文章管理</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            文章列表
            <a href="{{route('article.create')}}">添加文章</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>目录编号</th>
                    <th>排序</th>
                    <th>文章标题</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td scope="row">{{$article['id']}}</td>
                        <td>{{$article['cate_id']}}</td>
                        <td>{{$article['order']}}</td>
                        <td>{{$article['title']}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn ">删除</button>
                                </form>
                                <a href="" class="btn ">修改</a>
                                <a href="{{route('article.show',$article)}}" class="btn btn-success">查看</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$articles->links()}}
        </div>
    </div>
@endsection