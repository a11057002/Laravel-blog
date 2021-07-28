<?php

interface CarService{
    public function getCost();
}

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 19;
    }
}

class OilChange implements CarService
{
    // protected $carService;
    function __construct( protected CarService $carService)
    {
        
    }
    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }
}

echo (new OilChange(new BasicInspection()))->getCost();
