<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepositoryInterface;



abstract class BaseRepository  implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;


    public function all()
    {
        return $this->model->all();
    }

    public function allWithRelation($relation)
    {
        return $this->with($relation)->get();
    }

    public function oneWithRelation($relation, $id)
    {
        return $this->model->where('id', $id)->with($relation)->first();
    }

    /**
     * @param array $data
     * @return mixed
     */

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $request
     * @param $id
     * @return mixed
     */

    public function update($request, $id)
    {
        $record = $this->model->find($id);
        $record->update($request);
        return $record;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @param $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function withCountRelation($relations)
    {
        return $this->model->withCount($relations);
    }

    public function countAll()
    {
        return $this->model->all()->count();
    }

    public function showOneByData($data)
    {
        return $this->model->where($data)->first();
    }


}

