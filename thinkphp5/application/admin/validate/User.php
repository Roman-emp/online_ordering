<?php
namespace app\admin\validate;

use think\Validate;
class User extends Validate
{
	protected $rule = [
	'username' => 'require|max:25',
	'password' => 'require|length:3,12',
	];
	protected $message = [
	'name.require' => '名称必须',
	'name.max' => '名称最多不能超过25个字符',
	'password.require' => '密码是必须的',
	'password.length' => '密码长度只能在3-12位',
	];
}