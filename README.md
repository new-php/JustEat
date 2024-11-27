# JustEat
[![CodeFactor](https://www.codefactor.io/repository/github/ub-es-2020/justeat/badge/develop)](https://www.codefactor.io/repository/github/ub-es-2020/justeat/overview/develop)
[![Build Status](https://travis-ci.org/UB-ES-2020/JustEat.svg?branch=develop)](https://travis-ci.org/UB-ES-2020/JustEat)
[![Coverage Status](https://coveralls.io/repos/github/UB-ES-2020/JustEat/badge.svg?branch=develop)](https://coveralls.io/github/UB-ES-2020/JustEat?branch=develop)
## Requirements

- Apache

- PHP 7.4

- PHP Extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

- Composer

- MySQL Server

- NVM: Node Version Manager (node version v12.19.0)

-------

## Installation

### Windows

#### Install Git Bash ####
[Git Bash Installation Guide](https://www.stanleyulili.com/git/how-to-install-git-bash-on-windows/)

Using a Git bash terminal, follow Ubuntu installation instructions


### Ubuntu

#### Install PHP and PHP extensions ####

```bash
sudo apt install php7.4
sudo apt-cache search php | grep php7.4 | awk {'print $1'} | xargs apt install -y
```

#### Install MySQL ####
```bash
sudo apt install mysql-client mysql-server
sudo mysql_secure_installation
```
You can follow this guide up to 2nd point and use the root user for development

[MySQL Installation Guide](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04-es) or Follow these [Guide on MySQL Installation](https://docs.vultr.com/how-to-install-mysql-on-ubuntu-24-04) 

 

#### Install Composer ####
```bash
sudo apt install composer
```
If not working use:

[Composer Installation Guide](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04-es)


#### Install NVM ####
```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.36.0/install.sh | bash
```
Add following lines at the end of your **~/.bashrc** in order to load NVM
```bash
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion

```

You can follow the installation guide

[NVM Installation Guide](https://github.com/nvm-sh/nvm#installing-and-updating)

Then install the Node version specified using NVM
```bash
nvm install v12.19.0
nvm alias default v12.19.0
nvm use v12.19.0
```

-------

## Setup
```bash
cp .env.example .env # Configure .env with your details

composer install

npm install

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan passport:install
```

-------

## Compile assets
```bash
# In development
npm run dev

# In production
npm run production
```
[Frontend] On development it will be useful to run
```bash
npm run watch
# or
npm run watch-poll
```
In order to watch all relevant files for changes

-------

## Run
Serve the application on the PHP development server. [http://localhost:8000](http://localhost:8000)
```bash
php artisan serve
```

-------

## Unit Tests

In order to run your tests safely and don't break your database, create a database with name justeat_test and run
```bash
php artisan config:cache

php artisan config:clear
```

### PHPUnit
```bash
# Run all tests
php vendor/bin/phpunit

# Run tests by name
php vendor/bin/phpunit --filter methodName

# Run tests by testsuite
php vendor/bin/phpunit --testsuite "testSuiteName"
```

-------

### Dusk (TODO)
In order to run dusk tests, you have to change your environment files first.
```bash
mv .env .env.backup

mv .env.dusk .env 
# Create a database for testing and configure the database name and credentials on .env file

php artisan optimize

php artisan migrate:fresh --seed
```


```bash
php artisan serve # Needs to be run in a different terminal

# Run all tests
php artisan dusk

# Run tests by group
php artisan dusk --group=GroupName

# Run tests by name
php artisan dusk --filter methodName
```
Note: in order to make auth tests run successfully you need to run the OauthClientsSeeder and set the variables MIX_PASSPORT accordingly on your .env file, then compile the application assets

-------

## Deploy

```bash
# Only the first time

echo -e "Host deploy.staging.justeat.xavidejuan.com\n\tHostName 138.197.187.69" | tee -a ~/.ssh/config

echo -e "Host deploy.justeat.xavidejuan.com\n\tHostName 138.197.187.69" | tee -a ~/.ssh/config

# Identity file deploy_justeat not provided in the project
mv deploy_justeat ~/.ssh/
```

### Staging [https://staging-justeat.xavidejuan.com](https://staging-justeat.xavidejuan.com)

```bash
vendor/bin/dep deploy staging
```

### Production [https://justeat.xavidejuan.com](https://justeat.xavidejuan.com)

```bash
vendor/bin/dep deploy production
```
