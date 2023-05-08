# CRUD Operation Using CodeIgniter 4 + SmartAdmin Theme  + Javascript/Jquery + MySql

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Database Table

Run this MySql Query in your database. 

`CREATE TABLE users (
	id int(11) NOT NULL AUTO_INCREMENT,
	role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
	first_name varchar(250) NOT NULL,
	last_name varchar(250) NOT NULL,
	email varchar(250) NOT NULL,
	mobile varchar(250) NOT NULL,
	username varchar(250) NOT NULL,
	password varchar(250) NOT NULL,
	is_active ENUM('0', '1') NOT NULL DEFAULT '1',
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	deleted_at TIMESTAMP NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB`

## Run your project

To run your project use `php spark serve` command in your terminal and run `http://localhost` in your browser.

