var $, tab;
layui.config({
    base: "./resources/js/"
}).use(['tab', 'form', 'element', 'layer', 'jquery'], function () {
    tab = layui.tab();
    $ = layui.jquery;
    var form = layui.form,
        layer = layui.layer;


    document.showList = function () {
        $.ajax({
            url: 'get.php',
            type: 'get',
            dataType: 'json',
            data: {'type': 'getdate'},
            success: function (res) {
                var data = res['data']
                var html = ''
                var html2 = '', conduct = 0, complete = 0
                $("div").remove('.layui-card-body')
                $.each(data, function (i, v) {
                    if (v['type'] == 0) {
                        conduct += 1
                        html += '<div class="layui-card-body">' +
                            '<input type="checkbox" data-id="' + v['id'] + '" lay-skin="primary" title="' + v['content'] + '"lay-filter="filter">' +
                            '<div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary" >' +
                            '<span>' + v['content'] + '</span><i class="layui-icon layui-icon-ok"></i></div>' +
                            '<span class="layui-badge layui-bg-gray" style="position:absolute; margin-top:4px; right:66px;width: 6px;border-radius: 9px; cursor: pointer"' +
                            ' onclick="del_task(' + v['id'] + ')"> - </span>' +
                            '<span class="layui-badge layui-bg-gray" style="position:absolute; margin-top:4px; right:40px;width: 6px;border-radius: 9px; cursor: pointer;text-align: left"' +
                            ' onclick="share_task(' + v['id'] + ')"><i class="iconfont icon-share"></i></span>' +
                            '</div>'
                    } else {
                        complete += 1
                        html2 += '<div class="layui-card-body">' +
                            '<input type="checkbox" lay-skin="primary" data-id="' + v['id'] + '" title="' + v['content'] + '"lay-filter="filter" checked>' +
                            '<div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary" >' +
                            '<span>' + v['content'] + '</span><i class="layui-icon layui-icon-ok"></i></div>' +
                            '<span class="layui-badge layui-bg-gray" style="position:absolute; margin-top:4px; right:66px;width: 6px;border-radius: 9px; cursor: pointer" onclick="del_task(' + v['id'] + ')"> - </span>' +
                            '<span class="layui-badge layui-bg-gray" style="position:absolute; margin-top:4px; right:40px;width: 6px;border-radius: 9px; cursor: pointer;text-align: left"  onclick="share_task(' + v['id'] + ')"><i class="iconfont icon-share"></i></span>' +
                            '</div>'
                    }
                })
                $(".conduct .num").html(conduct)
                $(".complete .num").html(complete)
                $(".conduct").append(html)
                $(".complete").append(html2)
                form.render();
            }
        })
    }
    document.showList();
    //切换皮肤
    skins();

    $(".panel a").on("click", function () {
        window.parent.addTab($(this));
    });

    //更换皮肤
    function skins() {
        var skin = window.sessionStorage.getItem("skin");
        if (skin) {  //如果更换过皮肤
            if (window.sessionStorage.getItem("skinValue") != "自定义") {
                $("body").addClass(window.sessionStorage.getItem("skin"));
                if (window.sessionStorage.getItem("skin") == "orange") {
                    $('.layui-form .content').css("background-color", "#a07b38")
                } else if (window.sessionStorage.getItem("skin") == "blue") {
                    $('.layui-form .content').css("background-color", "#2fa2d9")
                } else {
                    $('.layui-form .content').css("background-color", "#F2F2F2")
                }
            } else {
                $(".layui-layout-admin .layui-header").css("background-color", skin.split(',')[0]);
                $(".layui-form .content").css("background-color", skin.split(',')[1]);
            }
        }
    }

    $(".changeSkin").click(function () {
        layer.open({
            title: "更换皮肤",
            area: ["310px", "280px"],
            type: "1",
            content: '<div class="skins_box">' +
                '<form class="layui-form">' +
                '<div class="layui-form-item-skin">' +
                '<input type="radio" name="skin" value="默认" title="默认" lay-filter="default" checked="">' +
                '<input type="radio" name="skin" value="橙色" title="橙色" lay-filter="orange">' +
                '<input type="radio" name="skin" value="蓝色" title="蓝色" lay-filter="blue">' +
                '<input type="radio" name="skin" value="自定义" title="自定义" lay-filter="custom">' +
                '<div class="skinCustom">' +
                '<input type="text" class="layui-input topColor" name="topSkin" placeholder="顶部颜色" />' +
                '<input type="text" class="layui-input leftColor" name="leftSkin" placeholder="内容颜色" />' +
                // '<input type="text" class="layui-input menuColor" name="btnSkin" placeholder="顶部菜单按钮" />' +
                '</div>' +
                '</div>' +
                '<div class="layui-form-item-skin skinBtn-skin">' +
                '<a href="javascript:;" class="layui-btn layui-btn-small layui-btn-normal" lay-submit="" lay-filter="changeSkin">确定更换</a>' +
                '<a href="javascript:;" class="layui-btn layui-btn-small layui-btn-primary" lay-submit="" lay-filter="noChangeSkin">我再想想</a>' +
                '</div>' +
                '</form>' +
                '</div>',
            success: function (index, layero) {
                var skin = window.sessionStorage.getItem("skin");
                if (window.sessionStorage.getItem("skinValue")) {
                    $(".skins_box input[value=" + window.sessionStorage.getItem("skinValue") + "]").attr("checked", "checked");
                }
                ;
                if ($(".skins_box input[value=自定义]").attr("checked")) {
                    $(".skinCustom").css("visibility", "inherit");
                    $(".topColor").val(skin.split(',')[0]);
                    $(".leftColor").val(skin.split(',')[1]);
                    $(".menuColor").val(skin.split(',')[2]);
                }
                ;
                form.render();
                $(".skins_box").removeClass("layui-hide");
                $(".skins_box .layui-form-radio").on("click", function () {
                    var skinColor;
                    if ($(this).find("div").text() == "橙色") {
                        skinColor = "orange";
                        $('.layui-form .content').css("background-color", "#a07b38")
                    } else if ($(this).find("div").text() == "蓝色") {
                        skinColor = "blue";
                        $('.layui-form .content').css("background-color", "#2fa2d9")
                    } else if ($(this).find("div").text() == "默认") {
                        skinColor = "";
                        $('.layui-form .content').css("background-color", "#F2F2F2")
                    }
                    if ($(this).find("div").text() != "自定义") {
                        $(".topColor,.leftColor,.menuColor").val('');
                        $("body").removeAttr("class").addClass("main_body " + skinColor + "");
                        $(".skinCustom").removeAttr("style");
                        $(".layui-bg-black,.hideMenu,.layui-layout-admin .layui-header").removeAttr("style");
                    } else {
                        $(".skinCustom").css("visibility", "inherit");
                    }
                });
                var skinStr, skinColor;
                $(".topColor").blur(function () {
                    $("body .layui-header").css("background-color", $(this).val());
                });
                $(".leftColor").blur(function () {
                    $(".layui-form .content").css("background-color", $(this).val());
                });
                form.on("submit(changeSkin)", function (data) {
                    if (data.field.skin != "自定义") {
                        if (data.field.skin == "橙色") {
                            skinColor = "orange";
                        } else if (data.field.skin == "蓝色") {
                            skinColor = "blue";
                        } else if (data.field.skin == "默认") {
                            skinColor = "";
                        }
                        window.sessionStorage.setItem("skin", skinColor);
                    } else {
                        skinStr = $(".topColor").val() + ',' + $(".leftColor").val() + ',' + $(".menuColor").val();
                        window.sessionStorage.setItem("skin", skinStr);
                        $("body").removeAttr("class").addClass("main_body");
                    }
                    window.sessionStorage.setItem("skinValue", data.field.skin);
                    layer.closeAll("page");
                });
                form.on("submit(noChangeSkin)", function () {
                    $("body").removeAttr("class").addClass("main_body " + window.sessionStorage.getItem("skin") + "");
                    $(".layui-bg-black,.hideMenu,.layui-layout-admin .layui-header").removeAttr("style");
                    skins();
                    layer.closeAll("page");
                });
            },
            cancel: function () {
                $("body").removeAttr("class").addClass("main_body " + window.sessionStorage.getItem("skin") + "");
                $(".layui-bg-black,.hideMenu,.layui-layout-admin .layui-header").removeAttr("style");
                skins();
            }
        });
    });
    $('.doing_button').click(function () {
        //
        $.each($('.conduct input'), function (i, v) {
            $.ajax({
                url: 'get.php',
                type: 'get',
                dataType: 'json',
                data: {'type': 'del', 'id': $(v).attr('data-id')},
                success: function (res) {
                    console.log(res)
                    document.showList();
                }
            })
        })
    })
    $('.share_button').click(function () {
        $.each($('.complete input'), function (i, v) {
            $.ajax({
                url: 'get.php',
                type: 'get',
                dataType: 'json',
                data: {'type': 'del', 'id': $(v).attr('data-id')},
                success: function (res) {
                    console.log(res)
                    document.showList();
                }
            })
        })
    })
    //退出
    $(".signOut").click(function () {
        window.sessionStorage.removeItem("menu");
        menu = [];
        window.sessionStorage.removeItem("curmenu");
    });

    form.on('checkbox(filter)', function (data) {
        if ($(data.elem).prop("checked")) {
            $.ajax({
                url: 'get.php',
                type: 'get',
                dataType: 'json',
                data: {'type': 'upload', 'res': 1, 'id': $(data.elem).attr('data-id')},
                success: function (res) {
                }
            })
        } else {
            $.ajax({
                url: 'get.php',
                type: 'get',
                dataType: 'json',
                data: {'type': 'upload', 'res': 0, 'id': $(data.elem).attr('data-id')},
                success: function (res) {

                }
            })
        }
        document.showList();
        share();
    });
    form.on('radio(radio)', function (data) {
        if ($(data.elem).prop("checked")) {
            window.rb = data.value
        }

    })
    window.user = [];
    form.on('checkbox(user)', function (data) {
        if ($(data.elem).prop("checked")) {
            window.user.push(data.value)
        }
    })
    $('#user').html(localStorage.getItem('user').split(':')[1])
    $('#user').attr('data-id', localStorage.getItem('user').split(':')[0])
    $(".showNotice").on("click", function () {
        showNotice();
    });
    share();
    setInterval(function () {
        $.ajax({
            url: 'get.php',
            type: 'get',
            dataType: 'json',
            data: {'type': 'getshare', 'id': $('#user').attr('data-id')},
            success: function (res) {
                $('.noice').html(res.data.length)
            }
        })
    }, 500)
});


