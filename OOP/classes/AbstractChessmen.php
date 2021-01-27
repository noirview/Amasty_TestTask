<?php

abstract class AbstractChessmen implements IChessmen{
    private $x, $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getPosition()
    {
        return [$this->x, $this->y];
    }
}