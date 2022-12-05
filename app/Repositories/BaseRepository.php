<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseInterface;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseInterface //создали абстрактный класс со стандартными методами, который бу наследовать в конкретном репозитории
    // а там уже будем реализовывать дополнительные методы
{
    protected $model;

    public $sortBy    = 'id';  // sortby - описывает поле, по которому соритируем
    public $sortOrder = 'desc';  // sortOrder - порядок сортировки(desc - от последнего к первому)

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()  //<-реализация метода all
    {
        return $this->model->query()
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    public function create(array $data)  //добавление в базу данных
    {
        return $this->model->query()->create($data); //возвращаем созданную модель данных
    }

    public function update(int $id, array $data)  //id поля и данные, которые бу обновлять
    {
        $query = $this->model->query()->where('id', $id); //обращаемся к модели, где('id', $id) айди равен айдишнику, и методом first извлекаем эту запись(модель)
        return $query->update($data); //на этой модели методом апдейт передаем данные, которые хо обновить
    }

    public function destroy(int $id)
    {
        $this->model->destroy($id);
        return true;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function findById($id)
    {
        return $this->model->query()->find($id);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(Model $model)
    {
        $this->model = $model; //сетим модель
        return true; //возвращаем модель
    }

}
