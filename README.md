Yii2 Site Options
============

**WARNING! UNDER DEVELOPMENT**

[![Total Downloads](https://poser.pugx.org/porcelanosa/yii2-site-options/downloads)](https://packagist.org/packages/porcelanosa/yii2-site-options)

Installation
============

This document will guide you through the process of installing yii2-site-options using **composer**. Installation is a quick and
easy several step process.

> **NOTE:** Before we start make sure that you have properly configured **db** application component.


Step 1: Download using composer
-------------------------------

Add yii2-site-options to the require section of your **composer.json** file:

```PHP
{
    "require": {
        "porcelanosa/yii2-site-options": "dev-master"
    }
}
```

And run following command to download extension using **composer**:

```bash
$ php composer.phar update
```

Step 2: Configure your application
----------------------------------

Add options module to both web and console config files as follows:

```php
...
'modules' => [
    ...
    'siteOptions' => [
        'class' => 'porcelanosa\yii2siteOptions\Module',
        'layout' => '@app/modules/admin/views/layouts/main',
    ],
    ...
],
...
```

Step 3: Updating database schema
--------------------------------
After you downloaded and configured yii2-site-options, the last thing you need to do is updating your database schema by applying
the migration:

```bash
$ php yii migrate/up --migrationPath=@vendor/porcelanosa/yii2-site-options/migrations
```

Menu items
```php

['label' => Yii::t('app', 'ADMIN_NAV_STATUS_TYPES'), 'url' => ['/siteoptions/optiontypes/index']],
['label' => Yii::t('app', 'ADMIN_NAV_OPTIONS_LIST'), 'url' => ['/siteoptions/optionslist/index']],
```

