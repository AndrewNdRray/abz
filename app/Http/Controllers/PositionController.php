<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Services\PositionService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * @var PositionService
     */
    private $positions;

    /**
     * @var User
     */

    public function __construct(
        PositionService $positions
    ) {
        $this->positions = $positions;
    }

    public function index(Request $request)
    {
        $positions = Position::with('users', 'position_id')->get();

        return view('positions.index', ["positions" => $positions]);
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

        return redirect('positions.index');
    }

}

