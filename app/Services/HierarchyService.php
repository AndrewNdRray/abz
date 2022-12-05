<?php


namespace App\Services;

use App\Services\BaseService;
use App\Repositories\HierarchyRepository;



class HierarchyService extends BaseService
{
    public function __construct(HierarchyRepository $repo)
    {
        $this->repo = $repo;
    }
}
