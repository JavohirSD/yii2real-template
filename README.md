
# yii2real-template

[![N|Solid](https://camo.githubusercontent.com/bc297786b444bcfc0e70d18bdee8c503f7399e47/68747470733a2f2f7777772e7969696672616d65776f726b2e636f6d2f66696c65732f6c6f676f2f7969692e706e67)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Enhanced Yii2 Advanced project template for quick launching products with universal extensions and completed configurations.

  - Reliable framework
  - Advanced template
  - Quick start

# Features:

  - `yii init` executed.
  - `yii migrate` executed.
  -  advanced `htaccess` template added in frontend | backend | api applications
  - Pretty url enabled (no web/forntend in url)
  - Admin LTE 3 installed for backend.
  - Admin LTE 3 bootstrap and css files enhanced(icons/sidebar/buttons) 
  - Universal and multifunctional dashboard for adminPanel
  - Visitors monitoring menu created for adminPanel. (IP Blocker / VPN,Tor,Proxy detector)
  - TinyMCE installed (asyncronously upload files on drag&drop)
  - Responsive Filemanager plugin installed and configured for TinyMCE
  - Crop/Scale/Rotate images before uploading
  - Compressing images with `Imagine` before upload configured/installed
  - Delete image files on $model->delete()
  - `i18n` configured for @frontend and @backend
  - Translation menu created for backend admin panel.
  - SEO optimisation menu created for backend admin panel.
  - `codemix` pretty locale url installed and configured
  - News controller and model ready to use (also views are created)  
  - Captcha action enabled for admin/login page
  - Enhanced Gii code generation modules for views and controllers
  - All controllers implemented to AppController for behavior rules
  - Project timeZone set to Asia/Tashkent `common/config/main.php`
  - Versioned REST API module created and configured.
  - Bearer authorization and AccessToken exchanging configured for API module



### Installation

Yii2-Real Template requires [Apache](https://apache.org/) or [Ngnix](https://ngnix.org/) installed server to run.

1. Clone repository to your server
2. Import or create database template (`yii2real_db.sql`)
4. Enjoy.

### Defaults

Admin panel: `example.com/driver`

Default login and password: `superdriver`

### For manually installing or updating extensions
Via composer:
```sh
$ composer require "hail812/yii2-adminlte3=~1.1"
$ composer require 2amigos/yii2-tinymce-widget:~1.1
$ composer require codemix/yii2-localeurls
$ composer require --prefer-dist yiisoft/yii2-imagine
```
### Additional information
The template includes three tiers: front end, back end, console, and api each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```


### Author
 - Abdirasulov Javohir 
 - Telegram: https://t.me/JavohirSD
 - Gmail:    alienware7x@gmail.com 


License
----

**Free and open source project template for everyone, Good luck!**
