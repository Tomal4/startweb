<?php

function showStatusIcon($status)
{
    if ($status == 1)
    {
        return '<i class="fa fa-check color-green"></i>';
    }
    else
    {
        return '<i class="fa fa-minus color-red"></i>';
    }
}