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


    public function courseSave(Request $request){
                              
        $data = $request->only('course_title', 
        'path_picture_course', 
        'course_description', 
        'has_tutoring', 
        'has_certification',
        'begin_subscriptions_date', 
        'end_subscriptions_date', 
        'begin_course_date',
        'end_course_date',
        'students_limit', 
        'course_category');
        
        $course = Course::create([
            "course_title" => $data['course_title'],
            "course_subtitle" => "a",
            "course_category" => $data['course_category'],
            "course_description" => $data['course_description'],
            "has_tutoring" => $data['has_tutoring'],
            "has_certification" => $data['has_certification'],
            "path_picture_course" => $data['path_picture_course'],
            "begin_subscriptions_date" => $data['begin_subscriptions_date'],
            "end_subscriptions_date" => $data['end_subscriptions_date'],
            "begin_course_date" => $data['begin_course_date'],
            "end_course_date" => $data['end_course_date'],
            "students_limit" => $data['students_limit'],
            "work_notifications" => 0,
            "question_notifications" => 0,
            "forum_notifications" => 0,
            "doubt_notifications" => 0,
        ]);

        $teacherId = session()->get('userId');

        $teaches = $course->taughtBy()->create([
            "type" => '0',
            "acess_doubts" => true,
            "acess_manage_modules" => true,
            "acess_manage_questionary" => true,
            "acess_manage_work" => true,
            "acess_evaluate_questionary" => true,
            "acess_evaluate_work" => true,
            "reason_tutor" => 'Dono do Curso',
            "user_id" => $teacherId,
            "course_id" => $course->id,
            "is_temporary" => false,
            "dt_begin_teaches" => date("Y-m-d H:i:s"),
            "dt_end_teaches" => date("Y-m-d H:i:s"),            
        ]);
        return response()->json($course->id);
    }

    
    

    public function courseGetTeaches($id)
    {
        $course = Course::find($id);
        return response()->json($course);
    }


    public function courseGetStudies()
    {        
        $userId = session()->get('userId');
        if ($userId == NULL){
            echo "voce precisa estar logado para acessar essa pagina";
        }
        $studies = Studies::Where('student_id', '=', $userId)->get();
        $courses = Array();
        foreach($studies as $study)
        {
            array_push($courses, Course::find($study->course_id));
        }
        
        return response()->json(['studies' => $courses, 'favorites' => null]);
        //return view('pages.show_courses_student');
    }

    public function courseGetNotifications()
    {
        $userId = session()->get('userId');
        $teaches = Teaches::Where('user_id', '=', $userId)->get();
        $courses = Array();
        foreach($teaches as $teach)
        {
            $course = Course::select('id', 'course_title' , 'work_notifications', 'question_notifications', 'forum_notifications', 'doubt_notifications')->find($teach->course_id);//
            array_push($courses, $course);
        }        
        return response()->json(['teaches' => $courses]);
    }

    public function courseCreateModule(Request $request){
        $data = $request->only('course_id', 'name_title_module', 'name_path_archive_module');
        DB::table('module')->insert([
            "course_id" => $data['course_id'],
            "name_title_module" => $data['name_title_module'],
            "name_path_archive_module" => $data['name_path_archive_module'],
        ]);
        return ('/');
    }






    public function courseGiveTutorPermission(Request $request){
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
    
    public function courseSubscribe(Request $request){
        if (Auth::check()){
            $testes = DB::table('studies')->where('student_id', '=', Auth::id())->where('course_id', '=', $request['courseId'])->pluck('student_id');
            if (count($testes) == 0){
                DB::table('studies')->insert([
                    "data_json" => "batata",
                    "course_id" => $request['courseId'],
                    "student_id" => Auth::id(),
                ]);
                return response()->json('Cadastro realizado com sucesso');
            }
            else{
                echo 'Você já está inscrito';
            }
        }
        else{
            return response()->json('Você precisa fazer login');
        }

    }

    public function courseShowCreateForm(){
        return view('views.pages.teacherPanelCreateCourse');
    }



    public function courseGetStudents(Request $request){
        $id = $request['course_id'];
        $studentsIds= DB::table('studies')->where('course_id', '=', $id)->pluck('student_id');
        $usersId = DB::table('student')->whereIn('id', $studentsIds)->pluck('users_id');
        $studentsName = DB::table('users')->whereIn('id', $usersId)->pluck('name');
        return response()->json($studentsName);
        
    }

    public function courseModuleGetContent(Request $request){
        $courseId = $request['courseId'];
        $moduleId = $request['moduleId'];
        $modulePartitionId = $request['modulePartitionId'];
        $content = DB::table('module_partition')->where('module_id', '=', $moduleId)->where('id', '=', $modulePartitionId)->pluck('content');
        return response()->json($content);
    }

    

    public function courseModulesGetInfo(Request $request){
        $courseId = $request['courseId'];
        $modulesInfo = DB::table('module')->select('id', 'title_module')->where('course_id', '=', $courseId)->get();
        foreach ($modulesInfo as $moduleInfo){
            $moduleInfo->modulePartition = DB::table('module_partition')->select('id', 'name', 'type', 'sequence_position')->where('module_id', '=', $moduleInfo->id)->orderBy('sequence_position')->get();
        }
        return response()->json($modulesInfo);
        
    }



    public function teste(Request $request){
        $courseId = 2;
        $modulesInfo = DB::table('module')->select('id', 'title_module')->where('course_id', '=', $courseId)->get();
        foreach ($modulesInfo as $moduleInfo){
            $moduleInfo->modulePartition = DB::table('module_partition')->select('id', 'name', 'type', 'sequence_position')->where('module_id', '=', $moduleInfo->id)->orderBy('sequence_position')->get();

        }
        

    }

    public function courseModuleGetPartitionInfo(Request $request){
        $moduleId = $request['moduleId'];
        $modulePartitionsInfo = DB::table('module')->select('id', 'name', 'type', 'sequence_position')->where('module_id', '=', $moduleId)->orderBy('sequence_position')->get();
        return response()->json($modulePartitionsInfo);
    }

}
