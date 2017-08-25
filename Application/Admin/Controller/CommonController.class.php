<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller
{
    //分页类
    protected function getPage($count){
        $page = new \Think\Page($count,$this->result['set_page']);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $pages = $page->show();
        return $pages;
    }


    //上传类
    public function getup($filepath){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     C('UPLOAD_SIZE') ;// 设置附件上传大小
        $upload->exts      =     C('UPLOAD_ETS');// 设置附件上传类型
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        $upload->rootPath  = "./";
        $info   =   $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }
        $imgpath = $info[$filepath]['savepath'].$info[$filepath]['savename'];
        return $imgpath;
    }


    //基本设置
    public function __construct()
    {
        parent::__construct();
        $id = session('id');
        if(empty($id))
        {
            $this->redirect('Login/login');
        }
        $this->result = do_set();
    }


    public function upload($img){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     C('UPLOAD_SIZE') ;// 设置附件上传大小
        $upload->exts      =     C('UPLOAD_ETS');// 设置附件上传类型
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        $upload->rootPath  =      './'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();
        $return = ['isError'=>0,'msg'=>'','data'=>''];
        if(!$info)
        {
            // 上传错误提示错误信息
            $return['isError']=1;
            $return['msg']=$upload->getError();
        }
        else
        {
            $imgPath=$info[$img]['savepath']. $info['img']['savename'];
            $return['isError']=0;
            $return['data']=$imgPath;
        }
        return $return;
    }

}