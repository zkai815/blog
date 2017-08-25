/*

@Name：不落阁后台模板源码 
@Author：Absolutely 
@Site：http://www.lyblogs.cn

*/

layui.define(['laypage', 'layer', 'form', 'pagesize'], function (exports) {
    var $ = layui.jquery,
        layer = layui.layer,
        form = layui.form(),
        laypage = layui.laypage;
    var laypageId = 'pageNav';

    initilData();
    //页数据初始化
    //currentIndex：当前也下标
    //pageSize：页容量（每页显示的条数）

    function initilData(currentIndex=1,pageSize=5,map=''){
        var index = layer.load(1);
        $.get('/Admin/Article/show.html',{'currentIndex':currentIndex,'pageSize':pageSize,'map':map},function(result){
            data = result['data'];
            pages = result['pages'];
        },'json');

        //模拟数据加载
        setTimeout(function () {
            layer.close(index);

            var html = '';  //由于静态页面，所以只能作字符串拼接，实际使用一般是ajax请求服务器数据
            html += '<table style="" class="layui-table" lay-even>';
            html += '<colgroup><col width="180"><col><col width="150"><col width="180"><col width="90"><col width="90"><col width="50"><col width="50"></colgroup>';
            html += '<thead><tr><th>文章标题</th><th>文章分类</th><th>文章作者</th><th>文章时间</th><th colspan="2">选项</th><th colspan="2">操作</th></tr></thead>';
            html += '<tbody>';
            //遍历文章集合
            for (var i=0;i<data.length;i++) {
                var item = data[i];
                html += "<tr>";
                html += "<td>" + item.article_name + "</td>";
                html += "<td>" + item.type_name + "</td>";
                html += "<td>" + item.article_author + "</td>";
                html += "<td>" + formatDate(item.article_time) + "</td>";
                html += '<td><form class="layui-form" action=""><div class="layui-form-item" style="margin:0;"><input type="checkbox" name="top" title="置顶" value="' + item.id + '" lay-filter="top" checked /></div></form></td>';
                html += '<td><form class="layui-form" action=""><div class="layui-form-item" style="margin:0;"><input type="checkbox" name="top" title="推荐" value="' + item.id + '" lay-filter="recommend" checked /></div></form></td>';
                html += '<td><button class="layui-btn layui-btn-small layui-btn-normal" onclick="layui.datalist.editData(\'' + item.article_id + '\')"><i class="layui-icon">&#xe642;</i></button></td>';
                html += '<td><button class="layui-btn layui-btn-small layui-btn-danger" onclick="layui.datalist.deleteData(\'' + item.article_id + '\')"><i class="layui-icon">&#xe640;</i></button></td>';
                html += "</tr>";
            }
            html += '</tbody>';
            html += '</table>';
            html += '<div id="' + laypageId + '"></div>';

            $('#dataContent').html(html);

            form.render('checkbox');  //重新渲染CheckBox，编辑和添加的时候
            $('#dataConsole,#dataList').attr('style', 'display:block'); //显示FiledBox

            laypage({
                cont: laypageId,
                pages: pages,
                groups: 3,
                skip: false,
                curr: currentIndex,
                jump: function (obj, first) {
                    var currentIndex = obj.curr;
                    if (!first) {
                        initilData(currentIndex, pageSize,map);
                    }
                }
            });
            //该模块是我定义的拓展laypage，增加设置页容量功能
            //laypageId:laypage对象的id同laypage({})里面的cont属性
            //pagesize当前页容量，用于显示当前页容量
            //callback用于设置pagesize确定按钮点击时的回掉函数，返回新的页容量
            layui.pagesize(laypageId, pageSize).callback(function (newPageSize) {
                //这里不能传当前页，因为改变页容量后，当前页很可能没有数据
                initilData(1, newPageSize);
            });
        }, 500);
    }

    //监听置顶CheckBox
    form.on('checkbox(top)', function (data) {
        var index = layer.load(1);
        setTimeout(function () {
            layer.close(index);
            if (data.elem.checked) {
                data.elem.checked = false;
            }
            else {
                data.elem.checked = true;
            }
            layer.msg('操作失败，返回原来状态');
            form.render();  //重新渲染
        }, 300);
    });

    //监听推荐CheckBox
    form.on('checkbox(recommend)', function (data) {
        var index = layer.load(1);
        setTimeout(function () {
            layer.close(index);
            layer.msg('操作成功');
        }, 300);
    });
    //添加数据
    $('#addArticle').click(function () {
        var index = layer.load(1);
        setTimeout(function () {
            layer.close(index);
            layer.msg('打开添加窗口');
        }, 500);
    });

    //search
    $('.search').click(function () {
        var index = layer.load(1);
        var article_name = $('#article_name').val();
        var type_id = $('#type_id option:selected').val();
        var stime = $('#stime').val();
        var etime = $('#etime').val();
        initilData(1,5,{'keywords':article_name,'type_id':type_id,'stime':stime,'etime':etime});

        setTimeout(function (){
            layer.close(index);
            layer.msg('打开添加窗口');
        }, 500);
    });


    //输出接口，主要是两个函数，一个删除一个编辑
    var datalist = {
        deleteData: function (id) {
            layer.confirm('确定删除？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                //layer.msg('删除Id为【' + id + '】的数据');
                $.get('http://www.815.com/Admin/Article/del',{'id':id},function(result){
                    location.href = location.href;
                },'json');
            }, function () {

            });
        },
        editData: function (id){
            //layer.msg('编辑Id为【' + id + '】的数据');
                location.href = 'http://www.815.com/Admin/Article/update?id='+id;
        }
    };
    function   formatDate(time)   {
        if(typeof(time)=='string'){
            var _time=parseInt(time+'000');
        }
        var now = new Date(_time);
        var   year=now.getFullYear();
        var   month=now.getMonth()+1;
        var   date=now.getDate();
        var   hour=now.getHours();
        var   minute=now.getMinutes();
        var   second=now.getSeconds();
        return   year+"-"+month+"-"+date+"   "+hour+":"+minute+":"+second;
    }

    exports('datalist', datalist);
});