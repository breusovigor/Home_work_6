<?php
/*2) Добавить валидацию на поля (front-end и back-end):
- name: Максимальная длинна не больше 15 символов, поле обязательное.
- age: Возраст в пределах от 18 до 100, поле обязательное.*/
/**
 * Function for validation lengt name
 * @param string $value - value of name
 * @param $min - minimal lenght name
 * @param $max - maximal lenght name
 * @return bool
 */
function checkLength($value = "", $min, $max) {
    $stringLenght = mb_strlen($value);
    $result = ($stringLenght < $min || $stringLenght > $max);
    return !$result;
}

/**
 * Function for validation age
 * @param $value - value of age
 * @param $min - minimal age
 * @param $max - maximal age
 * @return bool
 */
function checkAge($value, $min, $max) {
    $result = ($value < $min || $value > $max);
    return !$result;
}