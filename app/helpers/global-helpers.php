<?php

function navSetActive($route, $class = 'active') {
    return (Route::currentRouteName() == $route) ? $class : '';
}
