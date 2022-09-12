# GOODWILL
## FILTER USER BY TERRITORY

This tool makes it possible to set up the elected representatives of a territory in relation to a list of articles where they are mentioned. items can be articles, press, archives, administrative documents, etc.

## Features

- Filter by territory(departement, region,..)
- Search article by name of elected people.

## Tech

These technologies were used in this project:

- [Bootstrap] - organize and layout the front interface.
- [Ajax] - communication channel with api.
- [JQuery] - to interact with the user
- [Php 8.1] - data processing on the backend side
- [Doctrine] - Object Relational Mapping for manange database
- [PhpUnit] - to perform unit tests
- [Composer] - allow to install all dependencie

## Installation

This component requires [Php 8.*] to run.

Install the dependencies before to start the server.
#### Composer installation
```sh
sudo apt update
apt install composer
```

#### PHP intallation
```sh
sudo apt update
sudo apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
sudo apt install php8.0
```
#### Apache and git
```sh
apt install apache2
rm -R /var/www/html/ && cd /var/www/html
apt install git
git clone [repository_url] .
```
#### Clone projet
```sh
git clone [repository_url] .
```

#### Other step for install
- install composer
- update schema database with doctrine
- import data for demo

# Possible improvements
Several areas for improvement are possible, whether it is the architecture of the database, the search algorithm, etc...

- [Database] - The database schema could be more efficient, splitting the database by territory level rather than by type.
- [Performance] - Find a mathematical algorithm that can be integrated into the system to improve search performance.
- [Performance] - On this demo, we should untie the database of articles to a territory, (it's not good). the article must be independant. (an afterthought)
- [PHP] - PHP is not the best programmatically language for data.
- [Sql] - using stored procedures could significantly improve query processing time.

#### Consult demo
it's free host
http://217.160.44.105/basic-front.html

#### How to use demo
For example:
we want search 'emanuelle macroni' who live at PACA(1565) and an they are mentioned them in two articles: True (referer to database data).

ps: the demo is very slow but works fine and well, you should know that I use free online hosting services! thank you!
    

