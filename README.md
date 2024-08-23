
# APIRest with SOLID principles

Example of a repository using SOLID principles in an APIRest with Laravel. The code supports the Web Notes blog article.



## Authors

- [Iván Portillo](https://www.linkedin.com/mynetwork/discovery-see-all/?usecase=PEOPLE_FOLLOWS&followMember=ivan-portillo-perez)

## Links
- [Blog](https://notasweb.me/blog/)
- [Artículo](https://notasweb.me/entrada/principios-solid-aplicado-a-una-api-rest-en-laravel)


## Requirements

- Laravel v11
- PHP v8.1
- composer v2
- MySql v8
## Installation

Install my-project with composer

```bash
  git clone https://github.com/PortilloDev/solid-api.git solidApi
  cd solidApi
  cp .env.example .env
  composer install
  php artisan key:generate
  php artisan migrate:fresh --seed
  php artisan serve

```
    
## API Reference

#### Get login

```http
  POST /api/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. i@admin.com    |
| `password` | `string` | **Required**. password |
| `device_name` | `string` | **Required**. web    |


