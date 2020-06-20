<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### **User functionality create news and make comments**

##### **Install project:**
- need to clone project
- in root path of project in console run command **composer install**
- create mysql empty database
- create .env file and fill credentials:
    1.  DB_CONNECTION=mysql
    2.  DB_HOST=127.0.0.1
    3.  DB_PORT=3306
    4.  DB_DATABASE={{database_name}}
    5.  DB_USERNAME={{database_user}}****
    6.  DB_PASSWORD={{database_password}}
- for working auth run in root path of project in console command: **php artisan passport:install**
- for running on machine without configuration web server just run command **php artisan serve**      

**Functionality of project:**

- you can create new user, need to confirm his e-mail  
- you can login by using credentials by existing user
- create news by authenticated user
- subscribe authentificated user to news of another user
- you could add comment to any news by authenficated user, and also reply on comment


