<?php


namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService
{
    /**
     * Repository
     *
     * @var Repository
     */
    public $repo; //будет использоваться в классах сервисов

    /**
     * Get all data
     *
     * @return Collection
     */
    public function all()//: Collection
    {
        return $this->repo->all(); //(обращается к методу all нашего репозитория)метод all будет возвращать все данные из таблицы
    }

    /**
     * Create new record
     *
     * @param array $input
     * @return model
     */
    public function create(array $data)//: Model //возвращает модель
    {
        return $this->repo->create($data); //обращается внутри себя к методу create репозитория
    }

    /**
     * Find record by id
     *
     * @param int $id
     * @return Model
     */
    public function findById($id)
    {
        return $this->repo->findById($id);
    }

    /**
     *
     * @param integer $id
     * @param array @data
     * @return boolean
     */
    public function update(string $id, array $data)//: bool
    {
        return $this->repo->update($id, $data);
    }

    /**
     * Delete record by id
     *
     * @param integer $id
     * @return boolean
     */
    public function destroy(string $id)//: bool
    {
        return $this->repo->destroy($id);
    }

    /**
     * Count records
     *
     * @param integer
     */
    public function count()//: int
    {
        return $this->repo->count();
    }

}
