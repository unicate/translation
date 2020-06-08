# Translation

File based translation for use in Views.


### Installation

Use composer:

```
composer require unicate/translation
```

### Usage

```php
<?php

require_once "vendor/autoload.php";
$data = [
    'en' => [
        'test.token1' => 'Token Text EN 1',
        'test.token2' => 'Token Text EN 2',
    ],
    'de' => [
        'test.token1' => 'Token Text DE 1',
        'test.token2' => 'Token Text DE 2',
    ],
];

$translation = new \Unicate\Logger\Translation($data);
$translation->setLang('en');
$text = $translation->translate('test.token1');
echo $text; // 'Token Text EN 1'

$translation = new \Unicate\Logger\Translation($data, 'de');
$text = $translation->translate('test.token1');
echo $text; // 'Token Text DE 1'
```

Translations in File...
```
// data.php
<?php
return [
   'en' => [
       'test.token1' => 'Token Text EN 1',
       'test.token2' => 'Token Text EN 2',
   ],
   'de' => [
       'test.token1' => 'Token Text DE 1',
       'test.token2' => 'Token Text DE 2',
   ],
];
```

Other PHP file...
```
$data = require 'data.php';
$translation = new \Unicate\Logger\Translation($data);
$translation->setLang('en');
$text = $translation->translate('test.token1');
echo $text; // 'Token Text EN 1'

```