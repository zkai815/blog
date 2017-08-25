<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ReviewModel extends RelationModel{
    //关联模型
    protected $_link = array(
        'Article' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Article',
            'foreign_key'   => 'article_id',
            'as_fields' => 'article_name',
        )
    );
}