function share() {
    $.ajax({
        url: 'get.php',
        type: 'get',
        dataType: 'json',
        data: {'type': 'getsharedata', 'id': $('#user').attr('data-id')},
        success: function (res) {
            var html = '';
            $.each(res.data, function (i, v) {
                html += '<div class="layui-card-body">' +
                    '<input type="checkbox" data-id="' + v['id'] + '" lay-skin="primary" title="' + v['content'] + '"lay-filter="share_filter" ' + (v['type'] == 0 ? "disabled" : "") + '>' +
                    '<div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary" >' +
                    '<span>' + v['content'] + '</span><i class="layui-icon layui-icon-ok"></i></div>' +
                    '</div>'
            })
            $(".share .num").html(res.data.length)
            $(".share").append(html)
            layui.form.render();
        }
    })
}

function showNotice() {
    $.ajax({
        url: 'get.php',
        type: 'get',
        dataType: 'json',
        data: {'type': 'getshare', 'id': $('#user').attr('data-id')},
        success: function (res) {
            var html = '';
            $.each(res.data, function (i, v) {
                html += '<tr>' +
                    '<td>' + v['from_user'] + '</td>' +
                    '<td>' + v['to_user'] + '</td>' +
                    '<td>' + v['content'] + '</td>' +
                    '<td>' +
                    '<div class="layui-table-cell laytable-cell-1-0-11"> ' +
                    '<a class="layui-btn layui-btn-xs confirm" data-id="' + v['id'] + '">确认</a>' +
                    '</div>' +
                    '</td>' +
                    '</trdata>'
            })
            layer.open({
                type: 1 //此处以iframe举例
                , title: '分享公告',
                id: 'LAY_layuipro',
                area: ['390px', '260px']
                , shade: 0,
                content: '<form class="layui-form" action="">' +
                    '<table class="layui-table" id="test">\n' +
                    '<thead>' +
                    '    <tr>' +
                    '      <th>分享者</th>' +
                    '      <th>接受者</th>' +
                    '      <th>任务</th>' +
                    '<th>操作</th> ' +
                    '</tr>' +
                    '</thead><tbody>' +
                    html +
                    '</tbody></table>' +
                    '<form>',
                success: function (layero) {
                    $('.confirm').click(function () {
                        var that = this
                        $.ajax({
                            url: 'get.php',
                            type: 'get',
                            dataType: 'json',
                            data: {'type': 'update_share', 'id': $(this).attr('data-id')},
                            success: function (res) {
                                $('#test tbody tr').eq($(that).parents('tr').index()).remove()
                            }
                        })
                    });
                }
            });
        }
    })
}

