# Laravel Movie App with CRUD Functionalities

Simple movie system that records, updates, views, and delete movies.

## Description

1. list all movies with Name, Year of release, Producer and all Actors of that movie
2. add a new movie with the necessary fields with existing actors and producers. If the user wants to
add new ‘Actors’ and ‘Producers’ while creating the movie which are not present in the database, then he should
be able to do so while being on the same screen.
3. user able to click on a movie and view all the details of the movie.
4. user able to click on ‘Edit’ and edit all the details of the movie & save it.
5. user able to to click on ‘Delete’; pop­up a confirm message (Yes/No) for the user and if the
user clicks ‘Yes’ delete the movie from the Db.
6. Adding / Editing / Deleting a movie takes the user back to the ‘Listing’ screen with a notification message.

## Getting Started

### Dependencies

* php 8.1.8
* composer 2.3.10
* docker (preferably latest version)

### Installing

* Download and install php 8.1.8 . For reference: https://kinsta.com/blog/install-php/
* Download docker from https://docs.docker.com
* Download and install composer from https://getcomposer.org/download/
* cd to cloned project and run `composer install` 

### Executing program

* After running `composer install` , run `./vendor/bin/sail up` to build the application containers on your machine. Might take awhile for the first time
* After containers are built, run `docker container ps` and make sure all our containers are running.
* Run `docker exec -it laravel_app_movie-laravel.test-1 bash` to get into our laravel app container
* run `php artisan migrate` to migrate (create) our database tables from the migration files
* run `docker container ps` and look for our sail-8.1/app on container laravel_app_movie-laravel and look for the port it's running on.
* enter the address the app is on in your web browser and you're good to go!

