<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Teaches;
use App\Studies;
use Illuminate\Support\Facades\Storage;

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
        'course_category',
        'modules',
        'hours',
        'level');
        
        $course = Course::create([
            "course_title" => $data['course_title'],
            "course_subtitle" => "a",
            "course_category" => $data['course_category'],
            "course_description" => $data['course_description'],
            "has_tutoring" => $data['has_tutoring'],
            "has_certification" => $data['has_certification'],
            "path_picture_course" => 'NULL',//$data['path_picture_course']
            "begin_subscriptions_date" => $data['begin_subscriptions_date'],
            "end_subscriptions_date" => $data['end_subscriptions_date'],
            "begin_course_date" => $data['begin_course_date'],
            "end_course_date" => $data['end_course_date'],
            "students_limit" => $data['students_limit'],
            "work_notifications" => 0,
            "question_notifications" => 0,
            "forum_notifications" => 0,
            "doubt_notifications" => 0,
            "number_hours" => $data['hours'],
            "level" => $data['level'],
        ]);

        foreach($data['modules'] as $module)
        {            
            $mod_id = DB::table('module')->insertGetId([
                "title_module" => $module['name'],
                "path_archive_module" => 'apagar',
                "course_id" => $course->id,
                "module_position" => $module['index'],
                "is_additional" => true,
            ]);
            foreach($module['partitions'] as $partition)
            {         
                $part_db = DB::table('module_partition')->insert([
                    "name" => $partition['name'],
                    "type" => $partition['type'],
                    "content" => json_encode($partition['content']),
                    "sequence_position" => $partition['index'],
                    "module_id" => $mod_id,
                ]);
            }
        }
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
        $courseId = $course->id;
        return response()->json($courseId);
    }

    public function courseSetCourseImage(Request $request){
        $extension = $request->image->getClientOriginalExtension();
        if ($extension == 'jpg'){
            $imageName = 'courseImage.'.'jpg';
            $request->image->move(public_path('/storage/courses/course'. $request->id), $imageName);
            return response()->json(['success'=>'Upload complete']);
        }else{
            return response()->json(['error' => 'Invalid file']);
        }
    }

    /*public function courseGetCourseImage($courseId){
        $fileName = 'courseImage.jpg';
        //the download method uses /storage as root
        $pathDirectory = 'courses/course'. $courseId .'/'. $fileName;
        if (Storage::disk('public')->exists($pathDirectory)){
            return Storage::disk('public')->get($pathDirectory);
        }
        else{
            return Storage::disk('public')->get('/courses/standard_course_image.PNG');
        }
        
    }*/

    public function courseGetCourses(){
        $userId = Auth::id();
        $subscribedCoursesId = DB::table('studies')->where('student_id', '=', $userId)->pluck('course_id');
        if (Auth::check() && count($subscribedCoursesId) != 0){
            $notSubscribedCourses = DB::table('course')->select('id', 'course_title', 'course_description', 'has_tutoring', 'path_picture_course', 'number_hours', 'level')->whereNotIn('id', $subscribedCoursesId)->orderBy('course_title')->get();
            $subscribedCourses = DB::table('course')->select('id', 'course_title', 'course_description', 'has_tutoring', 'path_picture_course', 'number_hours', 'level')->whereIn('id', $subscribedCoursesId)->orderBy('course_title')->get();
            $this->setTeacherProperties($notSubscribedCourses);
            $this->setTeacherProperties($subscribedCourses);
        }
        else{
            $notSubscribedCourses =DB::table('course')->select('id', 'course_title', 'course_description', 'has_tutoring', 'path_picture_course', 'number_hours', 'level')->orderBy('course_title')->get();
            $this->setTeacherProperties($notSubscribedCourses);
            $subscribedCourses = NULL;
        }

        return response()->json(['notSubscribedCourses' => $notSubscribedCourses, 'subscribedCourses' => $subscribedCourses]);
    }

    private function setTeacherProperties(&$courses){
        foreach ($courses as $course){
            $id = DB::table('teaches')->where('course_id', $course->id)->pluck('user_id');
            $course->teacher_info = DB::table('users')->select('name', 'surname', 'description')->where('id', $id)->get();
        }
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
        $data = $request->only('courseId', 'modulePosition');
        $auxId = DB::table('module')->select('id')->where('module_position', $data['modulePosition'])->where('course_id', $data['courseId'])->get();
        $data['moduleId'] = $auxId[0]->id;
        $aux = DB::table('module')->select('id', 'title_module')->where('id', $data['moduleId'])->get();
        $moduleData = $aux[0];
        $partitionsData = DB::table('module_partition')->select('id', 'name', 'type', 'sequence_position', 'content')->where('module_id', $data['moduleId'])->orderBy('sequence_position')->get();
        foreach ($partitionsData as $partitionData){
            $partitionData->fileName = $this->courseGetModuleFilesName($data['courseId'], $data['moduleId'], $partitionData->sequence_position);
        }
        $moduleData->partitions = $partitionsData;
        $moduleData->id = $data['moduleId'];
        
        return response()->json($moduleData);
    }

    

    public function courseModulesGetInfo(Request $request){
        $courseId = $request->only('courseId');
        
        $modulesInfo = DB::table('module')->select('id', 'title_module')->where('course_id', '=', $courseId)->get();
        
        /*foreach ($modulesInfo as $moduleInfo){
            $moduleInfo->modulePartition = DB::table('module_partition')->select('id', 'name', 'type', 'sequence_position')->where('module_id', '=', $moduleInfo->id)->orderBy('sequence_position')->get();
        }*/

        return response()->json($modulesInfo);
        
    }



    public function teste(Request $request){
        /*$courseId = 37;
        $item = Storage::get(public_path('/storage/courses/course'.$courseId.'/courseImage'));
        //return Storage::response($item);
        echo $item;*/

        //$path = $request->only('courseId', 'moduleId', 'modulePartitionId', 'fileName');
        $courseId = 37;
        $moduleId = 1;
        $modulePartitionId = 1;
        $fileName = 'courseImage.jpg';
        //the download method uses /storage as root
        $pathDirectory = 'courses/course'. $courseId .'/'. $fileName;
        $response = Storage::disk('public')->get($pathDirectory);
        echo $response;




    }

    public function courseModuleGetPartitionInfo(Request $request){
        $moduleId = $request->only('moduleId');
        $modulePartitionsInfo = DB::table('module')->select('id', 'name', 'type', 'sequence_position')->where('module_id', '=', $moduleId)->orderBy('sequence_position')->get();
        return response()->json($modulePartitionsInfo);
    }

    private function courseGetModuleFilesName($courseId, $moduleId, $modulePartitionPosition){
         $pathDirectory = 'storage/courses/course'. $courseId . '/module' . $moduleId .'/module_partition'. $modulePartitionPosition;
         if (is_dir($pathDirectory)){
            $files = scandir($pathDirectory);
            $i = 0;
            $filesName = '';
            //verifies if the file is a system file
            foreach ($files as $file){
                if ($file[0] != '.'){
                    $fileName= $file;
                    $i++;
                }
            }
        
            return $fileName;
        }
        else{
            return NULL;
        }
    }

    public function courseGetFile(Request $request){
        $path = $request->only('courseId', 'moduleId', 'modulePartitionId', 'fileName');
        $courseId = $path['courseId'];
        $moduleId = $path['moduleId'];
        $modulePartitionId = $path['modulePartitionId'];
        $fileName = $path['fileName'];
        //the download method uses /storage as root
        $pathDirectory = 'courses/course'. $courseId . '/module' . $moduleId .'/module_partition'. $modulePartitionId .'/'. $fileName;
        return Storage::disk('public')->download($pathDirectory);
    }

    public function showCourse($id)
    {        
        return view('auth.view_course', ['id' => $id]);
    }

}
