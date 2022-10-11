<?php

namespace think\captcha\facade;

use think\Facade;

class CaptchaApi extends Facade
{
    protected static function getFacadeClass()
    {
        //return \edward\captcha\CaptchaApi::class;
        return \think\captcha\CaptchaApi::class;
    }
}