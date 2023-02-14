# TRI7 API Spec

## Running API tests locally

To locally run the provided Postman collection against your backend, execute:

```
APIURL=http://127.0.0.1:8000/api
```


### Authentication Header:

`Authorization: Bearer Token {token.here}`

## JSON Objects returned by API:

Make sure the right content type like `Content-Type: application/json; charset=utf-8` is correctly returned.

### Note: The manager role can perform all CRUD operations for every roles. However, the users with non-manager role can only perform CRUD operations based on their user roles.
    Role Legend:
  - 1 = Manager
  - 2 = Web Developer
  - 3 = Web Designer


### Login

```JSON
{
  "id": "9",
  "username": "alan.padiernos2",
  "password": "$2y$10$pTuPi./jfplnGbo/IZX2W.BxQysXSS5Ss44Smbo8aCvcLrMbDw0T.",
  "name": "Alan Web Designer",
  "role": "3",
  "create_date": "1676373882",
  "created_at": "2023-02-14 11:24:42",
  "updated_at": "2023-02-14 11:24:42",
  "user_id": "20",
  "first_name": "Alan",
  "last_name": "Web Designer",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiI5IiwiYXVkIjoiMyIsInN1YiI6IntcImlkXCI6XCI5XCIsXCJ1c2VybmFtZVwiOlwiYWxhbi5wYWRpZXJub3MyXCIsXCJwYXNzd29yZFwiOlwiJDJ5JDEwJHBUdVBpLlxcL2pmcGxuR2JvXFwvSVpYMlcuQnhReXNYU1M1U3M0NFNtYm84YUN2Y0xyTWJEdzBULlwiLFwibmFtZVwiOlwiQWxhbiBXZWIgRGVzaWduZXJcIixcInJvbGVcIjpcIjNcIixcImNyZWF0ZV9kYXRlXCI6XCIxNjc2MzczODgyXCIsXCJjcmVhdGVkX2F0XCI6XCIyMDIzLTAyLTE0IDExOjI0OjQyXCIsXCJ1cGRhdGVkX2F0XCI6XCIyMDIzLTAyLTE0IDExOjI0OjQyXCIsXCJ1c2VyX2lkXCI6XCIyMFwiLFwiZmlyc3RfbmFtZVwiOlwiQWxhblwiLFwibGFzdF9uYW1lXCI6XCJXZWIgRGVzaWduZXJcIn0iLCJpYXQiOjE2NzYzNzg0MDcsImV4cCI6MTY3NjM4MjAwNywiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn0.pUuySBLQPZLH1tlK0txN2b4dsbRUYiYGBzHSVGLNewg"
}
```


### Authenticated (Get Employees) POST METHOD

```JSON
[
  {
    "id": "9",
    "user_id": "20",
    "first_name": "Alan",
    "last_name": "Web Designer",
    "create_date": "1676373882",
    "created_at": "2023-02-14 11:24:42",
    "updated_at": "2023-02-14 11:24:42",
    "username": "alan.padiernos2",
    "role": "Web Designer"
  },
  {
    "id": "14",
    "user_id": "25",
    "first_name": "Alan",
    "last_name": "WD Test",
    "create_date": "1676378380",
    "created_at": "2023-02-14 12:39:40",
    "updated_at": "2023-02-14 12:39:40",
    "username": "alan.padiernos3",
    "role": "Web Designer"
  },
  {
    "id": "15",
    "user_id": "26",
    "first_name": "Alan",
    "last_name": "WD Test2",
    "create_date": "1676379522",
    "created_at": "2023-02-14 12:58:42",
    "updated_at": "2023-02-14 12:58:42",
    "username": "alan.padiernos4",
    "role": "Web Designer"
  }
]
```

### Authenticated (Get Employee By Id) GET METHOD

```JSON
{
  "id": "9",
  "user_id": "20",
  "first_name": "Alan",
  "last_name": "Web Designer",
  "create_date": "1676373882",
  "created_at": "2023-02-14 11:24:42",
  "updated_at": "2023-02-14 11:24:42",
  "username": "alan.padiernos2",
  "role": "Web Designer"
}
```

### Authenticated (Update Employee By Id) PUT METHOD


```JSON
{
  "id": "9",
  "user_id": "20",
  "first_name": "Alan2",
  "last_name": "Web Designer",
  "create_date": "1676373882",
  "created_at": "2023-02-14 11:24:42",
  "updated_at": "2023-02-14 13:25:47",
  "roleid": "3",
  "username": "alan.padiernos11",
  "role": "Web Designer"
}
```

### Authenticated (Update Employee By Id) PUT METHOD

```JSON
{
  "id": "9",
  "user_id": "20",
  "first_name": "Alan2",
  "last_name": "Web Designer",
  "create_date": "1676373882",
  "created_at": "2023-02-14 11:24:42",
  "updated_at": "2023-02-14 13:25:47",
  "roleid": "3",
  "username": "alan.padiernos11",
  "role": "Web Designer"
}
```

### Authenticated (Update Employee By Id) DELETE METHOD

```JSON
{
  "id": "9",
  "user_id": "20",
  "first_name": "Alan2",
  "last_name": "Web Designer",
  "create_date": "1676373882",
  "created_at": "2023-02-14 11:24:42",
  "updated_at": "2023-02-14 13:25:47",
  "roleid": "3",
  "username": "alan.padiernos11",
  "role": "Web Designer"
}
```

### Authenticated (Create Employee) POST METHOD

```JSON
{
  "id": "15",
  "user_id": "26",
  "first_name": "Alan",
  "last_name": "WD Test2",
  "create_date": "1676379522",
  "created_at": "2023-02-14 12:58:42",
  "updated_at": "2023-02-14 12:58:42",
  "username": "alan.padiernos4",
  "role": "Web Designer"
}
```


### Errors and Status Codes

If a request fails any validations, expect a 422 and errors in the following format:

```JSON
{"status":404,"error":"The requested resource was not found"}
```

#### Other status codes:

401 for Unauthorized requests, when a request requires authentication but it isn't provided

403 for Forbidden requests, when a request may be valid but the user doesn't have permissions to perform the action

404 for Not found requests, when a resource can't be found to fulfill the request

Other validation Errors

## Endpoints:

### 1. User Login
    HTTP Method: POST
    URL: /api/login

#### Request Body
    'username' = 'alan.padiernos2',
    'password' = 'P@ssw0rd'


### 2. Get Employees
    HTTP Method: GET
    URL: /api/employee
    Headers: - Authorization: "Bearer {token}"


### 3. Get Employee
    HTTP Method: GET
    URL: /api/employee/:id
    Headers: - Authorization: "Bearer {token}"

### 4. Create Employee
    HTTP Method: POST
    URL: /api/employee/
    Headers: - Authorization: "Bearer {token}"

#### Request Body
    'first_name' = 'Alan'
    'last_name' = 'WD Test2'
    'role' = '3'
    'password' = 'P@ssw0rd'
    'password_confirm' = 'P@ssw0rd'
    'username' = 'alan.padiernos4'

### 5. Update Employee
    HTTP Method: PUT
    URL: /api/employee/:id
    Headers: - Authorization: "Bearer {token}"

#### Request Url
    username = alan.padiernos14
    first_name = Alan2
    last_name = pade
    role = 3

### 5. Delete Employee
    HTTP Method: DELETE
    URL: /api/employee/:id
    Headers: - Authorization: "Bearer {token}"
