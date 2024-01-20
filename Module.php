<?php

/**
 * Yii2 Sklad
 * *************
 * Yii2 module for maintaining warehouse accounting. Supports adding various products and materials.
 *  
 * @link https://github.com/ZakharovAndrew/yii2-sklad/
 * @copyright Copyright (c) 2024 Zakharov Andrew
 */
 
namespace ZakharovAndrew\sklad;

use Yii;

/**
 * User module
 */
class Module extends \yii\base\Module
{    
    /**
     * @var string Module version
     */
    protected $version = "0.0.1";

    /**
     * @var string Alias for module
     */
    public $alias = "@sklad";
    
    /**
     * @var string version Bootstrap
     */
    public $bootstrapVersion = '';
    
    /**
     *
     * @var string source language for translation 
     */
    public $sourceLanguage = 'en-US';
    
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ZakharovAndrew\sklad\controllers';

    /**
     * {@inheritdoc}
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }
    
    /**
     * Registers the translation files
     */
    protected function registerTranslations()
    {
        Yii::$app->i18n->translations['extension/yii2-sklad/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => $this->sourceLanguage,
            'basePath' => '@vendor/zakharov-andrew/yii2-sklad/src/messages',
            'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation'],
            'fileMap' => [
                'extension/yii2-sklad/user' => 'sklad.php',
            ],
        ];
    }

    /**
     * Translates a message. This is just a wrapper of Yii::t
     *
     * @see Yii::t
     *
     * @param $category
     * @param $message
     * @param array $params
     * @param null $language
     * @return string
     */
    public static function t($message, $params = [], $language = null)
    {
        $category = 'sklad';
        return Yii::t('extension/yii2-sklad/' . $category, $message, $params, $language);
    }
    
}
