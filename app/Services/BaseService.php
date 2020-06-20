<?php


namespace App\Services;


abstract class BaseService implements BaseServiceInterface
{
    protected $repo;

    public function all()
    {
        return $this->repo->all();
    }

    public function update($input, $id)
    {
        return $this->repo->update($input, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }

    public function create(array $input)
    {
        return $this->repo->create($input);
    }

    public function showOneByData($data)
    {
        return $this->repo->showOneByData($data);
    }

}
