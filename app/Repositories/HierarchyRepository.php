<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\Hierarchy;


class HierarchyRepository extends BaseRepository
{
    public function __construct(Hierarchy $model) // модель класса юзер
    {
        $this->model = $model; // в конструктор репозитория бу передаваться модель юзера
    }


}
