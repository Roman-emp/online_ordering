<?php
namespace app\admin\model;
use think\Model;
class User_role extends Model
{
		protected $_link = array(
               'Role'=>array(
                      'mapping_type'=>MANY_TO_MANE,
                      'foreign_key'=>'user_id',
                      'relation_key'=>'role_id',
                      'relation_table'=>'role_admin',
                      'mapping_fields'=>'id,name'

               	),
			);
}