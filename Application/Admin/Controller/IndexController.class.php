<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function main()
    {
        $res = M('user')->count();
        $nowTime = time();
        $stime = $nowTime -3600*24*1;
        $etime = $nowTime +3600*24*1;
        if($stime <= $nowTime && $etime >= $nowTime)
        {
            $reg = M('user')->count();
        }
        $data = M('article')->count();
        $this->assign('data',$data);
        $this->assign('reg',$reg);
        $this->assign('res',$res);
        $this->display();
    }

    //清除缓存
    public function clear()
    {
        if(deleteFile(HTML_PATH))
        {
            $this->success('清除缓存成功');
        }
        else
        {
            $this->success('清除缓存失败');
        }
    }

    //统计代码
    public function counts()
    {
        $str = 'Day,访问量（PV）,访问用户（UV）'."\n";
        for($i = 0; $i<7; $i++){
            $oneDay = $i * 24 * 3600;
            //开始时间
            $stime = strtotime(date('Y-m-d')) - $oneDay;
            //结束时间
            $etime = strtotime(date('Y-m-d')) + 24 * 3600 - 1 - $oneDay;
            $map[]  = ['acs_time'=>['egt',$stime]];
            $map[]  = ['acs_time'=>['elt',$etime]];
            //pv
            $dayPV = M('access')->where($map)->count();
            //UV
            $dayUV = M('access')->field('ip')->where($map)->group('ip')->select();
            $dayNum = count($dayUV);
            unset($map);
            $str .= date('Y/m/d',$stime) .',' .$dayPV .',' . $dayNum. "\n";

        }
        echo $str;
    }
}