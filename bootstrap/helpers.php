<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/7
 * Time: 21:30
 */

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}