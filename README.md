# Takahiro's Homepage

https://devil-code.com

## Stack

- [CakePHP Ver. 4~](https://cakephp.org/) - A powerful and efficient PHP web application framework that follows MVC principles, simplifies development with conventions, and provides features such as ORM, form handling, and security components.

- [Bootstrap](https://getbootstrap.com/) - A css framework that helps developers create attractive and responsive websites by providing pre-built design components and a responsive grid system.

## Development directory structure

```
├─dockersdf
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

Install composer to html directory

```
cd html && composer install
```

Start docker compose

```
docker-compose up d
```
