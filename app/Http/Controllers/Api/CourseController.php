<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCourse;

class CourseController extends Controller
{

    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = $this->courseService->getCourses();

        return $courses;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCourse $request)
    {
        $course = $this->courseService->storeNewCourse($request->validated());
        
        return new CourseResource($course);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $course = $this->courseService->getCourse($identify); 

        return new CourseResource($course);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCourse $request, $identify)
    {
        $this->courseService->updateCourse($identify, $request->validated());
        
        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $course = $this->courseService->deleteCourse($identify); 

        return response()->json([], 204);
    }
}
