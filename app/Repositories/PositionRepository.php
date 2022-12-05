<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\Position;


class PositionRepository extends BaseRepository
{
    public function __construct(Position $model) // модель класса юзер
    {
        $this->model = $model; // в конструктор репозитория бу передаваться модель юзера
    }

}
