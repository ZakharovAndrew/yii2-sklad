# Yii2 SKLAD

[![Latest Stable Version](https://poser.pugx.org/zakharov-andrew/yii2-sklad/v/stable)](https://packagist.org/packages/zakharov-andrew/yii2-sklad)
[![Total Downloads](https://poser.pugx.org/zakharov-andrew/yii2-sklad/downloads)](https://packagist.org/packages/zakharov-andrew/yii2-sklad)
[![License](https://poser.pugx.org/zakharov-andrew/yii2-sklad/license)](https://packagist.org/packages/zakharov-andrew/yii2-sklad)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

CRM Sklad - Yii2 module for maintaining warehouse accounting. Supports adding various products and materials.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ composer require zakharov-andrew/yii2-sklad
```
or add

```
"zakharov-andrew/yii2-sklad": "*"
```

to the ```require``` section of your ```composer.json``` file.

Subsequently, run

```
./yii migrate/up --migrationPath=@vendor/zakharov-andrew/yii2-sklad/migrations
```

in order to create the necessary tables in your database.

Or add to console config

```php
return [
    // ...
    'controllerMap' => [
        // ...
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@console/migrations', // Default migration folder
                '@vendor/zakharov-andrew/yii2-sklad/src/migrations'
            ]
        ]
        // ...
    ]
    // ...
];
```

## Usage

Add this to your main configuration's modules array

```
    'modules' => [
        'sklad' => [
            'class' => 'ZakharovAndrew\sklad\Module',
            'bootstrapVersion' => 5, // if use bootstrap 5
            'productListTitle' => 'My Producs'
        ],
        // ...
    ],
```

## License

**yii2-sklad** it is available under a MIT License. Detailed information can be found in the `LICENSE.md`.
