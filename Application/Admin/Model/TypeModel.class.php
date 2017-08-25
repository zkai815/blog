<?php
namespace Admin\Model;
use Think\Model;
class TypeModel extends Model
{
    protected $_validate = array(
        array('type_name','','分类名称已经存在！',1,'unique',1)
    );
}