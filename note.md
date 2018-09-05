1.修改MySQL密码  
`UPDATE mysql.user SET authentication_string=password('admin886') WHERE user='root';  
flush privileges`;  
 

3.composer使用国内镜像    
`composer config -g repo.packagist composer https://packagist.phpcomposer.com`    
    

5.composer直接安装laravel    
`composer create-project --prefer-dist laravel/laravel blog`    
`composer create-project laravel/laravel=5.3 blog --prefer-dist`  

6.HeidiSQL创建数据库,名称blog，字符集utf8_general_ci  

7.项目链接数据库：.env文件修改DB_DATABASE=blog,DB_USERNAME, PASSWORD,PHPStorm 打开Database  

8.Laravel 代码提示   
Tools->Command Line Tool Support 添加 Tool based on Symfony Console  project  artisan path to script   
`composer require barryvdh/laravel-ide-helper`  
在config\app.php 文件providers添加  
`Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,`  
在app/Providers/AppServiceProvider.php注册  
```
public function register()
{
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
    // ...
}
```
生成代码跟踪支持  
`php artisan ide-helper:generate`  


9.npm 使用淘宝镜像     
`npm install -g cnpm --registry=https://registry.npm.taobao.org`    

10.删除node_modules  
```
npm install rimraf -g  
rimraf node_modules
```

11.安装语言包    
`composer require caouecs/laravel-lang:~3.0`  

12.markdown有些网站可以写数学公式，如码云，但GitHub、简书不行，chrome也不支持HTML的mathml  

13.wamp修改数据库字段  
在AppServiceProvider.php文件里的boot方法设置  
```
public function boot(){
\Schema::defaultStringLength(191);
}
```

14.创建虚拟主机，目录要建在public  

15.routes/web.php 指向控制器，控制器指向view  
`artisan make:controller IndexController`  
`Route::get('/','IndexController@home);`   
```
class IndexController extends Controller
{
    public function home(){
        return view('welcome');
    }
}
```  

16.更改shell: Tools->Terminal->Shell path:C:\Windows\System32\WindowsPowerShell\v1.0\powershell.exe


引入资源文件
```
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
```

timezone='Asia/Shanghai' 或 PRC

从.env.example复制.env 并生成app key :  php artisan key:generate

terminal  Alt+F12  
Command Line Tools Console:Ctrl+Shift+x

创建模型并建对应的迁移表 php artisan make:model User -m

创建模型工厂 php artisan make:factory BlogFactory --model=Blog

创建对应模型的资源路由器 php artisan make:controller BlogController --resource --model=Blog

创建seeder php artisan make:seeder UserTableSeeder

if pid=0    if pid=id
$categorys = $this->orderBy(cate_order','asc')

策略类 php artisan make:policy PostPolicy --model=Post

使用markdown 编辑器    插入公式使用MathJax引擎 <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=default"></script>