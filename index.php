<?php
/*
 * Plugin içerisinde kullanılacak Classları dahil ediyoruz.
 */
function autoload($className)
{

    $dir = __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
    $classPath = str_replace("\\", DIRECTORY_SEPARATOR, $dir);
    if (file_exists($classPath)) {
        require_once($classPath);
    }
}

//Sınıfımızı arayıp bulacak olan metotu belirliyoruz.
spl_autoload_register('autoload');

$db = new src\Database();
$products = $db->table('uyeler')->select(['ref', 'ad', 'soyad'])->where('enrid', '=', '10')->orderBy(['ad','soyad'])->limit('5')->getAll();
echo "<pre>";
print_r($products);
