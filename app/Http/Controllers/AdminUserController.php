<?php

namespace App\Http\Controllers;

use App\Models\Hierarchy;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;
use App\Services\PositionService;
use View;
use Helper;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class AdminUserController extends Controller
{

    /**
     * @var UserService
     */
    private $users;

    /**
     * @var PositionService
     */
    private $positions;
    /**
     * @var Hierarchy
     */
    private $hierarchy;

    public function __construct(UserService $users, PositionService $positions, Hierarchy $hierarchy) //сюда передается нужный объект сервиса
    {
        $this->users = $users; //сдесь имеем доступ к сервису
        $this->positions = $positions;
        $this->hierarchy = $hierarchy;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        /** @var UserPosition $userPosition */
        return view('admin_user.index',
            [
                "users" => $this->users->getNotAdminUsers(),
                "positions" => $this->positions->all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_user.create',
            [
                "users" => $this->users->all(),
                "positions" => $this->positions->all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        /** @var User $user */
        $user = $this->users->create($request->all());
        $user->position()->sync($request->get('positions'));

        return redirect()->route('users.show', ["user" => $user])->withSuccess('User #' . $user->id . 'was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return view(
            'admin_user.show',
            ["user" => $this->users->findById($id)] //метод возвращает конкретную модель по айдишнику
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin_user.edit',
            [
                "user" => $this->users->findById($id), //метод возвращает конкретную модель по айдишнику

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        /** @var User $user */
        $user->update($request->except(['_method', '_token', 'project_id']));
        $user->position()->sync($request->get('position_id'));


        return redirect()->route('users.show', ["user" => $user])->withSuccess('User #' . $user->id . 'was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->users->destroy($id);
        return redirect()->route('users.index')->withSuccess('User #' . $id . 'was deleted!');
    }


}
