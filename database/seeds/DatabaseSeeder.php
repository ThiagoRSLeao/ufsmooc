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

        DB::table('users')->insert([
            'name' => 'batatao',
            'surname' => 'voadora',
            'email' => 'batatao@gmail.com',
            'password' => bcrypt('123'),
            'CPF' => '999999999',
            'UF' => 'RJ',
            'city' => 'volta redonda',
            'type_user' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'jorge',
            'surname' => 'do grande teste',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('123'),
            'CPF' => '44444444444',
            'UF' => 'RJ',
            'city' => 'volta redonda',
            'type_user' => '1',
        ]);

        DB::table('course')->insert([
            "course_title" => 'Curso teste',
            "course_subtitle" => 'teste zzz',
            "course_subtitle" => 'sim',
            "course_category" => 'CT',
            "path_picture_course" => 'C:\batata',
            "course_description" => 'Teste epico',
            "has_tutoring" => '1',
            "has_certification" => '1',
            "begin_subscriptions_date" => '2000/01/01',
            "end_subscriptions_date" => '2000/01/01',
            "begin_course_date" => '2000/01/01',
            "end_course_date" => '2000/01/01',
            "students_limit" => '60',
            "work_notifications" => '40',
            "question_notifications" => '23',
            "forum_notifications" => '68',
            "doubt_notifications" => '983'
        ]);

        DB::table('course')->insert([
            "course_title" => 'Curso teste2',
            "course_subtitle" => 'teste zzz2',
            "course_subtitle" => 'sim2',
            "course_category" => 'CT2',
            "path_picture_course" => '2C:\batata',
            "course_description" => 'T2este epico',
            "has_tutoring" => '1',
            "has_certification" => '1',
            "begin_subscriptions_date" => '2000/01/01',
            "end_subscriptions_date" => '2000/01/01',
            "begin_course_date" => '2000/01/01',
            "end_course_date" => '2000/01/01',
            "students_limit" => '30',
            "work_notifications" => '20',
            "question_notifications" => '15',
            "forum_notifications" => '4',
            "doubt_notifications" => '3'
        ]);

        DB::table('module')->insert([
            "course_id" => '1',
            "title_module" => 'modulo teste',
            "path_archive_module" => 'C:\teste',
            "module_position" => 1,
            "is_additional" => 0,
        ]);

        DB::table('module')->insert([
            "course_id" => '1',
            "title_module" => 'modulo teste 2',
            "path_archive_module" => 'C:\teste2',
            "module_position" => 2,
            "is_additional" => 0,
        ]);

        DB::table('module')->insert([
            "course_id" => '2',
            "title_module" => 'modulo teste 3',
            "path_archive_module" => 'C:\teste3',
            "module_position" => 1,
            "is_additional" => 0,
        ]);

        DB::table('module_partition')->insert([
            "name" => 'particao 1',
            "type" => '0',
            "sequence_position" => 1,
            "content" => '[{"style":"font-family: Comic sans MS;","content":"Teste ","breakAfter":true},{"style":"font-family: Comic sans MS;font-weight: bold;","content":"Teste pos quebra de linha ","breakAfter":false}]',
            "module_id" => 1,

        ]);

        DB::table('module_partition')->insert([
            "name" => 'particao 2',
            "type" => '0',
            "sequence_position" => 2,
            "content" => '[{"style":"font-family: Arial;","content":"Teste 2 fonte diferente mucho texto jsdaoif jsoijdsoifj dsif jjidsof jisdo jfosid jij io sdjoasijfiodsfajidfsajfiods ja  jsdioaf jsaoij sai jjia ojs i fdsojad ifjasiof saj sdiojf soidaj sioaj ijosdafio dsjioa fjs iojfjd soi jsoidj osji pok jiij joi j ijoi jiv j ioj ioj ioj iouj uij io jik jnik ni uhui jhui h uihui hi uh iuuh ui uh uihh uih iu uh hiu huh uimiu jiu  huih ui huibduifgjdsiuo dsiis oisudf sdids uisdfoisde uisidof iuo sduisdfi usosioudfio sd iosdiuo fu isdui fosuios uiodu oidsuiosuiod  uiosdisduiosd uio uiosuiod uio sd uiods sduioud ios uod ","breakAfter":true},{"style":"font-family: Roboto;font-weight: bold;","content":"Teste pos quebra de linha ","breakAfter":false}]',
            "module_id" => 1,
        ]);

        DB::table('module_partition')->insert([
            "name" => 'particao 3',
            "type" => '0',
            "sequence_position" => 1,
            "content" => '[{"style":"font-family: Comic sans MS;","content":"Mais teste","breakAfter":true},{"style":"font-family: Comic sans MS;font-weight: bold;","content":"Teste pos quebra de linha ","breakAfter":false}]',
            "module_id" => 2,

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

        DB::table('studies')->insert([
            "data_json" => 'dado',
            "course_id" => '1',
            "student_id" => '1',
        ]);

        DB::table('studies')->insert([
            "data_json" => 'dado',
            "course_id" => '1',
            "student_id" => '2',
        ]);

        DB::table('studies')->insert([
            "data_json" => 'dado',
            "course_id" => '2',
            "student_id" => '2',
        ]);

        DB::table('teaches')->insert([
            
            "acess_doubts" => '1',
            "acess_manage_modules" =>'1',
            "acess_manage_questionary" => '1',
            "acess_manage_work" => '1',
            "acess_evaluate_questionary" => '1',
            "acess_evaluate_work" => '1',
            "reason_tutor" => 'tutor',
            "user_id" => '1',
            "course_id" => '1',
            "is_temporary" => '0',
            "dt_begin_teaches" => '2000/01/01',
            "dt_end_teaches" => '2000/01/01',
        ]);


    }
}
