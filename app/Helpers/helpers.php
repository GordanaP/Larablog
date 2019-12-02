<?php

function getChecked($value_1, $value_2)
{
    return $value_1 == $value_2 ? 'checked' : '';
}

function getSelected($value_1, $value_2)
{
    return $value_1 == $value_2 ? 'selected' : '';
}

function getActiveClass($value1, $value2)
{
    return $value1 == $value2 ? 'active' : '';
}