function del_task(a) {
    $.ajax({
        url: 'get.php',
        type: 'get',
        dataType: 'json',
        data: {'type': 'del', 'id': a},
        success: function (res) {
            console.log(res)
            document.showList();
        }
    })
}

function share_task(id) {
    $.ajax({
        url: 'get.php',
        type: 'get',
        dataType: 'json',
        data: {'type': 'user', 'id': $('#user').attr('data-id')},
        success: function (res) {
            var html = '';
            $.each(res.data, function (i, item) {
                html += '<div class="layui-card-body">' +
                    '<input type="checkbox" value="' + item['id'] + '" lay-skin="primary" title="' + item['nickname'] + '"lay-filter="user">' +
                    '</div>'
            })
            layer.open({
                type: 1,
                title: "权限",
                area: ['310px', '300px'],
                shade: 0,
                id: 'LAY_layuipro',
                btn: ['提交'],
                content: '<form class="layui-form" action="">' +
                    '<div class="layui-form-item">' +
                    '    <label class="layui-form-label">单选框</label>' +
                    '    <div class="layui-input-block">\n' +
                    '      <input type="radio" name="rb" value="0" title="查看" lay-filter="radio" checked="checked">' +
                    '      <input type="radio" name="rb" value="1" title="编辑" lay-filter="radio">' +
                    '    </div>' +
                    '  </div>' +
                    ' <div class="layui-card conduct" style="margin: auto; width: 80%">' +
                    html +
                    '</div>' +
                    '<form>',
                success: function (layero) {
                    layui.form.render();
                    var btn = layero.find('.layui-layer-btn');
                    btn.css('text-align', 'center');
                    if ($(window).width() > 432) {  //如果页面宽度不足以显示顶部“系统公告”按钮，则不提示
                        btn.on("click", function () {
                            $.ajax({
                                url: 'get.php',
                                type: 'get',
                                dataType: 'json',
                                data: {
                                    'type': 'share',
                                    'to_user': window.user.join(','),
                                    'from_user': $('#user').attr('data-id'),
                                    'task_id': id,
                                    'share_type': window.rb
                                },
                                success: function (res) {
                                    layer.msg('分享成功', {
                                        time: 200, //20s后自动关闭

                                    });
                                }
                            })


                        });
                    }
                }
            });
        }
    })


}

window.rb = 0;

function postaction() {
    $.ajax({
        url: 'get.php',
        type: 'get',
        dataType: 'json',
        data: {'type': 'insert', 'user_id': $('#user').attr('data-id'), 'content': $('#inputTodo').val()},
        success: function (res) {
            $('#inputTodo').val('')
            document.showList();
        }
    })

}




















