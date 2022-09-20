<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {

        $modules = $this->moduleService->getModulesByCourses($course);

        return $modules;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateModule $request, $course)
    {
        $module = $this->moduleResource->storeNewCourse($request->validated());
        
        return new ModuleResource($course);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($course ,$identify)
    {
        $module = $this->moduleResource->getModuleByCourse($identify); 

        return new ModuleResource($course);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateModule $request,$course, $identify)
    {
        $this->courseService->updateModule($identify, $request->validated());
        
        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($course , $identify)
    {
        $module = $this->moduleResource->deleteModule($identify); 

        return response()->json([], 204);
    }
}
