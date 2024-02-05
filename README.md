# Setup

```
got clone https://github.com/Ruslan-Aliyev/job_test_laravel_mysql_fruit_order_dockerized.git
cd job_test_laravel_mysql_fruit_order_dockerized

docker-compose run --rm app cp .env.example .env
docker-compose run --rm app composer install
docker-compose run --rm app php artisan key:generate
docker-compose up -d --build
docker-compose exec app php artisan migrate
docker-compose exec app php artisan migrate:fresh --seed
```

OR

```
got clone https://github.com/Ruslan-Aliyev/job_test_laravel_mysql_fruit_order_dockerized.git
cd job_test_laravel_mysql_fruit_order_dockerized

make all
```

Rebuild: `docker-compose build --no-cache`

Stop: `docker-compose down`

# Usage

website: `localhost:8001`

phpmyadmin: `localhost:8089`

phpmyadmin's credentials: `user` / `user`

![1](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/e8c65b9a-b184-4713-b88c-3d6631f35e5b)

![2](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/481eb5a4-3c14-4a0a-97a7-4b64e0ebf286)

![3](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/1a62946b-6966-4dfb-9b7e-6bc0e64fa032)

![4](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/35b20525-2e33-4dcb-9918-35677171b7ce)

![5](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/97ad653d-a318-4604-94c6-7803ba792ec5)

![6](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/02f4bec6-9ead-40bc-8771-4b8eca5d1380)

![7](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/f4359e8e-28d5-4543-bd76-1715e037a761)

![8](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/67078739-26c6-4b3f-9ac6-dbeb3ba6da1f)

![9](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/95d5936a-dcdb-485f-9cf0-7ca59ffb896c)

![10](https://github.com/Ruslan-Aliyev/job_testjob_test_laravel_mysql_fruit_order/assets/6761422/5bb3114d-bf52-490b-868e-3a8fabb16b50)

# References

- https://github.com/Ruslan-Aliyev/Docker/tree/master/laravel
- https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter
- https://www.youtube.com/watch?v=V-MDfE1I6u0
- https://viblo.asia/p/trien-khai-laravel-ngnix-mysql-voi-docker-compose-1Je5EAo15nL
- https://forums.docker.com/t/bin-sh-useradd-not-found/129861/2
- https://discord.com/channels/1106020493292736514/1203968160114671666/1203968160114671666
