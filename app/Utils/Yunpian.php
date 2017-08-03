<?php namespace App\Utils;

class Yunpian
{
  public function send($mobile, $code)
  {
    $apikey = env('YunPian_API_KEY');
    $text = "您的验证码是{$code}";
    $data = ['text' => $text, 'apikey' => $apikey, 'mobile' => $mobile];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/sms/single_send.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    return curl_exec($ch);
  }
}