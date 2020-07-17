# ModuleTests Project

## Installation
### Cloning the repository

Clone this project into your working directory. We recommend always running the master branch as it was frequent contributions.

```bash
$ git@github.com:AdrienGeoorge/moduleTests_project.git

Cloning into 'moduleTests_project'...
remote: Counting objects: 4794, done.
remote: Total 4794 (delta 0), reused 0 (delta 0)
Receiving objects: 100% (4794/4794), 1.59 MiB | 10.37 MiB/s, done.
Resolving deltas: 100% (2314/2314), done.
Checking connectivity... done.

```
### Docker
This project is very easy ton install in a Docker container
By default, the apache docker will expose port in 8010, so change this with in docker-compose.yml and here are the steps to follow, When ready
```bash
$ mv .env.test .env
  docker-compose up --build 
  docker-compose exec web php bin/console doctrine:database:create
  docker-compose exec web php bin/console doctrine:migration:migrate
  docker-compose exec web php bin/console doctrine:fixtures:load 
```
### Quick start
Access at the website on http://localhost:8010/contact/

#### Execute PHPUnit test
```bash
$ docker-compose exec web ./bin/phpunit
PHPUnit 7.5.20 by Sebastian Bergmann and contributors.
Testing Project Test Suite
.................                       17 / 17 (100%)
Time: 1.3 seconds, Memory: 8.00 MB
OK (17 tests, 19 assertions)
```
