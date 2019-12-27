<?php

namespace App\Contracts;

interface ModelManager
{
    public function save($data);
    public function remove($data);
}