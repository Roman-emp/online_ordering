<?php
//短信验证
$SoftVersion = "2014-06-30";
$Account = "Accounts";
//帐户id
$accountSid = "4ac4b0e80c097aefae80ec9c4342acec";
$function = "Messages";
$operation = "templateSMS";
$token = 'ce75d626605fc88148af69eb0c3c1741';
$time = date('YmdHis');
$SigParameter = strtoupper(md5($accountSid.$token.$time));
$Authorization = base64_encode($accountSid.":".$time);
//编写header头
$header = [
	"Accept:application/json",
	'Content-Type:application/json;charset=utf-8',
	'Authorization:'.$Authorization,
];
//数组转json
$data = [
'templateSMS'=>[
	'appId'=>'b865ea18e7734f97a5a0564eb3bc3383',
	// 这个是短信模板参数
	'param'=>'1234',//这个是验证码随机
	'templateId'=>'104148',
	'to'=>"$to",//这个是手机号
	]
];
$body = json_encode($data);
$url = "https://api.ucpaas.com/".$SoftVersion.'/'.$Account.'/'.$accountSid.'/'.$function.'/'.$operation.'?sig='.$SigParameter;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$body);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$result = curl_exec($ch);
curl_close($ch);
var_dump($result);
