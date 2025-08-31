<?php

defined('REGEX') or define('REGEX', [
    'URL' => '/^(https?:\/\/)?(www\.)?[a-zA-Z0-9\-\_]+\.[a-zA-Z]{2,}((\/|[a-zA-Z0-9\-\@\,\_]+|\/)+)?(\?[a-zA-Z0-9\-\+\@\_]+(\=)?[a-zA-Z0-9\-\+\@\_]+)?((\&[a-zA-Z0-9\-\+\@\_]+(\=)?[a-zA-Z0-9\-\+\@\_]+)?)+$/',
    'BRAND_INDEX' => '[a-z0-9]+(_?[a-z0-9]+)?$',
]);
defined('JS_HELPERS') or define('JS_HELPERS', 'https://cdn.jsdelivr.net/gh/yottaline/helpers@1.2.0');

defined('CAT_AGE') or define('CAT_AGE', ['baby', 'mini', 'kid', 'teen', 'adult']);
defined('CAT_GENDER') or define('CAT_GENDER', ['unisex', 'male', 'female']);
