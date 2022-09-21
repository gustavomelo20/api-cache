<?php

namespace App\Services;


use App\Repositories\CourseRepository;

class ModuleService
{

    protected $moduleRepository , $courseRepository ;

    public function __construct(ModuleRepository $moduleRepository, CourseRepository $courseRepository)
    {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse(string $course)
    {
       $course =  $this->courseRepository->getCourseByUuid($course);

       return $module = $this->moduleRepository->getModuleCourse($course->id);
    }

    public function storeNewModule(array $data)
    {
        return $module = $this->moduleRepository->storeNewModule($data);
    }

    public function getModuleByCourse(string $course, string $identify)
    {
       $course =  $this->courseRepository->getCourseByUuid($course);

       return $module = $this->moduleRepository->getModuleByCourse($course->id,$identify);
    }

    public function  updateModule(string  $identify, array $data)
    {
        return $this->moduleRepository->updateModuleByUuid($identify);
    }

    public function  deleteModule(string  $identify)
    {
        return $this->moduleRepository->deleteModuleByUuid($identify);
    }
}