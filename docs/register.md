# 用户注册

POST /api/register

```
POST /api/register

{
   "username":"bar",
   "nickname":"foo",
   "birthday": "Y-m-d H:i:s",
   "gender": 1,
   "avatar":"",
   "email":"",
   "phone":"",
   "password":"123456",
   "country":"中国",
   "province":"广东省",
   "city":"广州市",
   "region":"天河区",
   "from":"qq",
}

HTTP/1.1 201 Created

{
    "token": "YACub2KLfe8mfmHPcUKtt6t2SMJOGPXnZbqhc3nX",
    "userId": "1"
}
```
