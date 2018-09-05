<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{URL::asset('images/icon.ico')}}" />
    @yield('css')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; margin-bottom: 10px">
    <div class="container">
    <a href="{{route('home')}}" class="navbar-brand"><img src="{{URL::asset('images/logo.png')}}"
                                                          style="height: 30px;width: 90px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.index')}}">用户列表</a>
            </li>
            {{--{{$categories=\App\Category::all()}}--}}
            {{--父目录--}}
            @foreach($categories as $category)
                @if($category['pid']==0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$category['name']}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{--子目录--}}
                           @foreach($categories as $subcate)
                               @if($subcate['pid']==$category['id'])
                                    <a class="dropdown-item" href="{{route('category.show',$subcate)}}">{{$subcate['name']}}</a>
                                @endif
                               @endforeach
                        </div>
                    </li>
                    @endif
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">{{$category['name']}}</a>--}}
                {{--</li>--}}
            @endforeach
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">注销</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.edit',auth()->user())}}">修改</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">个人中心</a>
                </li>
                @can('admin',auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_home')}}">后台</a>
                    </li>
                @endcan
            @else
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{route('login')}}">登录</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{route('user.create')}}">注册</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#registerModal"
                            style='color: #222222;'>
                        注册
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">注册</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('user.store')}}" method="post">
                                        @csrf

                                        <div class="card" style="width: 18rem; margin: 0 auto;">
                                            <div class="card-header">
                                                用户注册
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">昵称</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">邮箱</label>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">密码</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">确认密码</label>
                                                    <input type="password" class="form-control"
                                                           name="password_confirmation">
                                                </div>


                                            </div>
                                            <div class="card-footer text-muted">
                                                <button type="submit" class="btn btn-success">注册</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#loginModal"
                            style='color: #222222;'>
                        登录
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">登录</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('login')}}" method="post">
                                        @csrf

                                        <div class="card">
                                            <div class="card-header">
                                                用户登录
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="">邮箱</label>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">密码</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted">
                                                <button type="submit" class="btn btn-success">登录</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            @endauth

        </ul>
    </div>
    </div>
</nav>
<div class="container">
    @include('layouts._errors')
    @include('layouts._message')
    @yield('content')
</div>

<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
@yield('js')
</body>
</html>