<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PositionService;
use App\Services\UserService;

class AdminController extends Controller
{
    /**
     * @var UserService
     */
    private $users;
    private $positions;

    public function __construct(PositionService $positions, UserService $users)
    {
        $this->positions = $positions;
        $this->users = $users;
    }

    public function index(Request $request)
    {

        return view('admin.admin_main',
            [
                "positionsCount" => $this->positions->count(),
                "usersCount" => $this->users->activeUsersCount(),
            ]
        );
    }


}
