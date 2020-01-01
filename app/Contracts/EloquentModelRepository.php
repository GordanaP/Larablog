<?php

namespace App\Contracts;

interface EloquentModelRepository
{
    public function create(array $data);
    public function update($model, array $data);
    public function delete($data);
}