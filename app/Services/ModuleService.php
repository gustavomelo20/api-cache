<?php

namespace App\Services;


use App\Repositories\CourseRepository;

class ModuleService
{

    protected $repository;

    public function __construct(ModuleService $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    
}