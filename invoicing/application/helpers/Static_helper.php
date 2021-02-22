<?php

function dd($arr) {
    if ($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}

function now() {
    return date('Y-m-d H:i:s');
}

function dateFormat($date, $format = "Y-m-d H:i:s") {
    return date($format, strtotime($date));
}

function checkSession() {
    $CI = & get_instance();
    $emp = $CI->session->userdata('employee');
    if (!$emp) header('Location: /login');
}

function get_employee($key = "") {
    $CI = & get_instance();
    if ($key) {
        return $CI->session->userdata('employee')[$key];
    }
    return $CI->session->userdata('employee');
}