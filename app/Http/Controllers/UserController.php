<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserProfileRequest;
use App\Models\Position;
use App\Models\User;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PositionService;
use App\Services\UserService;
use View;


class UserController extends Controller
{
    /**
     * @var PositionService
     */
    private $positions;

    /**
     * @var UserService
     */
    private $user;

    public function __construct(PositionService $positions, UserService $user) //сюда передается нужный объект сервиса
    {
        $this->positions = $positions; //сдесь имеем доступ к сервису
        $this->user = $user;
    }

    public function index(Request $request, $id)
    {

        return view('user.index', [
            "user"         => Auth::user(),
            "position"     => $this->position->findById(session('position_id') ?? 0)
        ]);
    }

    public function edit()
    {

        return view('user.profile', [
            "user"         => Auth::user(),
            "positions"     => $this->positions->findById(session('position_id') ?? 0),
        ]);
    }

    public function update(EditUserProfileRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->update($request->all());

        $user->position()->sync($request->get('user_position'));

        return redirect()->route('user.show');
    }

    /**

     * Find record by id

     *

     * @param int $id

     * @return Model

     */
    public function show()
    {
        return view(
            'user.show', [
                $user = Auth::user(), //метод возвращает конкретную модель по айдишнику
                $position = $this->positions->all()
            ]
        );
    }

    public function create()
    {
        return view('positions.index');
    }

    public function store()
    {
        $positions = new Position();

        $positions->name = request('name');
        $positions->save();

        return redirect('positions.index');    }

}
