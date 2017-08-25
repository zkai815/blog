<?php
namespace Home\Controller;
use Think\Controller;
class EmailController extends Controller
{
    public function index()
    {
        $this->display('Email/index');
    }
}