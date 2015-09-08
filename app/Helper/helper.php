<?php
function setActive($url, $activeClass = 'active')
{
    return $url == Request::fullUrl() ? $activeClass : false;
}