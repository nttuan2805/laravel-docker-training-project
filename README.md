### Install Laravel for api, frontend
1. Stop all containers  
    $ docker container stop $(docker container ls -aq)		
2. Remove all containers after stop  
    $ docker container rm $(docker container ls -aq)		
3. Remove all images  
    $ docker rmi $(docker images -a -q) -f		
4. Install and mount composer to docker container  
    $ cd api-app  
    $ docker run --rm -it -v ${PWD}:/app composer install	
    $ cd frontend-app  
    $ docker run --rm -it -v ${PWD}:/app composer install			
5. build  
    $ cd .
    $ docker-compose build --no-cache		
6. Up  
    $ docker-compose up -d  
7. check after up  
    $ docker ps		
8. Generate key  
    $ docker-compose exec php-api php artisan key:generate  
    $ docker-compose exec php-api php artisan cache:clear  
    $ docker-compose exec php-frontend php artisan key:generate  
    $ docker-compose exec php-frontend php artisan cache:clear  
9. Creating a User for Mysql  
    $ docker exec -it db-api bash   // connect by mysql workbench with port 3308
    $ mysql -u root -p  
    $ mysql> show databases;  
    $ mysql> CREATE USER 'devuser' identified with mysql_native_password by 'devpass';  
    $ mysql> select user, host from mysql.user;  
    $ mysql> GRANT ALL PRIVILEGES ON webike.* TO 'devuser'@'%';  
    $ mysql> FLUSH PRIVILEGES;  
    $ mysql> exit;
10. Test site  
    localhost:8081 // API Service  
    localhost:8082 // Frontend Service  

### Install Laravel for Frontend
1. Stop all containers  
    $ docker container stop $(docker container ls -aq)		
2. Remove all containers after stop  
    $ docker container rm $(docker container ls -aq)		
3. Remove all images  
    $ docker rmi $(docker images -a -q) -f		
4. Install and mount composer to docker container  
    $ cd frontend-app  
    $ docker run --rm -it -v ${PWD}:/app composer install		
5. build  
    $ cd .
    $ docker-compose build --no-cache		
6. Up  
    $ docker-compose up -d  
7. check after up  
    $ docker ps		
8. Generate key  
    $ docker-compose exec php-frontend php artisan key:generate  
    $ docker-compose exec php-frontend php artisan cache:clear  
10. Access site  
    localhost:8082

### Create table and seed data
$ docker exec -it php-api bash
$ php artisan migrate:refresh --seed

### Steps
php artisan make:model Article -m  
php artisan make:seeder ArticlesTableSeeder  
php artisan make:factory ArticleFactory --model=Article
composer dump-autoload
php artisan db:seed

### Create Controllers
php artisan make:controller MstModelMakerController