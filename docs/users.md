### 增加用户

POST /api/users

```
POST /api/users

{
    username:jan2
    nickname:黄总
    birthday:2017-02-11
    gender:1
    email:384099566@qq.com
    password:123456
}

HTTP/1.1 201 Created

{
    "id": 6,
    "username": "jan",
    "nickname": "黄总2",
    "birthday": "2017-02-11",
    "gender": 1,
    "avatar": "",
    "country": "",
    "province": "",
    "city": "",
    "region": "",
    "from": ""
}
```

### 获取个人信息

GET /api/users/{id or username}

```
GET /api/users/6

HTTP/1.1 201 Created

{
    "id": 6,
    "username": "jan",
    "nickname": "黄总2",
    "birthday": "2017-02-11",
    "gender": 1,
    "avatar": "",
    "country": "",
    "province": "",
    "city": "",
    "region": "",
    "from": ""
}
```

### 删除用户

### 修改用户

### 查看好友

### 头像上传

### 取消关注