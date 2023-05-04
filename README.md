# Laravel Practical APP

You can register new account from this url.

http://localhost:8000/

```
#### Run Migration
php artisan migrate

#### Add env value

DB_CONNECTION=mysql
DB_HOST=YOUR_DB_HOST
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD

MAIL_MAILER=YOUR_MAILER //smpt
MAIL_FROM_ADDRESS=YOUR_FROM_MAIL_ADDRESS
MAIL_FROM_NAME="${APP_NAME}"
MAIL_DRIVER=YOUR_MAIL_DRIVER //smpt
MAIL_HOST=YOUR_MAIL_HOST //smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=YOUR_MAIL_USERNAME
MAIL_PASSWORD=YOUR_MAIL_PASSWORD
MAIL_ENCRYPTION=ssl

#### Registration API  

``` URL: api/register  
METHOD:POST  
Request Param:  
{  
      "email":"YOUR_EMAIL",  
      "name":"YOUR_NAME",  
      "gender":"GENDER",  
      "phone":"PHONE",  
      "date_of_birth":"YOUR BIRTHDAY", //day/month/year  
      "password":"PASSWORD"  
}  
  
Response Data:  
{  
    "status": 1,  
    "msg": "register_success"  
}  
  
#### Login API   
  
URL: api/login  
METHOD: POST  
Request Param  
{
  "email":"EMAIL",
  "password":"PASSWORD"
}

Response Data:
{
    "status": 1,
    "msg": "login_success",
    "user": {
        "id": 1,
        "name": "xxxx",
        "phone": "xxxx",
        "email": "xxxxx",
        "date_of_birth": "02/22/1989",
        "gender": "xxx",
        "created_at": "2023-05-04T09:38:35.000000Z",
        "updated_at": "2023-05-04T09:38:35.000000Z"
    },
    "token": "1|wR0KMNU41GOqYbviSNUYNSAfaTXJhWlcBBRgjQiY"
}

#### User List API

URL: api/users
METHOD: GET
HEADER: {
    "Accept":"application/json",
    "Authorization":"Bearer TOKEN"
}

Response Data:
{
    "users": [
        {
           "id": 1,
            "name": "xxxx",
            "phone": "xxxx",
            "email": "xxxxx",
            "date_of_birth": "02/22/1989",
            "gender": "xxx",
            "joined_at": "2023-05-04T09:38:35.000000Z",
        }
    ],
    "msg": "get_success",
    "status": 1
}

#### User Detail API

URL: api/user/ID
METHOD:GET
HEADER: {
    "Accept":"application/json",
    "Authorization":"Bearer TOKEN"
}

Response Data:
{
    "user":{
            "id": 1,
            "name": "xxxx",
            "phone": "xxxx",
            "email": "xxxxx",
            "date_of_birth": "02/22/1989",
            "gender": "xxx",
            "created_at": "2023-05-04T09:38:35.000000Z",
            "updated_at": "2023-05-04T09:38:35.000000Z",
    },
    "msg": "get_success",
    "status": 1
}

### Unit Test

php artisan test
