<?php

namespace App\Contracts;

interface EloquentModelRepository
{
    public function all();
    public function create(array $data);
    public function update($model, array $data);
    public function remove($data);
}