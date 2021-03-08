<?php
namespace App\Classes;
use App\Course;

Class ManageCourse
{    
    private $userId;
    private $permissions;
    private $notifications;
    private $course;

    public function __construct($userId, $access_manage_modules, $access_manage_questionary, $access_manage_work, $access_evaluate_questionary, $access_evaluate_work, $courseId)
    {
        $this->userId = $userId;
        $this->notifications = [
            "work_notifications" => rand(1, 30),
            "questions_notifications" => rand(1, 50),
            "doubts_notifications" => rand(1, 100),    
            "mural_notifications" => rand(1, 80),
        ];
        $this->permissions = [
            "manage_modules" => $access_manage_modules,
            "manage_questionary" => $access_manage_questionary,
            "manage_work" => $access_manage_work,    
            "evaluate_questionary" => $access_evaluate_questionary,
            "evaluate_work" => $access_evaluate_work
        ];
        $this->course = Course::where("id", "=", $courseId)->first();
    }
    public function getCourse()
    {
        return $this->course;
    }
    public function getPermissions()
    {
        return $this->permissions;
    }
    public function getWorkNotifications()
    {
        return $this->notifications['work_notifications'];
    }
    public function getQuestionsNotifications()
    {
        return $this->notifications['questions_notifications'];
    }
    public function getDoubtsNotifications()
    {
        return $this->notifications['doubts_notifications'];
    }
    public function getMuralNotifications()
    {
        return $this->notifications['mural_notifications'];
    }
}