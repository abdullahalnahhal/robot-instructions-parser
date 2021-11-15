<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;
use App\Templates\RobotTemplate;

class RobotService
{
    /**
     * [robot variable]
     *
     * @var RobotTemplate
     */
    protected $robot;

    /**
     * [__construct function instantiate service properties]
     *
     * @param RobotTemplate $robot
     */
    public function __construct(RobotTemplate $robot)
    {
        $this->robot = $robot;
    }
    /**
     * [f function returns forward string]
     *
     * @return string
     */
    private function f()
    {
        return "forward";
    }

    /**
     * [b function returns backward string]
     *
     * @return string
     */
    private function b()
    {
        return "backward";
    }

    /**
     * [l function returns left string]
     *
     * @return string
     */
    private function l()
    {
        return "left";
    }

    /**
     * [r function returns right string]
     *
     * @return string
     */
    private function r()
    {
        return "right";
    }


    /**
     * [parse function parses the instructions of the robot]
     *
     * @param string $instructions
     * @return void
     */
    public function parse(string $instructions):RobotTemplate
    {
        $instructions = str_split($instructions);

        foreach($instructions as $instruction){
            $instruction = $this->{$instruction}();
            $this->robot->{$instruction}();
        }

        return $this->robot;
    }
}
