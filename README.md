# 添加新的方法
~~~

    public function captcha(){
        $data = \think\captcha\facade\CaptchaApi::create();
        unset($data["code"]);
        $this->result($data);
    }

        key: 用于前端提交验证
        md5: 验证码端md5值，用于前端自我验证先，验证通过再请求发送 验证码和key到后台进行验证
        code: 验证码值，方便用于postman测试和自动化测试，切记正式上线，记得返回api是进行unset() 掉该值，避免被别人利用
//验证
//        dump(CaptchaApi::check('ymfua','$2y$10$WjPyaApSd8nJaLzIkTfWV.GjKFFlP4sGZ2IFLNyKC6tYqYo4v1ECS'));
        //CaptchaApi::check($code,$key)
        //其中code为用户输入的验证码， key为上面返回到key 用于替代session， 同时使用cache作为缓冲
CaptchaApi::check($captcha,$key) //检查验证码是否正确
~~~

## 返回 

~~~
{"code":0,"msg":"","time":1665491075,"data":{"base64":"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABLCAMAAAD9JUoRAAAAdVBMVEXz+\/5tMUDhx5yWmcnfuKqetuG0yLzZwtuZmNXLxeG\/vK2tocDRyM7Ar7awlp+ffIeOY299Slfi4eartayHaW51Q0+QfH5+Vl+jeY3Lr8ezoLinjaS\/ssy+nbSVZ3qwi6CJUlqXY2fQp5x7QU2mdHW0hYLClo\/YbH1sAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAG\/UlEQVR4nO2cCZvbJhCGvT5k7wYkobRJm\/RIkzT\/\/ydWXALEjBgk0HrdfM9e9mIBLzPDgLAPh4K63W7jd8krgrpczNdbluR0+wmLJI3pJyyS3gas08n9LKXnUZkv+R\/AegaxyKdW0dojZm3SVssqBWuv2XCTKsFapweHBYF5XFiK02ktLNCuVsT3NyNJanWApz+7g6pXrCmthQU\/S2xzcQs0lxvYYJ44KxWs4aRU8II+rJsRVixN63g4qi+Chk+f264XT6M0Lc2pKK3iigj4sBjnzCuVpHVM0xoYt5CsdBX3jQmRB4urvvDp8XZY3RMgU0GGGzrffV35htWqvnT2IcENU7AEBKv1ChBotb0zx9dVELG6oC+EAL8KlvDdEId1vY5fVzuCAeFXUhjde79ZlMkw0w37ln\/6Y\/pfwg0VqfHb8O7QgntpNhMKL6SQEockLBkFRd+1NrInrsraToheW55kNf7809ojoTlVNc8avMmqVJI16Mish+FzipXhol5jYP1lzTKz4ndaK5oMa85q0K2STX02KlVb4OCouHVX+UDD+n3y4cz5sCAnJQRWjSo7UtxhFowsqGPW3xOszOmwNKy5WBwcSlXZOotZ0DCR4XY27KenELNs+zEkAlY3trykF0bicY\/QKoc8r+C0IO0yDabd0OFDzDIeYDlFdEw3uyItYPjhKgflVX2GYzAgSDdKwVPOjsSgYLUOFmSWTRPBCp+oRwsILLqyWZXMGkBPNi9v7gg0g+WlZV9UDqZqEgBp+\/LIZPlOsIApC4L13jmLWKRlc3ApOEjPWPmGNLbjfNZmwhHSDpZndRYWOMwFpWFx\/ymoyl+8Hi3Ssjm4lIivHbNy06EufP5Hm1QPklYXiELHRK9yzBJxmyJYfDj4HVqc4ExaqX5CiVbEynirMN44fFW\/OuOdfF5aXuHDvBWOXtGcVMvbXASsfQZLRis5dL9+4B+n8UflwwLiYcxqaoIetm\/fzei18YvtJaJ\/oWULSN8RUX9iQdhp8pL3zcGM6VJ5HxYw0wKzoXW4wdutELZewIibJhoEWvq7Th4saHoPZdvfjn20g7qwhvFjFjHRsg7nBa928s64uIXVzq9QD5ZRuj82DWIKln2IFvdnw\/RIKLW2725elDEUe3HTfJzDoq1C1ymCtbgkMd5h4tQQPIplQXllU4kZt3Zx\/uK8EJx6lJpGs+k4Y0wvKurBCm4eEUKj6bIwGBIm78NCEi24AiE3Br95Xo5Oh\/OtWBEOZ2F5lhW5PyDjHb\/pR8DKGxWYaMVyDufbYos2Ddzk3wGWsehlTxGBO4mpa0kR3UO4yyuX1FFh8k6sPXPVub3hwfJWMX3Xcrg+E6hNu3s6LOIs5a8iuOjN5gtuwjCr+rDmFcIm1vmtEVgfYtF2tDCHe8JGxYxuHVhQ2hzUm6rQ7PMqQjnZMmGudcWiSzrv9DPdILANA2Oct0sDnautsK7XKRdlXU7Dhl7AW5qhkGTdeScKC3liiyBY5ubd0HbBoQTsEjObL5vSAPcBpLpp+FSme0BzXeT1+Yd6G514RwrvdEprlkc5UAjBPkrxhYU3HfqNGu2yVaaegIWsFC65sCSnaOUqlXuexdvPFMUTGnTvygiCFe0qz2FdcmFpTAisrFNl9i5C31XI\/fBkXetqpB8ldpWN8s\/WL8E655lXzbMaOhW1bng8RmcDvK0MYI6FYElQJS3rkEcrzOPLinnpsCS1eFQO31V2UpxIsF6k9J+JmJUDK8zjq0lzIsEyRY9A7nsxSlanQDlaS7NhVpgP8vhqSp9WndLiEFY8imQ3tLAwhTHrnboLnbik3ashtmCl1HGmRWDcBk97+AlbglJgvbx4fogpmA31HaTkbZFdzuMdkzHrMIwrHH5wsP5VzfoelaN6YdKyfJHvTdaM8VbWt2hF9dfXHz84W3US2oSsGrDYvcHS2nJiXPlgFVgqxotNET5cE0NKu2FUdNfj9cSYNUYLgS8faUrDgpLShPZ9LwJpNiyjIBkvpP3fuHFPsDICl9TDwjq4FTGuTFiPKwqsnCj\/0LpQItbusMq+Z7GYaCu2\/Clxm+4UFk2rYBF3Gu5T0MprsTen03QSY5kV+GZffeVVtAq\/dXiNwGVqujPphqsSUbEtRvXAsJByG9wwF1b5D7xYBwtqN+SUSP\/W0XqjsMBmx7DKxqw7gKU4zXeLEp2BW02zrJ3ccO0nGqXWSNFuUao\/SKPBzeZyQTnrozRWf1bWMixNib619vKCtRjcbH6dGazap7BR7gYExbHuz1bWcOqwj1bDQnYM4zcG0ESGBSel+2i9ZYGw9J3dzCuZ6IZYIn3Ppv4nOhWNWfiZgQWZeVP\/iv9NuEFmtMPHX5WcDZsGeofOsmxGht3GS996tQphLaVe\/wH+QkPixaax\/AAAAABJRU5ErkJggg==","key":"$2y$10$NpfJbMDzDGRLIMP3X7dTUOzpnc\/A9rzlSNtmjxbaKIRt\/gI\/nXXhm","md5":"2e73f1e3a2a58eff7d0455568f75259a"}}
~~~



# 以下是保留原有方法




# think-captcha

thinkphp6 验证码类库

## 安装
> composer require topthink/think-captcha



## 使用

### 在控制器中输出验证码

在控制器的操作方法中使用

~~~
public function captcha($id = '')
{
	return captcha($id);
}
~~~
然后注册对应的路由来输出验证码


### 模板里输出验证码

首先要在你应用的路由定义文件中，注册一个验证码路由规则。

~~~
\think\facade\Route::get('captcha/[:id]', "\\think\\captcha\\CaptchaController@index");
~~~

然后就可以在模板文件中使用
~~~
<div>{:captcha_img()}</div>
~~~
或者
~~~
<div><img src="{:captcha_src()}" alt="captcha" /></div>
~~~
> 上面两种的最终效果是一样的


### 控制器里验证

使用TP的内置验证功能即可
~~~
$this->validate($data,[
    'captcha|验证码'=>'require|captcha'
]);
~~~
或者手动验证
~~~
if(!captcha_check($captcha)){
 //验证失败
};
~~~