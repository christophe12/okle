<?php

namespace App\Http\Controllers;

use Log;
use EasyWeChat\Payment\Merchant;
use EasyWeChat\Payment\LuckyMoney\LuckyMoney;
use EasyWeChat\Auth;


class WechatController extends Controller
{


  public function serve()
  {
    Log::info('request arrived.');

    $wechat = app('wechat');
    $wechat->server->setMessageHandler(function($message){
      return "欢迎关注ok-le.cn";
    });

    Log::info('return response.');

    return $wechat->server->serve();
  }
  public function test(){

    $attributes = [
      'app_id'=>env('WECHAT_APPID', 'your-app-id'),
      'merchant_id'=>env('WECHAT_PAYMENT_MERCHANT_ID', 'your-mch-id'),
      'key'=>env('WECHAT_PAYMENT_KEY', 'your-mch-key'),
      'cert_path'=>env('WECHAT_PAYMENT_CERT_PATH', 'your-cert-path'),
      'key_path'=>env('WECHAT_PAYMENT_KEY_PATH', 'your-key-path'),
    ];


    $business = new Merchant($attributes);
    $business->setClientCert(env('WECHAT_PAYMENT_CERT_PATH', 'your-cert-path'));
    $business->setClientKey(env('WECHAT_PAYMENT_KEY_PATH', 'your-key-path'));
    $luckMoneyServer = new LuckyMoney($business);

    $luckMoneyData['mch_billno'] = time();  //红包记录对应的商户订单号
    $luckMoneyData['send_name'] = '某某公司';  //红包发送者名称
    $luckMoneyData['re_openid'] = 'oHjeTuDff0w-gKR4qJNy62_s0_BM';  //红包接收者的openId
    //alex
    //oHjeTuP_AE6umbN0zYuvHKzd-QlQ
    //mengnan
    //oHjeTuDff0w-gKR4qJNy62_s0_BM
    $luckMoneyData['total_amount'] = 100;  //红包总额（单位为分），现金红包至少100，裂变红包至少300
    $luckMoneyData['total_num'] = 1;  //现金红包时为1，裂变红包时至少为3
    $luckMoneyData['wishing'] = '祝福语';
    $luckMoneyData['act_name'] = '活动名称';
    $luckMoneyData['remark'] = '红包备注';
    $luckMoneyData['client_ip'] = request()->ip();

    /**
     * 第 5 步：发送红包
     * 第二个参数表示发送的红包类型，有现金红包（'CASH_LUCK_MONEY'）和裂变红包（'GROUP_LUCK_MONEY'）可选，红包工具类中已定义相关常量。
     */
    $result = $luckMoneyServer->sendNormal($luckMoneyData);

    dd($result);
  }

  public function login(){
    $wechat = app('wechat');
    $to='http://test.sm95.com';
    $scope='snsapi_userinfo ';
    $result=$wechat->url($to, $scope, $state = 'STATE');
    dd($result);
  }

}