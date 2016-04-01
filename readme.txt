1,安装laravel
2,php.ini 设置:curl.cainfo = /path/to/downloaded/caroot.pem
3,composer require "overtrue/laravel-wechat:~3.0"
4,注册 ServiceProvider:Overtrue\LaravelWechat\ServiceProvider::class,
5,创建配置文件：php artisan vendor:publish
6,modify:config/wechat.php 
7,加入别名 config/app.php aliases  'Wechat' => 'Overtrue\LaravelWechat\Facade',
8,modify env
WECHAT_APPID
WECHAT_SECRET
WECHAT_TOKEN
WECHAT_AES_KEY

WECHAT_LOG_LEVEL
WECHAT_LOG_FILE

WECHAT_OAUTH_SCOPES
WECHAT_OAUTH_CALLBACK

WECHAT_PAYMENT_MERCHANT_ID
WECHAT_PAYMENT_KEY
WECHAT_PAYMENT_CERT_PATH
WECHAT_PAYMENT_KEY_PATH
WECHAT_PAYMENT_DEVICE_INFO
WECHAT_PAYMENT_SUB_APP_ID
WECHAT_PAYMENT_SUB_MERCHANT_ID


9,创建控制器
WechatController.php
10,modify routes.php
Route::any('/wechat', 'WechatController@serve');
Route::get('/test', 'WechatController@test');