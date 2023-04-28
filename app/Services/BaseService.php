<?php

namespace App\Services;
use App\Interfaces\BaseServiceInterface;

abstract class BaseService implements BaseServiceInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store($data = [])
    {
        return $this->getModel()->create($data);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->getModel()->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->getModel()->destroy($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data = [])
    {
        return $this->findById($id)->update($data);
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return app($this->model());
    }
}
