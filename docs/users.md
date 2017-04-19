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

DELETE /api/users/{id or username}

```
DELETE /api/users/6

HTTP/1.1 204 No Content
```

### 修改用户

PATCH /api/users/{id or username}

```
PATCH /api/users/6

{
    username:jan2
    nickname:黄总
    birthday:2017-02-11
    gender:1
    email:384099566@qq.com
    password:123456
}

HTTP/1.1 200 OK

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

### 查看好友

GET /api/followers/{id or username}

```
GET /api/followers/6

HTTP/1.1 200 OK

[
    {
        "nickname": "bar",
        "user_id": "1",
        "username": "foo",
        "birthday": "2017-04-09 22:36:48",
        "gender": "1",
        "avatar": "",
        "created": "2017-04-09 22:36:48"
    }
]
```

### 查看粉丝

GET /api/following/{id or username}

```
GET /api/following/6

HTTP/1.1 200 OK

[
    {
        "nickname": "bar",
        "user_id": "1",
        "username": "foo",
        "birthday": "2017-04-09 22:36:48",
        "gender": "1",
        "avatar": "",
        "created": "2017-04-09 22:36:48"
    }
]
```

### 取消关注

DELETE /api/follower/{id or username}

```
DELETE /api/followers/6

HTTP/1.1 204 No Content
```

### 头像上传

