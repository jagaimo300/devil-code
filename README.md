# My Homepage

https://devil-code.com

## Stack

- [CakePHP Ver. 4~](https://cakephp.org/) - A powerful and efficient PHP web application framework that follows MVC principles, simplifies development with conventions, and provides features such as ORM, form handling, and security components.

- [Bootstrap](https://getbootstrap.com/) - A css framework that helps developers create attractive and responsive websites by providing pre-built design components and a responsive grid system.

## Development directory structure

```
├─docker
│  ├─phpmyadmin
│  │  └─sessions
│  ├─mysql
│  │  └─my.cnf
│  └─php
│      └─Dockerfile
├─html(CakePHP App)
│
└─docker-compose.yml
```

## Usage

Make directory to store phpMyAdmin container's session data.

```
cd docker && mkdir phpmyadmin && mkdir phpmyadmin/sessions
```

Rename .env.example to .env and edit it.

```
WEB_PORT=8888

DB_NAME=your_dbname
DB_USER=your_name
DB_PASS=Pass1234
DB_PORT=8810

PMA_USER=your_name
PMA_PASS=Pass1234
PMA_PORT=8889
```

Start docker compose

```
docker-compose up d
```

Install composer to html directory(docker container)
```
docker exec -it <php container ID> && composer install
```
