# Profile API

### 获取个人信息

GET /profile/{user_id}

#### 属性

name | age
---- | ---
user_id | 用户id

```json
{
    "user_id": 1, 
    "nickname": "foo", 
    "birthday": "2016-01-01", 
    "gender": 1, 
    "avatar": "", 
    "email": "384099566@qq.com", 
    "phone": "", 
    "country": "ä¸­å›½", 
    "province": "å¹¿ä¸œ", 
    "city": "å¹¿å·ž", 
    "region": "å¤©æ²³åŒº", 
    "from": "fastd", 
    "created": "2017-03-19", 
    "updated": "2017-03-19"
}
```

### 修改个人信息

PATCH /profile/{user_id}

#### 属性

name | age
---- | ---
user_id | 

#### 参数

name | age
---- | ---
nickname | 昵称
birthday | 生日
gender | 性别，0女 1男
avatar | 头像
email | 邮箱
phone | 手机号
country | 国家
province | 省
city | 市
region | 区
from | 来自于
created | 创建于
updated | 更新于

```json
{
    "user_id": 1, 
    "nickname": "foo", 
    "birthday": "2016-01-01", 
    "gender": 1, 
    "avatar": "", 
    "email": "384099566@qq.com", 
    "phone": "", 
    "country": "ä¸­å›½", 
    "province": "å¹¿ä¸œ", 
    "city": "å¹¿å·ž", 
    "region": "å¤©æ²³åŒº", 
    "from": "fastd", 
    "created": "2017-03-19", 
    "updated": "2017-03-19"
}
```

### 注册用户

[注册](register.md)

### 删除用户

