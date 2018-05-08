<?php
/**
 * Created by PhpStorm.
 * User: mahruskh
 * Date: 08/05/18
 * Time: 9:20
 */

$s = [2,1,6,9,4,3];

$second = array_values(array_unique($s));
rsort($second);
var_dump($second[1]);

$max = max($s);
$second = null;
foreach ($s as $value) {
    if ($value < $max && $value > $second ){
        $second = $value;
    }
}
var_dump($second);