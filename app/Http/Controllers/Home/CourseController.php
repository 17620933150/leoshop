<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    //点击课程列表页
    public function index() {

    }

    //点播课程的详情页
    public function detail(Course $course) {
    	$data['courseInfo'] = $course;
    	return view('home.course.detail',$data);
    }
}
