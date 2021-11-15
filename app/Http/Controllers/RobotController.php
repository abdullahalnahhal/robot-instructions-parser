<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;

class RobotController extends Controller
{
    public function parse( Request $request, string $instructions)
    {
        dd($instructions);
    }
}
