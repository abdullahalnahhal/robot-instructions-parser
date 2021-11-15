<?php

namespace App\Templates;

use Exception;

class RobotTemplate
{

    /**
     * [$position_x presents the last robot position at X access]
     *
     * @var integer
     */
    private $position_x = 0;

    /**
     * [$position_y presents the last robot position at Y access]
     *
     * @var integer
     */
    private $position_y = 0;

    /**
     * [literal_instructions variable has an array of instructions such as forward,backward, ...etc]
     *
     * @var array
     */
    private $literal_instructions = [];

    /**
     * [characteristic_instructions variable has an array of instructions such as f,l, ...etc]
     *
     * @var array
     */
    private $characteristic_instructions = [];

    /**
     * [position_history variable has an array of position_history such as [1,2], [5,6], ...etc]
     *
     * @var array
     */
    private $position_history = [];

    /**
     * [setHistory function inserts current location into position_history array]
     *
     * @return void
     */
    private function setHistory():void
    {
        $this->position_history[] = ['x' => $this->position_x, 'y' => $this->position_y];
    }

    /**
     * [forward function increase the Y axis by one]
     *
     * @return void
     */
    public function forward():void
    {
        $this->position_y = $this->position_y + 1;
        $this->literal_instructions[] = 'forward';
        $this->characteristic_instructions[] = 'f';
        $this->setHistory();
    }

    /**
     * [forward function decrease the Y axis by one]
     *
     * @return void
     */
    public function backward():void
    {
        $this->position_y = $this->position_y - 1;
        $this->literal_instructions[] = 'backward';
        $this->characteristic_instructions[] = 'b';
        $this->setHistory();
    }

    /**
     * [forward function increase the X axis by one]
     *
     * @return void
     */
    public function right():void
    {
        $this->position_x = $this->position_x + 1;
        $this->literal_instructions[] = 'right';
        $this->characteristic_instructions[] = 'r';
        $this->setHistory();
    }

    /**
     * [forward function decrease the X axis by one]
     *
     * @return void
     */
    public function left():void
    {
        $this->position_x = $this->position_x - 1;
        $this->literal_instructions[] = 'left';
        $this->characteristic_instructions[] = 'l';
        $this->setHistory();
    }

    /**
     * [getPosition function returns the current position of the robot]
     *
     * @return array
     */
    public function getPosition():array
    {
        return ['x' => $this->position_x, 'y' => $this->position_y ];
    }

    /**
     * [getLiteralInstructions function returns the literal instructions of the robot]
     *
     * @return array
     */
    public function getLiteralInstructions():array
    {
        return $this->literal_instructions;
    }

    /**
     * [getCharacteristicInstructions function returns the characteristic instructions of the robot]
     *
     * @return array
     */
    public function getCharacteristicInstructions():array
    {
        return $this->characteristic_instructions;
    }

    /**
     * [getPositionHistory function returns the position history of the robot]
     *
     * @return array
     */
    public function getPositionHistory():array
    {
        return $this->position_history;
    }

    /**
     * [__get function returns the current position only if the property is position, literal_history, char_history or history]
     *
     * @param string $var_name
     * @throws Exception [These Property Doesn't Exists ... !]
     * @return array
     */
    public function __get(string $var_name):?array
    {
        if ($var_name == 'position'){
            return $this->getPosition();
        }

        if ($var_name == 'literal_history'){
            return $this->getLiteralInstructions();
        }

        if ($var_name == 'char_history'){
            return $this->getCharacteristicInstructions();
        }

        if ($var_name == 'history'){
            return $this->getPositionHistory();
        }

        throw new Exception("These Property Doesn't Exists ... !");
    }

    /**
     * [__call function returns the current position only if the method is position, literal_history, char_history or history]
     *
     * @param string $fun_name
     * @param [type] $arguments
     * @throws Exception [These Property Doesn't Exists ... !]
     * @return array
     */
    public function __call(string $fun_name, $arguments = []):?array
    {
        if($fun_name == 'position'){
            return $this->getPosition();
        }

        if ($fun_name == 'literal_history'){
            return $this->getLiteralInstructions();
        }

        if ($fun_name == 'char_history'){
            return $this->getCharacteristicInstructions();
        }

        if ($fun_name == 'history'){
            return $this->getPositionHistory();
        }
        dd($fun_name);
        throw new Exception("These Method Doesn't Exists ... !");
    }
}
