<?php
namespace app\index\validate;

use think\Validate;
class User extends Validate
{
	protected $rule = [
	'name' => 'require|max:25',
	'pwd' => 'require|length:6,20',
	'email'=>'email',
	'tell'=>'number|length:11',
	];
	protected $message = [
	'name.require' => '名称必须',
	'name.max' => '名称最多不能超过25个字符',
	'pwd.require' => '密码是必须的',
	'pwd.length' => '密码长度只能在6-20位',
	'email'           => '邮箱格式错误',
	'tell.number'     => '手机号必须为数字类型',
	'tell.length'     =>  '手机号必须为11位',
	];
}