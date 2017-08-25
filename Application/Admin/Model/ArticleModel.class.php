<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{

    protected $_validate = array(
        array('article_name','','文章标题已经存在！',1,'unique',1),
    );

    //关联模型
    protected $_link = array(
        'Type' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Type',
            'foreign_key'   => 'type_id',
            'as_fields' => 'type_name',
        )
    );
}