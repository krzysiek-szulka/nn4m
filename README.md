To run the application following steps needs to be done:

1. Clone the repository to local machine and go into the project directory
2. Run `mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache` to create required directories
3. Make storage writable: `chmod -R 777 storage/`
4. Run `docker-compose up` to setup environment and install dependencies
5. Once installed, in another terminal run `docker exec -it nn4m_php_1 /bin/bash` to login to container
6. Inside container, migrate the database: `php artisan migrate`
7. Run `vendor/bin/phpunit --coverage-html coverage-dir` to run the tests
8. Type `exit` to go out from the container


The application is available on http://localhost:8080

There is one URL available via browser:
http://localhost:8080/store/import
where you can upload an XML file to import the stores.


There are 4 API endpoints available:

GET http://localhost:8080/api/stores

GET http://localhost:8080/api/stores/{:store_number}

GET http://localhost:8080/api/errors

GET http://localhost:8080/api/errors/{:store_id}
