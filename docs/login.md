### 账号密码登录

POST /api/login

```
POST /api/login

{
    "identification": "foo",
    "password": "123456"
}

HTTP/1.1 200 OK

{
    "token": "YACub2KLfe8mfmHPcUKtt6t2SMJOGPXnZbqhc3nX",
    "userId": "1"
}
```

在需要登录后操作的时候，需要在 Header 中带上 token 进行请求。

```
GET /api/forum HTTP/1.1
Authorization: Token YACub2KLfe8mfmHPcUKtt6t2SMJOGPXnZbqhc3nX
```
