<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'batata',
            'surname' => 'voadora',
            'email' => 'batata@gmail.com',
            'password' => bcrypt('123'),
            'CPF' => '11111111111',
            'UF' => 'RJ',
            'city' => 'volta redonda',
            'type_user' => '1',
        ]);

        DB::table('course')->insert([
            "course_title" => 'Curso teste',
            "course_subtitle" => 'teste zzz',
            "course_subtitle" => 'sim',
            "course_cartegory" => 'CT',
            "path_picture_course" => 'C:\batata',
            "course_description" => 'Teste epico',
            "has_tutoring" => '1',
            "has_certification" => '1',
            "has_deadline" => '0',
            "has_end" => '0',
            "begin_subscriptions_date" => '2000/01/01',
            "end_subscriptions_date" => '2000/01/01',
            "begin_course_date" => '2000/01/01',
            "end_course_date" => '2000/01/01',
        ]);

        DB::table('module')->insert([
            "course_id" => '1',
            "name_title_module" => 'modulo teste',
            "name_path_archive_module" => 'C:\teste',
        ]);
        
        DB::table('questionary')->insert([
            "name_title" => 'questionartio_teste',
            "text_questionary" => 'questionario_texto',
            "type_question" => 'a',
            "module_id" => '1',
            "created_at" => '2000/01/01',
            "updated_at" => '2000/01/01',
        ]);

        DB::table('alternative_question')->insert([
            "question_weight" => '3',
            "number_question" => '1',
            "description_question" => 'descricao da questao',
            "questionary_id" => '1',
        ]);

        DB::table('alternative')->insert([
            "alternative_question_id" => 1,
            "alternative_description" => 'esta e a correta',
            "right" => '1',
        ]);
        
        DB::table('descriptive_question')->insert([
            "question_weight" => '3',
            "number_question" => '1',
            "description_question" => 'teste descritiva',
            "answer_question" => 'teste resposta',
            "questionary_id" => '1',
        ]);
        
    }
}
