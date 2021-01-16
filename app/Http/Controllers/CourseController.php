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

    public function showCoursesAdmin(Request $request){
        $i = 0;
        $id_array = array();
        $minister_course_id = $request->only('course_id');
        $db_id_info = DB::select('select id from course');
        foreach ($db_id_info as $db_id_info2){
            foreach($minister_course_id as $minister_course_id2){
                if ($minister_course_id2 == $db_id_info2){
                    $id_array[$i] = $db_id_info2;
                    $i++;
                }
            }
        }
        $i = 0;
        foreach ($id_array as $id_array2){
            $db_course_info = DB::select('select id, course_title from course where id == $id_array2[$i]');
            $i++;
        }
        return $db_course_info;
        

    }

    public function showCoursesPublic(Request $request){
        $db_id = DB::select('select id, course_name, course_cartegory from course ORDER BY course_cartegory ASC');

        return $db_id;
    }

    public function giveTutorPermission(Request $request){
        $data = $request->only('tp_ministering, acess_doubts, acess_manage_modules, acess_manage_questionary,
        acess_manage_work, acess_evaluate_questionary, acess_evaluate_work, reason_tutor, users_id, course_id, is_temporary,
        dt_begin_ministering, dt_end_ministering');

        DB::table('ministering')->insert([
            "tp_ministering" => $data['tp_ministering'],
            "acess_doubts" => $data['acess_doubts'],
            "acess_manage_modules" => $data['acess_manage_modules'],
            "acess_manage_questionary" => $data['acess_manage_questionary'],
            "acess_manage_work" => $data['acess_manage_work'],
            "acess_evaluate_questionary" => $data['acess_evaluate_questionary'],
            "acess_evaluate_work" => $data['acess_evaluate_work'],
            "reason_tutor" => $data['reason_tutor'],
            "users_id" => $data['users_id'],
            "course_id" => $data['course-id'],
            "is_temporary" => $data['is_temporary'],
            "dt_begin_ministering" => $data['dt_begin_ministering'],
            "dt_end_ministering" => $data['dt_end_ministering']
        ]);

        return('/');

    }
    
}