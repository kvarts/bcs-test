
### Запуск проекта
```shell script
docker-compose up -d
docker exec -it php composer install
docker exec -it php yii migrate --interactive=0
```

### Авторизоваться под тестовым пользователем
```shell script
curl --location --request POST 'http://localhost:8000/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "test@test.bcs",
    "password": "123456"
}'
```

### Получить список активных пользователей
```shell script
curl --location --request GET 'http://localhost:8000/v1/users' \
--header 'Authorization: Bearer tO3t4L2uHJlDJduBBhwE7Z4gBYqWNfDj'
```

### Получить пользователя по id
```shell script
curl --location --request GET 'http://localhost:8000/v1/users/1' \
--header 'Authorization: Bearer tO3t4L2uHJlDJduBBhwE7Z4gBYqWNfDj'
```

### Создать пользователя 
```shell script
curl --location --request POST 'http://localhost:8000/v1/users' \
--header 'Authorization: Bearer tO3t4L2uHJlDJduBBhwE7Z4gBYqWNfDj' \
--header 'Content-Type: application/json' \
--data-raw '{
    "username": "Test3",
    "password": "123456",
    "email": "test-3@test.bcs"
}'
 ```

### Изменить пользователя по id
```shell script
curl --location --request PUT 'http://localhost:8000/v1/users/3' \
--header 'Authorization: Bearer tO3t4L2uHJlDJduBBhwE7Z4gBYqWNfDj' \
--header 'Content-Type: application/json' \
--data-raw '{
    "username": "Test7",
    "password": "1234567",
    "email": "test-7@test.bcs"
}'
 ```

### Удалить пользователя по id
```shell script
curl --location --request DELETE 'http://localhost:8000/v1/users/3' \
--header 'Authorization: Bearer tO3t4L2uHJlDJduBBhwE7Z4gBYqWNfDj'
 ```



