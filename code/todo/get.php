<?php
require 'db.php';
$param = $_GET;
$db = new Db();
if ($param['type'] == 'getdate') {
    $result = $db->select('task')->all();

} else if ($param['type'] == 'del') {
    $result = $db->del('task')->where(['id' => $param['id']])->todel();
} else if ($param['type'] == 'upload') {
    $result = $db->update('task', ['type' => $param['res']])->
    where(['id' => $param['id']])->toUpdate();
} else if ($param['type'] == 'insert') {
    $result = $db->save('task', ['user_id' => '"' . $param['user_id'] . '"', 'content' => '"' . $param['content'] . '"', 'create_at' => time(), 'update_at' => time()]);

} else if ($param['type'] == 'reset') {
    $result = $db->save('user', ['email' => '"' . $param['email'] . '"', 'nickname' => '"' . $param['nickname'] . '"', 'password' => '"' . $param['password'] . '"']);
    if ($result) {
        $result = 0;
    }
} else if ($param['type'] == 'login') {
    $result = $db->select('user')->where(['email' => $param['email']])->all();
    if ($result[0]['password'] == $param['password']) {
        $nickname = $result[0]['nickname'];
        $id = $result[0]['id'];
        $result = [];
        $result['code'] = 1;
        $result['user'] = $nickname;
        $result['id'] = $id;
    } else {
        $result = -1;
    }
} else if ($param['type'] == 'user') {
    $result = $db->select('user', ['id', 'nickname', 'email'])->where('id!=' . $param['id'])->all();
} else if ($param['type'] == 'share') {
    $to_user = explode(',', $param['to_user']);
    foreach ($to_user as $v) {
        $result = $db->save('share',
            ['to_user' => '"' . $v . '"',
                'from_user' => '"' . $param['from_user'] . '"',
                'task_id' => '"' . $param['task_id'] . '"',
                'type' => '"' . $param['share_type'] . '"',
            ]);
    }

} else if ($param['type'] == 'getshare') {
    $t = $db->select('task')->sql();
    $f_u = $db->select('user')->sql();
    $t_u = $db->select('user')->sql();
    $result = $db->select('share s,(' . $t . ') t,(' . $f_u . ') f_u,(' . $t_u . ') t_u', ['s.id', 'f_u.nickname as \'from_user\'',
        't_u.nickname as to_user', 't.content', 's.type'])->
    where('to_user=' . $param['id'] . ' and s.state="0" and  s.from_user=f_u.id AND t.id=task_id AND s.to_user=t_u.id')->all();

} else if ($param['type'] == 'update_share') {
    $result = $db->update('share', ['state' => 1])->
    where(['id' => $param['id']])->toUpdate();
}
else if ($param['type'] == 'getsharedata') {
    $t = $db->select('task')->sql();
    $f_u = $db->select('user')->sql();
    $t_u = $db->select('user')->sql();
    $result = $db->select('share s,(' . $t . ') t,(' . $f_u . ') f_u,(' . $t_u . ') t_u', ['s.id', 'f_u.nickname as \'from_user\'',
        't_u.nickname as to_user', 't.content', 's.type'])->
    where('to_user=' . $param['id'] . ' and s.state="1" and  s.from_user=f_u.id AND t.id=task_id AND s.to_user=t_u.id')->all();

}




echo json_encode(['data' => $result]);
?>