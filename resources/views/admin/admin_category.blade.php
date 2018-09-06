@extends('layouts.admin_default')
@section('nav')
    <h1>目录管理</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            目录列表
            <a href="#">添加目录</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>父目录编号</th>
                    <th>排序</th>
                    <th>分类名称</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td scope="row">{{$category['id']}}</td>
                        <td>{{$category['pid']}}</td>
                        <td>{{$category['order']}}</td>
                        <td>{{$category['name']}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn ">删除</button>
                                </form>
                                <a href="" class="btn ">修改</a>
                                <a href="" class="btn ">查看</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$categories->links()}}
        </div>
    </div>
@endsection