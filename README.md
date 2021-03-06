
# yii2real-template

[![N|Solid](https://camo.githubusercontent.com/bc297786b444bcfc0e70d18bdee8c503f7399e47/68747470733a2f2f7777772e7969696672616d65776f726b2e636f6d2f66696c65732f6c6f676f2f7969692e706e67)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Enhanced Yii2 Advanced project template for quick launching products with universal extensions and completed configurations.

  - Reliable framework
  - Advanced template
  - Quick start

# Features:

## v 1.0.0
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
 ## v 1.2.0
  - SEO optimisation menu created for backend admin panel.
  - `codemix` pretty locale url installed and configured
  - News controller and model ready to use (also views are created)  
  - Captcha action enabled for admin/login page
  - Enhanced Gii code generation modules for views and controllers
  - All controllers implemented to AppController for behavior rules
  - Project timeZone set to Asia/Tashkent `common/config/main.php`
  - Versioned REST API module created and configured.
  - Bearer authorization and AccessToken exchanging configured for API module
 ## v.1.3.0
  - REST API url rules and routes simplified
  - Date format changed to dd.mm.yyyy in GridView
  - Added summary navbar for GridView results
  - Added button for deleting model image in forms
  - Resized width of attributes and values of DetailView
  - Added model image preview in view action (DetailView)
  -  Added <span> tag for TinyMce `extended_valid_elements`
  - included missing namespace "yii\web\UploadedFile" in controllers
  - included missing namespace "yii\imagine\Image" in model
  - Absolute file paths replaced to aliases
  - Added printMeta() function for registering og and twitter meta tags
  - File deleting optimised and safed by Gii (actionDelete, actionRmfile, actionRemover)
  - Fixed image cropper bugs and performance optimised
## v.2.0.1
  - ResponsiveFileManager`s security improved
  - Seo,User,News model/controllers optimised and bugs fixed
  - Editable created_date in forms with jQuery.inputmask
  - Restricted execution of  URLs ending with .php (htaccess)
  - URLs ending with /backend/web restricted (htaccess)
  - Addd icon of SEO on top of sidebar
  - Fixed file deletion bugs in Gii generated controllers
  - Added lubosdz/yii2-captcha-extended (ex: site/contact)
  - Deleted unused asset files (was: 330Mb, now: 190Mb)
  - Fixed custom i18n dictionary bugs
  - Fixed backend assets url
  - Fixed GridView/ListView mobile responsiveness
  - Admin panel forms converted to BS4 and field validations fixed
  - ``bizley/migration`` installed to generate migrations automatically
  - Added DropDown data status filter to index action's GridView (By Gii)
  - Added confirmation alert for delete actions
  - CRUD buttons of view action modified and redesigned
  - In GridView and DetailView null values replaced to empty string

### Installation

Yii2-Real Template requires [Apache](https://apache.org/) or [Ngnix](https://ngnix.org/) installed server to run.

1. Clone repository to your server
2. Import database template (`yii2real_db.sql`)
4. Enjoy.

### Defaults

Front end    `example.com/`
  
Admin panel: `example.com/driver/{ControllerName}`
  
REST API:    `example.com/api/v1/{ControllerName}`
  
Default login and password: `superdriver`

### For manually installing or updating extensions
Via composer:
```sh
$ composer require "hail812/yii2-adminlte3=~1.1"
$ composer require 2amigos/yii2-tinymce-widget:~1.1
$ composer require codemix/yii2-localeurls
$ composer require --prefer-dist yiisoft/yii2-imagine
$ composer require bizley/migration
$ composer require "lubosdz/yii2-captcha-extended" : "~1.0.0"
```
### Additional information
The template includes four tiers: Front end, Back end, Console, and API each of which
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
