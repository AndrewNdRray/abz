<?php


namespace App\Services;

use App\Services\BaseService;
use App\Repositories\PositionRepository;

class PositionService extends BaseService //в сервисы передаем необходимый репозиторий для работы
{
    public function __construct(PositionRepository $repo)
    {
        $this->repo = $repo;
    }
}
