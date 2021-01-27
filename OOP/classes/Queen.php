<?php

class Queen extends AbstractChessmen {

    public function move($x, $y) {
        if (
            $x > 7 || $y > 7
            || $x < 0 || $y < 0
        ) throw new Exception('Выход за поле');

        $offsetX = $x - $this->x;
        $offsetY = $y - $this->y;
        
        if (abs($offsetX) == abs($offsetY)
            || $offsetX == 0
            || $offsetY == 0) 
        {
            $this->x = $x;
            $this->y = $y;
        } else throw new Exception('Недопустимая точка для перемещения');
    }
}