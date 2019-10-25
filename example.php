#!/usr/bin/env php

<?php

use PheRum\Paprikash\Designer;
use PheRum\Paprikash\Exceptions\DesignerException;

require __DIR__ . '/vendor/autoload.php';

$designer = new Designer();
$designer->load('https://zety.com/blog/graphic-designer-resume');

var_dump($designer->getName());    // Tom
var_dump($designer->getSurname()); // Gerencer
var_dump($designer->getAvatar());  // https://cdn-images.zety.com/authors/tom_gerencer.jpg

try {
    $designer->calc(2);

    var_dump($designer->getSalary()); // 15000
} catch (DesignerException $e) {
    var_dump($e->getMessage());
}

try {
    $designer->calc(4);
} catch (DesignerException $e) {
    var_dump($e->getMessage());  // Unsupported class [4]
}
