<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

class MainController extends Controller

{
    //підгрузка людей при необхідності в древо
public function next_man(Request $request){

        $p=People::where('name',$request['name'])->first();

        $people=People::where('id_boss',$p->id)->get();



        return $people;
}




    public function index(Request $request){



        $people=People::where('id_boss',0)->first();

        $man=[];
        $peoplee=People::where('id_boss',$people->id)->get();
        foreach ($peoplee as $item){

            array_push($man, $item);
        }
        $peoples=['id'=>$people->id,'name'=>$people->name,'patronymic'=>$people->patronymic,'surname'=>$people->surname,'position'=>$people->position,'salary'=>$people->salary,'name_img'=>$people->name_img,'name_boss'=>'Бог','id_boss'=>0,'created_at'=>$people->created_at,'children'=>$man];

        $flag=0;
if( $request->session()->get('flag')==='ok'){
    $flag=1;
    $request->session()->put('flag','null');
}

        return view('for_all.index', array(
            'peoples' => $peoples,
            'flag' => $flag,


        ));
    }

    //глобальний пошук
    public function global_search(Request $request){

        $count_search=[];



        if($request['name']!=''){
            array_push($count_search,'name');
        }
        if($request['patronymic']!=''){
            array_push($count_search,'patronymic');
        }
        if($request['surname']!=''){
            array_push($count_search,'surname');
        }
        if($request['position']!=''){
            array_push($count_search,'position');
        }
        if($request['name_boss']!=''){
            array_push($count_search,'name_boss');
        }
        if($request['salary_min']!=''){
            array_push($count_search,'salary_min');
        }
        if($request['salary_max']!=''){
            array_push($count_search,'salary_max');

        }





    switch (count($count_search)){
        case 1:
            switch ($count_search[0]){
                case 'name':
                    $people=People::where('name',$request['name'])->get();
                    break;
                case 'patronymic':
                    $people=People::where('patronymic',$request['patronymic'])->get();
                    break;
                case 'surname':
                    $people=People::where('surname',$request['surname'])->get();
                    break;
                case 'position':
                    $people=People::where('position',$request['position'])->get();
                    break;
                case 'name_boss':
                    $people=People::where('name_boss',$request['name_boss'])->get();
                    break;
                case 'salary_min':
                    $people = People::where('salary','>=',$request['salary_min'])->limit(300)->get();
                    break;
                case 'salary_max':
                    $people = People::where('salary','<=',$request['salary_max'])->limit(300)->get();
                    break;
            }

            break;
        case 2:
            switch ($count_search[0]){
                case 'name':
                    switch ($count_search[1]){

                        case 'patronymic':
                            $people=People::where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();
                            break;
                        case 'surname':
                            $people=People::where('surname',$request['surname'])->where('name',$request['name'])->get();
                            break;
                        case 'position':
                            $people=People::where('position',$request['position'])->where('name',$request['name'])->get();
                            break;
                        case 'name_boss':
                            $people=People::where('name_boss',$request['name_boss'])->where('name',$request['name'])->get();
                            break;
                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('name',$request['name'])->get();
                            break;
                        case 'salary_max':
                            $people = People::where('salary','<=',$request['salary_max'])->where('name',$request['name'])->get();
                            break;
                    }

                    break;
                case 'patronymic':
                    switch ($count_search[1]){

                        case 'surname':
                            $people=People::where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();
                            break;
                        case 'position':
                            $people=People::where('position',$request['position'])->where('patronymic',$request['patronymic'])->get();
                            break;
                        case 'name_boss':
                            $people=People::where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->get();
                            break;
                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->get();
                            break;
                        case 'salary_max':
                            $people = People::where('salary','<=',$request['salary_max'])->where('patronymic',$request['patronymic'])->get();
                            break;
                    }
                    break;
                case 'surname':
                    switch ($count_search[1]){

                        case 'position':
                            $people=People::where('position',$request['position'])->where('surname',$request['surname'])->get();
                            break;
                        case 'name_boss':
                            $people=People::where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->get();
                            break;
                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->get();
                            break;
                        case 'salary_max':
                            $people = People::where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->get();
                            break;
                    }
                    break;
                case 'position':
                    switch ($count_search[1]){

                        case 'name_boss':
                            $people=People::where('name_boss',$request['name_boss'])->where('position',$request['position'])->get();
                            break;
                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('position',$request['position'])->get();
                            break;
                        case 'salary_max':
                            $people = People::where('salary','<=',$request['salary_max'])->where('position',$request['position'])->get();
                            break;
                    }
                    break;
                case 'name_boss':
                    switch ($count_search[1]){

                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->get();
                            break;
                        case 'salary_max':
                            $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->get();
                            break;
                    }
                    break;
                case 'salary_min':

                   $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->limit(300)->get();

                    break;

            }
            break;
        case 3:

            switch ($count_search[0]){
                case 'name':
                    switch ($count_search[1]){

                        case 'patronymic':
                            switch ($count_search[2]){


                                case 'surname':
                                    $people = People::where('surname',$request['surname'])->where('name',$request['name'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'position':
                                    $people = People::where('position',$request['position'])->where('name',$request['name'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'name_boss':
                                    $people = People::where('name_boss',$request['name_boss'])->where('name',$request['name'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('name',$request['name'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('name',$request['name'])->where('patronymic',$request['patronymic'])->get();
                                    break;

                            }
                            break;

                        case 'surname':

                            switch ($count_search[2]){



                                case 'position':
                                    $people=People::where('position',$request['position'])->where('surname',$request['surname'])->where('name',$request['name'])->get();
                                    break;
                                case 'name_boss':
                                    $people=People::where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->where('name',$request['name'])->get();
                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->where('name',$request['name'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('name',$request['name'])->get();

                                    break;

                            }

                            break;
                        case 'position':
                            switch ($count_search[2]){

                                case 'name_boss':
                                    $people = People::where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('name',$request['name'])->get();

                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('position',$request['position'])->where('name',$request['name'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('name',$request['name'])->get();

                                    break;

                            }
                            break;
                        case 'name_boss':
                            switch ($count_search[2]){





                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('name',$request['name'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','>=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('name',$request['name'])->get();

                                    break;

                            }
                            break;
                        case 'salary_min':

                                    $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('name',$request['name'])->get();

                            break;

                    }

                    break;
                case 'patronymic':
                    switch ($count_search[1]){
                        case 'surname':
                            switch ($count_search[2]){



                                case 'position':
                                    $people = People::where('position',$request['position'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'name_boss':
                                    $people = People::where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();
                                    break;

                            }
                            break;
                        case 'position':
                            switch ($count_search[2]){

                                case 'name_boss':
                                    $people = People::where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->get();
                                    break;

                            }
                            break;
                        case 'name_boss':

                            switch ($count_search[2]){


                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->get();
                                    break;

                            }

                            break;
                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('patronymic',$request['patronymic'])->get();
                            break;

                    }
                    break;
                case 'surname':
                    switch ($count_search[1]){

                        case 'position':
                            switch ($count_search[2]){

                                case 'name_boss':
                                    $people = People::where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('surname',$request['surname'])->get();

                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('position',$request['position'])->where('surname',$request['surname'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('surname',$request['surname'])->get();
                                    break;

                            }
                            break;
                        case 'name_boss':

                            switch ($count_search[2]){


                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->get();
                                    break;

                            }

                            break;
                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->get();
                            break;

                    }
                    break;
                case 'position':
                    switch ($count_search[1]){


                        case 'name_boss':

                            switch ($count_search[2]){


                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->get();

                                    break;
                                case 'salary_max':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->get();
                                    break;

                            }

                            break;
                        case 'salary_min':
                            $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('position',$request['position'])->get();
                            break;

                    }
                    break;
                case 'name_boss':

                            $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->get();

                    break;


            }

            break;
        case 4:
            switch ($count_search[0]){
                case 'name':
                    switch ($count_search[1]){

                        case 'patronymic':
                            switch ($count_search[2]){


                                case 'surname':
                                    switch ($count_search[3]){

                                        case 'position':
                                            $people = People::where('position',$request['position'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;
                                        case 'name_boss':
                                            $people = People::where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_max':
                                            $people = People::where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_min':
                                            $people = People::where('surname',$request['surname'])->where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;

                                    }
                                    break;
                                case 'position':
                                    switch ($count_search[3]){

                                        case 'name_boss':
                                            $people = People::where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_max':
                                            $people = People::where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_min':
                                            $people = People::where('position',$request['position'])->where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;

                                    }
                                    break;
                                case 'name_boss':
                                    switch ($count_search[3]){
                                        case 'salary_max':
                                            $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_min':
                                            $people = People::where('name_boss',$request['name_boss'])->where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                            break;

                                    }
                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->where('name',$request['name'])->get();

                                    break;


                            }
                            break;
                        case 'surname':

                            switch ($count_search[2]){

                                case 'position':
                                    switch ($count_search[3]){

                                        case 'name_boss':
                                            $people = People::where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('surname',$request['surname'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_max':
                                            $people = People::where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('surname',$request['surname'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_min':
                                            $people = People::where('position',$request['position'])->where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->where('name',$request['name'])->get();

                                            break;

                                    }
                                    break;
                                case 'name_boss':
                                    switch ($count_search[3]){
                                        case 'salary_max':
                                            $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->where('name',$request['name'])->get();

                                            break;
                                        case 'salary_min':
                                            $people = People::where('name_boss',$request['name_boss'])->where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->where('name',$request['name'])->get();

                                            break;

                                    }
                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('position',$request['position'])->where('name',$request['name'])->get();

                                    break;


                            }
                            break;
                        case 'position':
                            switch ($count_search[2]){

                                case 'name_boss':
                                    switch ($count_search[3]){

                                        case 'salary_max':
                                            $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('name',$request['name'])->get();

                                            break;






                                        case 'salary_min':
                                            $people = People::where('name_boss',$request['name_boss'])->where('salary','>=',$request['salary_min'])->where('position',$request['position'])->where('name',$request['name'])->get();

                                            break;


                                    }
                                    break;






                                case 'salary_min':
                                    $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('position',$request['position'])->where('name',$request['name'])->get();

                                    break;


                            }
                            break;
                        case 'name_boss':
                            $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('name',$request['name'])->get();

                            break;


                    }

                    break;
                case 'patronymic':
                    switch ($count_search[1]){


                        case 'surname':
                            switch ($count_search[2]){

                                case 'position':
                                    switch ($count_search[3]){
                                        case 'name_boss':
                                            $people = People::where('position',$request['position'])->where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                            break;
                                        case 'salary_min':
                                            $people = People::where('position',$request['position'])->where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                            break;
                                        case 'salary_max':
                                            $people = People::where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                            break;


                                    }
                                    break;
                                case 'name_boss':
                                    switch ($count_search[3]){

                                        case 'salary_min':
                                            $people = People::where('name_boss',$request['name_boss'])->where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                            break;
                                        case 'salary_max':
                                            $people = People::where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                            break;


                                    }
                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('patronymic',$request['patronymic'])->get();

                                    break;


                            }
                            break;
                        case 'position':
                            switch ($count_search[2]){

                                case 'name_boss':
                                    switch ($count_search[3]){

                                        case 'salary_min':
                                            $people = People::where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->get();

                                            break;
                                        case 'salary_max':
                                            $people = People::where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->get();

                                            break;
                                    }
                                    break;
                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->get();

                                    break;
                            }
                            break;
                        case 'name_boss':

                            $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->get();


                            break;
                    }
                    break;
                case 'surname':


                    switch ($count_search[1]){

                        case 'position':
                            switch ($count_search[2]){

                                case 'name_boss':
                                    switch ($count_search[3]){
                                        case 'salary_min':
                                            $people = People::where('salary','>==',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('surname',$request['surname'])->get();

                                            break;
                                        case 'salary_max':
                                            $people = People::where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('surname',$request['surname'])->get();

                                            break;
                                    }

                                    break;



                                case 'salary_min':
                                    $people = People::where('salary','>=',$request['salary_min'])->where('salary','<=',$request['salary_max'])->where('position',$request['position'])->where('surname',$request['surname'])->get();

                                    break;


                            }
                            break;
                        case 'name_boss':

                            $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('surname',$request['surname'])->get();


                            break;


                    }
                    break;
                case 'position':
                    $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->get();
                    break;



            }
            break;
        case 5:
            if($request['name']==''&& $request['patronymic']==''){
                $people=People::where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['name']==''&& $request['surname']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['name']==''&& $request['name_boss']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['name']==''&& $request['position']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['name']==''&& $request['salary_min']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_max'])->where('position',$request['position'])->get();

            }else if($request['name']==''&& $request['salary_max']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_min'])->where('position',$request['position'])->get();

            }else if($request['patronymic']==''&& $request['surname']==''){
                $people=People::where('name',$request['name'])->where('salary','<=',$request['salary_max'])->where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_min'])->where('position',$request['position'])->get();

            }else if($request['patronymic']==''&& $request['name_boss']==''){
                $people=People::where('name',$request['name'])->where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('salary','<=',$request['salary_min'])->where('position',$request['position'])->get();

            }else if($request['patronymic']==''&& $request['position']==''){
                $people=People::where('name',$request['name'])->where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('salary','<=',$request['salary_min'])->where('name_boss',$request['name_boss'])->get();

            }else if($request['patronymic']==''&& $request['salary_min']==''){
                $people=People::where('name',$request['name'])->where('salary','<=',$request['salary_max'])->where('surname',$request['surname'])->where('position',$request['position'])->where('name_boss',$request['name_boss'])->get();

            }else if($request['patronymic']==''&& $request['salary_max']==''){
                $people=People::where('name',$request['name'])->where('salary','>=',$request['salary_min'])->where('surname',$request['surname'])->where('position',$request['position'])->where('name_boss',$request['name_boss'])->get();

            }else if($request['surname']==''&& $request['name_boss']==''){
                $people=People::where('name',$request['name'])->where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->get();

            }else if($request['surname']==''&& $request['position']==''){
                $people=People::where('name',$request['name'])->where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_max'])->get();

            }else if($request['surname']==''&& $request['salary_min']==''){
                $people=People::where('name',$request['name'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->where('name_boss',$request['name_boss'])->where('salary','<=',$request['salary_max'])->get();

            }else if($request['surname']==''&& $request['salary_max']==''){
                $people=People::where('name',$request['name'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->where('name_boss',$request['name_boss'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['name_boss']==''&& $request['position']==''){
                $people=People::where('name',$request['name'])->where('salary','<=',$request['salary_max'])->where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['name_boss']==''&& $request['salary_min']==''){
                $people=People::where('name',$request['name'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('salary','<=',$request['salary_max'])->get();

            }else if($request['name_boss']==''&& $request['salary_max']==''){
                $people=People::where('name',$request['name'])->where('position',$request['position'])->where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['position']==''&& $request['salary_min']==''){
                $people=People::where('name',$request['name'])->where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('salary','<=',$request['salary_max'])->get();

            }else if($request['position']==''&& $request['salary_max']==''){
                $people=People::where('name',$request['name'])->where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('salary','>=',$request['salary_min'])->get();

            }else if($request['salary_max']==''&& $request['salary_min']==''){
                $people=People::where('name',$request['name'])->where('name_boss',$request['name_boss'])->where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('position',$request['position'])->get();

            }







            break;
        case 6:
            if($request['name']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();
            }else if($request['patronymic']==''){
                $people=People::where('name',$request['name'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();
            }else if($request['surname']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('name',$request['name'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();
            }else if($request['position']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('name',$request['name'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();
            }else if($request['name_boss']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name',$request['name'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->get();
            }else if($request['salary_min']==''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('salary','<=',$request['salary_max'])->where('name',$request['name'])->get();
            }else if($request['salary_max']!=''){
                $people=People::where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->where('name',$request['name'])->where('salary','>=',$request['salary_min'])->get();
            }
            break;
        case 7:
            $people = People::where('salary','<=',$request['salary_max'])->where('salary','>=',$request['salary_min'])->where('patronymic',$request['patronymic'])->where('surname',$request['surname'])->where('name',$request['name'])->where('name_boss',$request['name_boss'])->where('position',$request['position'])->get();
            break;

    }



return $people;
}




    }




