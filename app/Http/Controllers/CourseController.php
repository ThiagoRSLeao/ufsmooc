<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    
    public function createCourse(Request $request){
        $data = $request->only('center, name, course_description, has_tutoring, has_certification, has_deadline, has_end, begin_subscriptions_date,
        end_subscriptions_date, begin_course_date, end_course_date, course_subtitle');
            DB::table('course')->insert([
                "course_title" => $data['name'],
                "course_subtitle" => $data['course_subtitle'],
                "course_cartegory" => $data['center'],
                "course_description" => $data['course_description'],
                "has_tutoring" => $data['has_tutoring'],
                "has_certification" => $data['has_certification'],
                "has_deadline" => $data['has_deadline'],
                "has_end" => $data['has_end'],
                "path_picture_course" => $data['path_picture_course'],
                "begin_subscriptions_date" => $data['begin_subscriptions_date'],
                "end_subscriptions_date" => $data['end_subscriptions_date'],
                "begin_course_date" => $data['begin_course_date'],
                "end_course_date" => $data['end_course_date'],
            ]);
            return ('/');
        }
    
    public function createModule(Request $request){
        $data = $request->only('course_id', 'name_title_module', 'name_path_archive_module');
        DB::table('module')->insert([
            "course_id" => $data['course_id'],
            "name_title_module" => $data['name_title_module'],
            "name_path_archive_module" => $data['name_path_archive_module'],
        ]);
        return ('/');
    }
    
}
