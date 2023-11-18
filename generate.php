<?php
error_reporting(0);

if (!class_exists('Securimage')) {
    require_once __DIR__ . '/securimage.php';
}

for ($i = 0; $i <= 100000; $i++) {
    $options = array();
    $options['captchaId'] = $i;
    $img = new Securimage($options);
    $img->perturbation = 1.0;
    $img->num_lines = random_int(3, 6);
    $img->code_length = random_int(4, 6);
    $gd_img = $img->show('', true);
    $code = $img->getCode()->code;
    $file_path = "/Users/felipe.odoni/Documents/agilepass/projects/securimage/files/" . $code . ".png";
    imagepng($gd_img, $file_path);
    echo "\r" . $i;
}
echo "\n";
