<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function delete(Request $request)
    {
        switch ($request['status']) {
            case 'delete_boss_in_all_1':
                $request->session()->put('flag','ok');
                $request->session()->put('old_boss',$request['id']);

                return 'ok';
                break;
            case 'delete_boss_in_all_2':
                $flag=false;
                $ok=0;
                $i=0;
                $id=$request->session()->get('old_boss');

                $id_new_boss=$request['id'];
                while ($ok===0){
                    $old_boss=People::find($id);
                    $id=$old_boss->id_boss;
                    if($id===0){

                        $flag=true;
                        $ok=7;
                    }
                    if($id===$id_new_boss){

                        return 'error_boss';
                    }
                    if($i>9999999999){

                        return '$i>9999999999';
                    }
                    $i++;



                }

if($request['123']==='123'){$flag=true;}
                if($flag){
                    $peoples=People::where('id_boss',  $request->session()->get('old_boss'))->get();
                    switch (count($peoples)){
                        case 0:
                            return 'нема підлеглих у даного персонажа';
                            break;
                        case 1:
                            $peoples->id_boss=$request['id'];
                            $peoples->name_boss=$request['name'];
                            $peoples->save();

                            break;
                        default:
                            foreach ($peoples as $item) {
                                $item->name_boss=$request['name'];
                                $item->id_boss=$request['id'];
                                $item->save();
                            }

                    }
                    $peoples=People::find($request->session()->get('old_boss'));
                    $peoples->delete();
                    $request->session()->put('flag','null');

                }


                return 'ok';
                break;
            case 'delete_automatic':
                $peoples=People::where('id_boss',$request['id'])->get();
                $boss=People::where('id_boss',$request['id_boss'])->where('id','!=',$request['id'])->get();

                switch (count($boss)){
                    case 0:
                        return 'нема суміжних відділів';
                        break;
                    case 1:
                        switch (count($peoples)){
                            case 0:
                                return 'нема підлеглих у даного персонажа';
                                break;
                            case 1:
                                $peoples->id_boss=$boss->id;
                                $peoples->name_boss=$boss->name.' '.$boss->patronymic;
                                $peoples->save();

                                break;
                            default:
                                foreach ($peoples as $item) {
                                    $item->name_boss=$boss->name.' '.$boss->patronymic;
                                    $item->id_boss=$boss->id;
                                    $item->save();
                                }

                        }
                        break;
                    default:
                        switch (count($peoples)){
                            case 0:
                                return 'нема підлеглих у даного персонажа';
                                break;
                            case 1:
                                $peoples->id_boss=$boss[0]->id;
                                $peoples->name_boss=$boss[0]->name.' '.$boss[0]->patronymic;
                                $peoples->save();

                                break;
                            default:
                                $test=[];
                                $count=ceil(count($peoples)/count($boss));
                                foreach ($peoples as $item){
                                    array_push($test,$item);
                                }
                                $peoples=array_chunk($test,$count);
                                    $i=0;
                                foreach ($boss as $iten){
                                        foreach ($peoples[$i] as $item) {
                                            $item->name_boss = $iten->name .' '. $iten->patronymic;
                                            $item->id_boss = $iten->id;
                                            $item->save();
                                        }
                                        $i++;

                                }


                        }


                }

                $old_boss=People::find($request['id']);
                $old_boss->delete();
return 'ok';
                break;

            case 'delete_v2':

                $people=People::find( $request['id']);
                $people->name_boss= $request->session()->get('boss')['name_boss'];
                $people->id_boss= $request->session()->get('boss')['id_boss'];
                $people->position= $request->session()->get('boss')['position'];
                $people->save();

                $peoples=People::where('id_boss',$request->session()->get('boss')['id'])->get();
                foreach ($peoples as $item) {
                    $item->name_boss=$people->name.' '.$people->patronymic;
                    $item->id_boss=$people->id;
                    $item->save();
                }



return 'ok';
                break;

            case 'get_people_boss':
                $people = People::find($request['id']);
                $request->session()->put('boss',$people);
                $people->delete();
                $people = People::where('id_boss', $request['id'])->get();

                return $people;
              break;





        }
    }

    //перевірка введених даних при створені нових людей або редагуванні
    public function test_data_for_save(Request $request){
        if(!is_numeric($request['salary'])){
            return 'salary not';
        }
        $name_boss = explode(" ", $request['name_boss']);



        switch (count($name_boss)){
            case 0:
                $data[0]='не заповнене поле начальник';
                return $data;

                break;
            case 1:

                $count_boss=People::where('name',$name_boss[0])->count();
                if($count_boss===0){
                    $data[0]=' в нас не працює';
                    return $data;

                }
                if($count_boss===1){
                    $people=People::where('name',$name_boss[0])->first();
                    $data[0]='ok';
                    $data[1]=$people->id;
                    $data[2]=$people->name.' '.$people->patronymic;

                    return $data;
                }
                if($count_boss>1){
                    $peoples=People::where('name',$name_boss[0])->get();
                    $data[0]='who';
                    $data[1]=$peoples;
                    return $data;
                }

                break;
            case 2:

                $count_boss=People::where('name',$name_boss[0])->where('patronymic',$name_boss[1])->count();

                if($count_boss===0){
                    $data[0]=' в нас не працює';
                    return $data;
                }
                if($count_boss===1){

                    $people=People::where('patronymic',$name_boss[1])->where('name',$name_boss[0])->first();
                    $data[0]='ok';
                    $data[1]=$people->id;
                    $data[2]=$people->name.' '.$people->patronymic;
                    return $data;
                }
                if($count_boss>1){
                    $peoples=People::where('patronymic',$name_boss[1])->where('name',$name_boss[0])->get();
                    $data[0]='who';
                    $data[1]=$peoples;
                    return $data;
                }

                break;
            case 3:
                $count_boss=People::where('patronymic',$name_boss[1])->where('name',$name_boss[0])->where('surname',$name_boss[2])->count();
                if($count_boss===0){
                    $data[0]=' в нас не працює';
                    return $data;
                }
                if($count_boss===1){
                    $people=People::where('surname',$name_boss[2])->where('name',$name_boss[0])->where('patronymic',$name_boss[1])->first();
                    $data[0]='ok';
                    $data[1]=$people->id;
                    $data[2]=$people->name.' '.$people->patronymic;
                    return $data;
                }
                if($count_boss>1){
                    $peoples=People::where('surname',$name_boss[2])->where('name',$name_boss[0])->where('patronymic',$name_boss[1])->get();
                    $data[0]='who';
                    $data[1]=$peoples;
                    return $data;
                }

                break;


        }

    }

    //сортіровка
    public function filter(Request $request){

        switch ($request['filter']){
            case 'not':
                $people=People::offset($request['number_page']*100-100)->limit(100)->get();
                break;

             case 'name_boss':
                $people=People::offset($request['number_page']*100-100)->orderBy('name_boss')->limit(100)->get();
                 break;
            case 'patronymic':
                $people=People::offset($request['number_page']*100-100)->orderBy('patronymic')->limit(100)->get();
                break;
            case 'surname':
                $people=People::offset($request['number_page']*100-100)->orderBy('surname')->limit(100)->get();
                break;

            case 'name':
                $people=People::offset($request['number_page']*100-100)->orderBy('name')->limit(100)->get();
                break;
            case 'salary':
                $people=People::offset($request['number_page']*100-100)->orderBy('salary')->limit(100)->get();
                break;


        }
        return $people;
    }


    public function index($number_page = 1, $filter='not')
    {

        $count_page=ceil (People::all()->count()/100);
switch ($filter){
    case 'not':
        $people=People::offset($number_page*100-100)->limit(100)->get();
        break;
    case 'patronymic':
        $people=People::offset($number_page*100-100)->orderBy('patronymic')->limit(100)->get();
        break;
    case 'surname':
        $people=People::offset($number_page*100-100)->orderBy('surname')->limit(100)->get();
        break;

    case 'name':
        $people=People::offset($number_page*100-100)->orderBy('name')->limit(100)->get();

        break;
    case 'salary':
        $people=People::offset($number_page*100-100)->orderBy('salary')->limit(100)->get();
        break;
    case 'name_boss':
        $people=People::offset($number_page*100-100)->orderBy('name_boss')->limit(100)->get();
        break;



}




        return view('for_auth.index', array(
            'people' => $people,
            'number_page'=>$number_page,
            'count_page'=>$count_page,
        ));
    }

    //збереження картинки в двух розмірах
    public function save_img(Request $request)
{


    $final_width_of_image = 100;
    $path_to_image_directory = 'images/max/';
    $path_to_thumbs_directory = 'images/min/';


    function createThumbnail($filename)
    {
        $final_width_of_image = 100;
        $path_to_image_directory = 'images/max/';
        $path_to_thumbs_directory = 'images/min/';


        if (preg_match('/[.](jpg)$/', $filename)) {
            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
        } else if (preg_match('/[.](gif)$/', $filename)) {
            $im = imagecreatefromgif($path_to_image_directory . $filename);
        } else if (preg_match('/[.](png)$/', $filename)) {
            $im = imagecreatefrompng($path_to_image_directory . $filename);
        }

        $ox = imagesx($im);
        $oy = imagesy($im);

        $nx = $final_width_of_image;
        $ny = floor($oy * ($final_width_of_image / $ox));

        $nm = imagecreatetruecolor($nx, $ny);

        imagecopyresized($nm, $im, 0, 0, 0, 0, $nx, $ny, $ox, $oy);

        if (!file_exists($path_to_thumbs_directory)) {
            if (!mkdir($path_to_thumbs_directory)) {
                die("Возникли проблемы! попробуйте снова!");
            }
        }
        imagejpeg($nm, $path_to_thumbs_directory . $filename);
        $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';
        $tn .= '<br />Поздравляем! Ваше изображение успешно загружено и его миниатюра удачно выполнена. Выше Вы можете просмотреть результат:';

    }
    if (isset($_FILES['file'])) {

        if (preg_match('/[.](jpg)|(gif)|(png)$/', //Ставим допустимые форматы изображений для загрузки
            $_FILES['file']['name'])) {
            $type = explode('.', $_FILES['file']['name']);
            $type = $type[count($type) - 1];

            $b = md5_file($_FILES['file']['tmp_name']) . '.' . $type;
            $filename = md5_file($_FILES['file']['tmp_name']) . '.' . $type;
            $source = $_FILES['file']['tmp_name'];
            $target = $path_to_image_directory . $filename;

            move_uploaded_file($source, $target);

            createThumbnail($filename);
        }
    }
    $request->session()->put('name_img',$b);
    return 'зображення завантажено на сервер і прикріплено до даного запису';






//

}


    //збереження або редагування людей
    public function save(Request $request){

if($request['status']==='save'){
    $q=0;
    if(People::all()->count()%100===0){
        $q=17;
    }


    $people = new People();
    $people->name = $request['name'];
    $people->patronymic =$request['patronymic'];
    $people->surname = $request['surname'];
    $people->position = $request['position'];
    $people->id_boss = $request['id_boss'];
    $people->name_boss = $request['name_boss'];
    $people->salary = $request['salary'];
    $people->name_img =$request->session()->get('name_img');
    $people->save();
    if ($people->save()) {
        $request->session()->put('name_img','null');
        $data[0]=' збережено';
        if($q===17){

            $data[0]='new_page';

            return $data;

        }
        $data[1]='ok';
        $data[2]=$people;
        return $data;
    }else{
        $data[0]=' не збережено';
    }
}else{



    $people =People::find($request['id']);
    $people->name = $request['name'];
    $people->patronymic =$request['patronymic'];
    $people->surname = $request['surname'];
    $people->position = $request['position'];
    $people->id_boss = $request['id_boss'];
    $people->name_boss = $request['name_boss'];
    $people->salary = $request['salary'];
    if($request->session()->get('name_img')!='null'){
        $people->name_img =$request->session()->get('name_img');
    }

    $people->save();
    if ($people->save()) {
        $request->session()->put('name_img','null');

        $data[0]='зміни збережено';
        $data[1]=$people;
        return $data;

    }else{
        $data[0]=' не збережено';
        return $data;
    }
}




    }





}
