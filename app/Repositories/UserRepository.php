<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Collection;


class UserRepository extends BaseRepository
{
    public function __construct(User $model) // модель класса юзер
    {
        $this->model = $model; // в конструктор репозитория бу передаваться модель юзера
    }

    public function activeUsersCount()
    {
        return $this->model->where("type", "user")->where("status", "active")->count();
    }

    public function getNotAdminUsers()
    {
        return $this->model->where("type", "<>", "admin")->get();
    }

}

