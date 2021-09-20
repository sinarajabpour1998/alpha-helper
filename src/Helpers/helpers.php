<?php

function integerToken($length = 5) {

    return AlphaHelper::integerToken($length);
}

function stringToken($length = 16, $characters = '2345679acdefghjkmnpqrstuvwxyz') {

    return AlphaHelper::stringToken($length, $characters);
}

function digitsToEastern($number) {

    return AlphaHelper::digitsToEastern($number);
}

function easternToDigits($number) {

    return AlphaHelper::easternToDigits($number);
}

function isActive($key, $activeClassName = 'active') {

    return AlphaHelper::isActive($key, $activeClassName);
}

function prepareInteger($input) {

    return AlphaHelper::prepareInteger($input);
}

function prepareSlug($slug, $title, $model) {

    return AlphaHelper::prepareSlug($slug, $title, $model);
}

function prepareMetaDescription($input) {
    return AlphaHelper::prepareMetaDescription($input);
}

function encryptString($stringData) {
    return AlphaHelper::encryptString($stringData);
}

function decryptString($encryptedString) {
    return AlphaHelper::decryptString($encryptedString);
}

function hashMobile($stringMobile) {
    return AlphaHelper::hashMobile($stringMobile);
}
