### Install Laravel for api, frontend
1. Install and mount composer to docker container  
    $ cd api-app  
    $ docker run --rm -it -v ${PWD}:/app composer install	
    $ cd frontend-app  
    $ docker run --rm -it -v ${PWD}:/app composer install			
2. build  
    $ cd .
    $ docker-compose build --no-cache		
3. Up  
    $ docker-compose up -d  
4. check after up  
    $ docker ps		
5. Create .env file (api-app and frontend-app)  
    Copy .env.example, and change .env
6. Change API_URL at .env file  
    Please change API_URL by ip address of your computer at .evn file
7. Generate key  
    $ docker-compose exec php-api php artisan key:generate  
    $ docker-compose exec php-api php artisan cache:clear  
    $ docker-compose exec php-frontend php artisan key:generate  
    $ docker-compose exec php-frontend php artisan cache:clear  
8. Creating a Dev User and testing db  
    $ docker exec -it db-api bash   // connect by mysql workbench with port 3308
    $ mysql -u root -p  
    $ mysql> CREATE database webike_test;
    $ mysql> show databases;  
    $ mysql> CREATE USER 'devuser' identified with mysql_native_password by 'devpass';  
    $ mysql> select user, host from mysql.user;  
    $ mysql> GRANT ALL PRIVILEGES ON webike.* TO 'devuser'@'%';  
    $ mysql> GRANT ALL PRIVILEGES ON webike_test.* TO 'devuser'@'%';  
    $ mysql> FLUSH PRIVILEGES;  
    $ mysql> exit;
9. Create table for db (production) and db (testing)  
    $ docker exec -it php-api bash  
    $ composer dump-autoload  
    $ php artisan migrate:fresh --seed
10. Test site  
    localhost:8081 // API Service  
    localhost:8082 // Frontend Service  