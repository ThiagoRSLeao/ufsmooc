<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Teaches;
use App\Studies;

class CourseController extends Controller
{    
    public function courseShowForm(){
        return view('views.pages.teacherPanelCreateCourse');
    }

    public function createCourse(Request $request){
        $data = $request->only('center', 'name', 'course_description', 'has_tutoring', 'has_certification', 'has_deadline', 'has_end', 'path_picture_course','begin_subscriptions_date',
        'end_subscriptions_date', 'begin_course_date', 'end_course_date', 'course_subtitle');
            $course = Course::create([
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


        $teacherId = session()->get('userId');
        $teaches = $course->taughtBy()->create([
            "type" => '0',
            "acess_doubts" => 1,
            "acess_manage_modules" => 1,
            "acess_manage_questionary" => 1,
            "acess_manage_work" => 1,
            "acess_evaluate_questionary" => 1,
            "acess_evaluate_work" => 1,
            "reason_tutor" => 'Dono do Curso',
            "user_id" => $teacherId,
            "course_id" => $course->id,
            "is_temporary" => 0,
            "dt_begin_ministering" => date("Y-m-d H:i:s"),
            "dt_end_ministering" => date("Y-m-d H:i:s"),
        ]);
                return redirect()->route('teacher.panel');
        }

    /*public function showCoursesStudent()
    {
        $userId = session()->get('userId');
        if ($userId == NULL){
            echo "voce precisa estar logado para acessar essa pagina";
        }
        $studies = Studies::Where('student_id', '=', $userId)->get();
        $courses = Array();
        foreach($studies as $study)
        {
<<<<<<< HEAD
            //array_push($courses, Course::find($teach->course_id));
        }
        //return view('pages.show_courses_student', ['studies' => $studies, 'courses' => $courses]);
        return view('pages.show_courses_student');
    }*/

    public function showCoursesStudent(){
        $course_properties = array();
        $course_ids = DB::table('studies')->select('course_id')->where('student_id', Auth::id())->get();
        foreach ($course_ids as $course_id){
            array_push($course_properties, DB::table('course')->select('id', 'course_title', 'course_cartegory', 'has_tutoring', 'path_picture_course')
        ->where('id', $course_id->course_id)->get()); //Ele esta armazenando, mas na variavel course_properties fica so o ultimo valor
        }
        
        return view ('pages.show_courses_student', ['data' => $course_ids]);
=======
            array_push($courses, Course::find($study->course_id));
        }
        return view('pages.show_courses_student', ['studies' => $studies, 'courses' => $courses]);
        //return view('pages.show_courses_student');
>>>>>>> 63d84e557f13f052587a3b5efe3fe86f61c360e1
    }

    public function showCoursesTeaches()
    {
        $userId = session()->get('userId');
        $teaches = Teaches::Where('user_id', '=', $userId)->get();
        $courses = Array();
        foreach($teaches as $teach)
        {
            array_push($courses, Course::find($teach->course_id));
        }
        return view('pages.teacherPanel', ['courses' => $courses]);
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

    public function showCoursesPublic(Request $request){
        $db_courses = DB::table('course')->select('id', 'course_title', 'course_description', 'course_cartegory', 'has_tutoring', 'path_picture_course')
        ->orderBy('course_title')->get();
        
        return view ('pages.show_courses', ['courses' => $db_courses]);
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
    
    public function subscribe_course(Request $request){
        DB::table('studies')->insert([
            "data_json" => "batata",
            "course_id" => $request['course_id'],
            "student_id" => Auth::id(),
        ]);
        return ('/');
    }

    public function manageCourses(){
        return view('auth.manage-courses');
    }

    public function returnCoursesStudents(Request $request){
        /*$id = $request['course_id'];*/
        $id = '1';
        $students_ids= DB::table('studies')->where('course_id', '=', $id)->pluck('student_id');
        $users_id = DB::table('student')->whereIn('id', $students_ids)->pluck('users_id');
        $students_name = DB::table('users')->whereIn('id', $users_id)->pluck('name');
        return response()->json($students_name);
    }

}
