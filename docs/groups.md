## 添加分组

POST /api/groups

```
POST /api/groups

{
    "name_singular": "manager",
    "name_plural": "managers"
}

HTTP/1.1 201 Created

{
    "id": 2,
    "name_singular": "manager",
    "name_plural": "managers",
    "created": "Y-m-d H:i:s",
}
```

## 删除分组

DELETE /api/groups/:id

```
DELETE /api/groups/1

HTTP/1.1 204 No Content
```

## 修改分组

PATCH /api/groups/:id

```
PATCH /api/groups/2

{
    "name_singular": "manager",
    "name_plural": "managers"
}

HTTP/1.1 200 OK

{
    "id": 2,
    "name_singular": "manager",
    "name_plural": "managers",
    "created": "Y-m-d H:i:s",
}
```

## 查询分组

GET /api/groups/:id

```
GET /api/groups/2

HTTP/1.1 200 OK

{
    "id": 2,
    "name_singular": "manager",
    "name_plural": "managers",
    "created": "Y-m-d H:i:s",
}
```
