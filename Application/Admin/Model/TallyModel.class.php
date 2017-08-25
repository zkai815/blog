<?php
namespace Admin\Model;
use Think\Model;
class TallyModel extends Model
{
    protected $_validate = array(
        array('tally_name','','标签名称已经存在！',1,'unique',1)
    );
}