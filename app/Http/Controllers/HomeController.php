<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
       
        dd(domain_list_create('luzhou123.net'));// DNSPod 添加域名

        //dd(domain_list_record());// DNSPod 域名列表
        // dd(domain_list_renew(['youxiaoxiao.top']));// 批量域名续费
        // dd(domain_list_user());// 我的域名列表
        // dd(domain_list_price());// 域名价格列表

        
    }

}
