<?php

use Illuminate\Database\Seeder;
use App\People;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array[0]=['name'=>'економічного','name_boss'=>'Юрій','patronymic'=>'Миколайвич','surname'=>'Станкевич','position'=>'економіст'];
        $array[1]=['name'=>'юридичного','name_boss'=>'Сергій','patronymic'=>'Терешкович','surname'=>'Гуменюк','position'=>'юрист'];
        $array[2]=['name'=>'ІТ','name_boss'=>'Віталій','patronymic'=>'Федоровис','surname'=>'Іванов','position'=>'програміст'];
        $array[3]=['name'=>'фінансого','name_boss'=>'Андрій','patronymic'=>'Миколайович','surname'=>'Правдивий','position'=>'фінансист'];
        $array[4]=['name'=>'статистичного','name_boss'=>'Олександра','patronymic'=>'Михайловна','surname'=>'Голівець','position'=>'статист'];



        function generateText($length = 8){
            $chars = 'qazxswedcvfrtgbnhyujmkiol';
            $numChars = strlen($chars);
            $string = '';
            for ($i = 0; $i < $length; $i++) {
                $string .= substr($chars, rand(1, $numChars) - 1, 1);
            }
            return $string;
        }
        function generateNumber($length = 8){
            $chars = '1234567890';
            $numChars = strlen($chars);
            $string = '';
            for ($i = 0; $i < $length; $i++) {
                $string .= substr($chars, rand(1, $numChars) - 1, 1);
            }
            return $string;
        }
        $a=People::create(
        [
            'name'=>'Василь',
            'patronymic'=>'Михайлович',
            'surname'=>'Вакуленко',
            'id_boss'=>0,
            'name_boss'=>'Бог',
            'position'=>'Власник фірми',
            'salary'=>999999,



        ]
    );
        $b=People::create(
            [
                'name'=>'Віталій',
                'patronymic'=>'Євгенович',
                'surname'=>'Прохоренко',
                'id_boss'=>$a->id,
                'name_boss'=>$a->name.' '.$a->patronymic,
                'position'=>'Головний директор',
                'salary'=>150000,



            ]
        );
        foreach ($array as $item){

            $c=People::create(
                [
                    'name'=>$item['name_boss'],
                    'patronymic'=>$item['patronymic'],
                    'surname'=>$item['surname'],
                    'id_boss'=>$b->id,
                    'name_boss'=>$b->name.' '.$b->patronymic,
                    'position'=>'Директор '.$item['name'].' відділу',
                    'salary'=>100000,

                ]
            );


            for($q=0;$q<10;$q++){
                $d=People::create(
                    [
                        'name'=> ucfirst(generateText(5)),
                        'patronymic'=>ucfirst(generateText(5)),
                        'surname'=>ucfirst(generateText(5)),
                        'id_boss'=>$c->id,
                        'name_boss'=>$c->name." ".$c->patronymic,
                        'position'=>'керівник цеху № '.generateNumber(4),
                        'salary'=>generateNumber(5),

                    ]
                );

                for($z=0;$z<10;$z++){
                    $e=People::create(
                        [
                            'name'=> ucfirst(generateText(5)),
                            'patronymic'=>ucfirst(generateText(5)),
                            'surname'=>ucfirst(generateText(5)),
                            'id_boss'=>$d->id,
                            'name_boss'=>$d->name." ".$d->patronymic,
                            'position'=>'керівник бригад № '.generateNumber(4),
                            'salary'=>generateNumber(4),

                        ]
                    );
                    for($r=0;$r<100;$r++){
                        $f=People::create(
                            [
                                'name'=> ucfirst(generateText(5)),
                                'patronymic'=>ucfirst(generateText(5)),
                                'surname'=>ucfirst(generateText(5)),
                                'id_boss'=>$e->id,
                                'name_boss'=>$e->name." ".$e->patronymic,
                                'position'=>$item['position'],
                                'salary'=>generateNumber(3),

                            ]
                        );
                    }
                }

            }




        }



    }
}
