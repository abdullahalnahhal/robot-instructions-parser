<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Services\RobotService;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\RobotParseRequest;

class RobotController extends Controller
{
    /**
     * @var RobotService $service
     */
    private $service;

    /**
     * [__construct instantiate the controller]
     *
     * @param RobotService $service
     */
    public function __construct(RobotService $service)
    {
        $this->service = $service;
    }

    /**
     * [parse parsing the instructions]
     *
     * @param Request $request
     * @return void
     */
    public function parse(RobotParseRequest $request)
    {
        $instructions = strtolower($request->instructions);
        $parse = $this->service->parse($instructions);

        dd($parse);
    }
}
