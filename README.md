# Tugas Kelas Industri Github & git 
Nama : `Ilham Maulana`
SMK : `SMK HIDAYAH `

`Build With Laravel`

Refresnsi boleh download jangan...

    
## AUTH 
simple auth 
```
 POST  api/auth/login
```

example password wrong
```json
{
    "code": 401,
    "message": "Your password or email wrong",
    "errors": "Unauthorized"
}

```

#USER CRUD
## All User
```
 GET api/users
```
```json
{
    "code": 200,
    "message": "Success",
    "data": [
        {
            "id": 1,
            "name": "Ilham Updated",
            "email": "ilhammaulana@gmail.com",
            "photo": "qDlK9ADy2Iaig17ExJUxFinSfpasSXqcaVRfXbl9.jpg",
            "url_photo": "http://127.0.0.1:8000/public/photos/qDlK9ADy2Iaig17ExJUxFinSfpasSXqcaVRfXbl9.jpg"
        },
        {
            "id": 3,
            "name": "githubnya_ilham",
            "email": "email@gmail.com",
            "photo": "EeDpMFPZYG2p8vxV4vX8uSzmGBauAOi8O9XdendI.png",
            "url_photo": "http://127.0.0.1:8000/public/photos/EeDpMFPZYG2p8vxV4vX8uSzmGBauAOi8O9XdendI.png"
        }
    ]
}

```

## Register
Create user .. 

```
POST api/auth/register
```
```json
{
    "code": 201,
    "message": "Success Register!",
    "data": {
        "token": "4|itz3zRrgL05hjLrp85ERfKyJtjKFZwHy9CxZuvpw",
        "name": "nyontek_githubnya_ilham"
    }
}
```


## Delete User

```
 DELETE api/users/delete/${id}
```
example response
```json
{
    "code": 200,
    "message": "Success deleted user!"
}
```

## UPDATE USER
```
 POST users/update/${id}
```
```json
{
    "code": 200,
    "message": "Success updated user!"
}
```


# TODO CRUD

## GET ALL TODOS
```
 GET /api/todos
```
example response :
```json
{
    "code": 200,
    "message": "Success!",
    "data": [
        {
            "id": 2,
            "created_at": "2023-01-29T09:32:24.000000Z",
            "updated_at": "2023-01-29T09:33:36.000000Z",
            "title": "updated",
            "description": "udpated",
            "created_by": 1,
            "done": 0,
            "new_created_at": "2023-01-29 09:32:24",
            "new_updated_at": "2023-01-29 09:33:36"
        }
    ]
}
```
## CREATE

```
POST api/todos/create
```
example when success :
```json
{
    "code": 200,
    "message": "Success"
}
```
## UPDATE
update todo
```
PATCH api/todos/update/${id}
```
example response : 
```json
{
    "code": 200,
    "message": "Success!, todos updated"
}
```
## DELETE
delete todo
```
DELETE api/todos/delete/${id}
```
example response : 
```json
{
    "code": 200,
    "message": "Success Deleted"
}
```



