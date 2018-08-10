<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //确认订单
    public function sure() {
    	return view('home.order.sure');
    }

    //生成订单
    public function make() {

    }

    //发起支付页面
    public function pay() {

    }

    //微信支付页面
    public function wxpay() {

    }

    //更改订单状态
    public function change() {
    	
    }
}
