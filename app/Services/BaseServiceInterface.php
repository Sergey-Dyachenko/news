<?php


namespace App\Services;


interface BaseServiceInterface
{
    public function all();
    public function update($id, $input);
    public function destroy($id);
    public function create(array $input);
    public function showOneByData($data);
}
