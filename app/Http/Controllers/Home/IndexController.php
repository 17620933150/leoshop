<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Profession;
use App\Models\Course;

class IndexController extends Controller
{
	public function index() {
    	return view("home.index.index");
	}

	//获取所有学科
	public function subject(Subject $subject) {
		return $subject->orderBy("sort",'asc')->limit(10)->get();
	}

	//获取所有专业
	public function profession(Profession $profession) {
		return $profession->orderBy("sort",'asc')->limit(8)->get();
	}

	//获取所有课程
	public function course(Course $course) {
		return $course->with("member")->orderBy("sort",'asc')->limit(10)->get();
	}

}
