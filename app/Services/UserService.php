<?php


namespace App\Services;

use App\Services\BaseService;
use App\Repositories\UserRepository;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class UserService extends BaseService
{
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function activeUsersCount()//: int
    {
        return $this->repo->activeUsersCount(); //этот метод вызывается из UserRepository
    }

    public function getNotAdminUsers()//: Collection
    {
        return $this->repo->getNotAdminUsers();
    }

    public function create(array $data)//: Model
    {
        $data['password'] = Hash::make($data['password']);
        return $this->repo->create($data);
    }



}
