<?php
/*2) Добавить валидацию на поля (front-end и back-end):
- name: Максимальная длинна не больше 15 символов, поле обязательное.
- age: Возраст в пределах от 18 до 100, поле обязательное.*/
/**
 * Првоеряем длину имени
 * @param string $value - name
 * @param $min - minimal lenght name
 * @param $max - maximal lenght name
 * @return bool
 */
function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

/**
 * Проверяем возраст
 * @param $value - age
 * @param $min - minimal age
 * @param $max - maximal age
 * @return bool
 */
function check_age($value, $min, $max) {
    $result = ($value < $min || $value > $max);
    return !$result;
}