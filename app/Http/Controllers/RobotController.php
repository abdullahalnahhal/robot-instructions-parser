<?php

namespace App\Http\Controllers;

use App\Services\RobotService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\RobotParseRequest;
use App\Templates\RobotTemplate;

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

    private function parseFile(RobotTemplate $robot)
    {
        $text = "Final Position : \n ------ \n";
        $text .= "X = ".$robot->position['x'].", Y = ".$robot->position['y']."\n ------ \n";
        $text .= "\nFinal Position : \n ------ \n".implode(', ', $robot->literal_history)."\n ------ \n";

        $counter = 0;

        $text .= "\nFull History : \n ------ \n";

        foreach($robot->history as $instruction){
            $text .= $counter + 1 .") X = ".$instruction['x'].", Y = ".$instruction['y']."\n";
        }

        Storage::disk('public')->put('positions/position-'.uniqid().'.txt', $text);
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
        $robot = $this->service->parse($instructions);
        $this->parseFile($robot);
        $old_files = Storage::disk('public')->allFiles('positions');
        return view('welcome', [
            'robot' => $robot,
            'instructions' => $request->instructions,
            'old_files' => $old_files
        ]);
    }
}
