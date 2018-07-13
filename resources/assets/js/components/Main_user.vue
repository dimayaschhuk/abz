<style>
    .btn-primary .test{

        background-color: red;

        color: white;

    }
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }































    a.button27 {
        position: relative;
        display: inline-block;
        width: 2em;
        height: 2em;
        line-height: 2em;
        vertical-align: middle;
        text-align: center;
        text-decoration: none;
        color: #000;
        outline: none;
        border-radius: 5px;
        box-shadow: 0 0 0 1px #ddd inset, 0 1px 1px #fff;
    }
    a.button27:hover {
        background: #dcdcdc linear-gradient(#fff, #dcdcdc);
        box-shadow: 0 0 0 1px #aaa inset, 0 1px 1px #aaa;
    }
    a.button27:active {
        background: none;
        box-shadow: 0 0 0 1px #bbb inset, 0 1px 3px rgba(0,0,0,.5) inset, 0 1px 2px #fff;
    }
    .showw:hover {

        cursor: pointer;
    }
</style>
<template>


    <div>







        <div class="modal fade" id="people" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >People</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="background-color: #ff4cbe">
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-11">
                                <div class="row">
                                    <div class="col-lg-2" style="text-align: center" ><h4>Ім'я</h4></div>
                                    <div class="col-lg-2" style="text-align: center" ><h4>По батькові</h4></div>
                                    <div class="col-lg-2" style="text-align: center"><h4>Призвіще</h4></div>
                                    <div class="col-lg-2" style="text-align: center" ><h4>Ім'я курівника</h4></div>
                                    <div class="col-lg-2" style="text-align: center" ><h4>Посада</h4></div>
                                    <div class="col-lg-2" style="text-align: center" ><h4>З/п</h4></div>
                                </div>
                            </div>



                        </div>
                        <div class="row" @click="delete_new_boss(row.id)"  data-dismiss="modal"  v-for="row in result_boss_people" style="background-color: #ff97a1;margin:1px 0 1px 0; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"  >

                                <div class="col-lg-1">
                                    <img style="width: 50px" v-bind:src="'/images/min/'+row.name_img">
                                </div>
                                <div class="col-lg-11">
                                    <div class="row">
                                        <div class="col-lg-2" style="text-align: center"><p>{{row.name}}</p></div>
                                        <div class="col-lg-2" style="text-align: center"><p>{{row.patronymic}}</p></div>
                                        <div class="col-lg-2" style="text-align: center"><p>{{row.surname}}</p></div>
                                        <div class="col-lg-2" style="text-align: center"><p>{{row.name_boss}}</p></div>
                                        <div class="col-lg-2" style="text-align: center"><p>{{row.position}}</p></div>
                                        <div class="col-lg-2" style="text-align: center"><p>{{row.salary}}</p></div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    <div class="modal-footer" >


                    </div>
                </div>
            </div>
        </div>








        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitl">People</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <button data-dismiss="modal" class="btn btn-primary" @click="delete_automatic">Розкинути підлеглих в сусідні відділи</button>
                        <button data-dismiss="modal" class="btn btn-primary"  data-toggle="modal" data-target="#people" @click="get_people_boss">Залишити відділ і вибрати нового керівника з цьогож відділу</button>
                        <button data-dismiss="modal" class="btn btn-primary" @click="delete_boss_in_all">Залишити відділ і вибрати нового керівника з усіх працівників</button>
                    </div>
                    <div class="modal-footer" >


                    </div>
                </div>
            </div>
        </div>








         <!--Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">People</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row"  v-show="show">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-primary btn-lg btn-block" @click="show=!show; edit_save=true ">Редагувати</button>

                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-primary btn-lg btn-block"data-toggle="modal" data-target="#deleteModal" data-dismiss="modal">Звільнити</button>


                            </div>
                        </div>
                        <br><br>

                        <div class="row" >
                            <div class="col-lg-5">

                                <div v-if="show">
                                    <img style="width: 300px" v-bind:src="'/images/max/'+name_img">
                                </div>
                                <div v-else="">

                                    <image-input image-src=""></image-input>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row" >
                                    <div class="col-lg-6"><h5>Ім'я</h5></div>
                                    <div class="col-lg-6"> <input type="text" v-bind:disabled="show" class="form-control" v-model="name" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>По батькові</h5></div>
                                    <div class="col-lg-6"> <input type="text" v-bind:disabled="show" class="form-control" v-model="patronymic" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>Призвіще</h5></div>
                                    <div class="col-lg-6"> <input type="text" v-bind:disabled="show" class="form-control" v-model="surname" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>Посада</h5></div>
                                    <div class="col-lg-6"> <input type="text" v-bind:disabled="show" class="form-control" v-model="position" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>Ім'я керівника</h5></div>
                                    <div class="col-lg-6"> <input type="text" v-bind:disabled="show" class="form-control" v-model="name_boss" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>Заробітня плата</h5></div>
                                    <div class="col-lg-6"> <input type="number" v-bind:disabled="show" class="form-control" v-model="salary" ></div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center" v-show="show_who_from">
                            <h1>who_from</h1>
                            <div  class="row showw"  v-for="row in who_from" @click="big_boss(row.id,row.name,row.patronymic)">


                                <div class="col-lg-2" style="text-align: center"><p>{{row.name}}</p></div>
                                <div class="col-lg-2" style="text-align: center"><p>{{row.patronymic}}</p></div>
                                <div class="col-lg-2" style="text-align: center"><p>{{row.surname}}</p></div>
                                <div class="col-lg-2" style="text-align: center"><p>{{row.name_boss}}</p></div>
                                <div class="col-lg-2" style="text-align: center"><p>{{row.position}}</p></div>
                                <div class="col-lg-2" style="text-align: center"><p>{{row.salary}}</p></div>


                            </div></div>
                        <br>    <br>

                    </div>
                    <div class="modal-footer" v-show="!show">
                        <button type="button" class="btn btn-info"  v-if="!test" @click="testt">Перевірити чи все введено вірно</button>

                        <div v-else="">
                            <button v-show="!edit_save"  type="button" class="btn btn-primary" data-dismiss="modal" @click="save">зберегти</button>
                            <button v-show="edit_save"  type="button" class="btn btn-primary test" data-dismiss="modal" @click="edit">Зберегти зміни</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>













        <!--<button class="btn btn-primary btn-lg" v-on:click="tuch('new','new','new','new','new')" data-toggle="modal" data-target="#exampleModalCenter">додати книгу</button>-->

        <br>
        <div class="container" style="background-color: #ffc4e2;border-radius: 5px">
            <button class="btn btn-primary" @click="add_people"  data-toggle="modal" data-target="#exampleModalCenter">Додати нову людину</button>
            <br>
            <div class="row">
                <div class="col-lg-4 offset-4" style="border-radius: 5px;background-color: #d46fff;text-align: center"><h1>Працівники</h1></div>
            </div>
            <br><br>
            <div class="row" v-show="!global_search">
                <div class="col-lg-9">

                    <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Пошук</span>
                    </div>
                    <input  placeholder="Введіть ім'я/по батькові/призвіще/ім'я начальника/посаду"type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" v-model="search">
                </div></div>

                <div class="col-lg-3"> <button @click="global_search =! global_search" class="btn btn-primary">global search</button></div>


            </div>

            <div  v-show="global_search">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Пизвіще ім'я по бітькові</span>
                            </div>
                            <input type="text" class="form-control"  v-model="search_surname" placeholder="призвіще">
                            <input type="text" class="form-control"  v-model="search_name" placeholder="ім'я">
                            <input type="text" class="form-control" v-model="search_patronymic" placeholder="по бітькові">

                        </div>

                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >заробітня плата</span>
                            </div>
                            <input type="text" class="form-control"  v-model="search_salary_min" placeholder="min">
                            <input type="text" class="form-control"  v-model="search_salary_max" placeholder="max">


                        </div>
                    </div>
                    <div class="col-lg-3"><input type="text" class="form-control" v-model="search_name_boss"  placeholder="Ім'я по батькові начальника"></div>
                    <div class="col-lg-3"><input type="text" class="form-control" v-model="search_position" placeholder="Посада"></div>


                    <div class="col-lg-2"><button @click="global_search_from_db" class="btn btn-primary">Пошук</button ></div>
                </div>
                <br><br>
                <div class="row">
                    <button  @click="global_search =! global_search" type="button" class="btn btn-primary btn-lg btn-block">Вернутися назад</button>

                </div>




            </div>




            <br>
            <div class="row" style="background-color: #ff4cbe">
                <div class="col-lg-1">

                </div>
                <div class="col-lg-11">
                    <div class="row">
                    <div class="col-lg-2" style="text-align: center" @click="filter('name')"><h4>Ім'я</h4></div>
                    <div class="col-lg-2" style="text-align: center" @click="filter('patronymic')"><h4>По батькові</h4></div>
                    <div class="col-lg-2" style="text-align: center" @click="filter('surname')"><h4>Призвіще</h4></div>
                    <div class="col-lg-2" style="text-align: center" @click="filter('name_boss')"><h4>Ім'я керівника</h4></div>
                    <div class="col-lg-2" style="text-align: center" @click="filter('position')"><h4>Посада</h4></div>
                    <div class="col-lg-2" style="text-align: center" @click="filter('salary')"><h4>Заробітня плата</h4></div>
                    </div>
                </div>



            </div>
            <!--data-toggle="modal" data-target="#exampleModalCenter"-->
            <div v-if="!global_search">
            <div class="row showw" data-toggle="modal" data-target="#exampleModalCenter" @click="tuch(row.name,row.patronymic,row.surname,row.name_boss,row.id_boss,row.position,row.salary,index,row.id,row.name_img)"  v-for="(row,index) in filteredBlogs" style="background-color: #ff97a1;margin:1px 0 1px 0; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"  >

                <div class="col-lg-1">
                    <img style="width: 100px" v-bind:src="'/images/min/'+row.name_img">
                </div>
                <div class="col-lg-11">
                    <div class="row">
                    <div class="col-lg-2" style="text-align: center"><p>{{row.name}}</p></div>
                    <div class="col-lg-2" style="text-align: center"><p>{{row.patronymic}}</p></div>
                    <div class="col-lg-2" style="text-align: center"><p>{{row.surname}}</p></div>
                    <div class="col-lg-2" style="text-align: center"><p>{{row.name_boss}}</p></div>
                    <div class="col-lg-2" style="text-align: center"><p>{{row.position}}</p></div>
                    <div class="col-lg-2" style="text-align: center"><p>{{row.salary}}</p></div>
                    </div>
                </div>



        </div>
            </div>
            <div v-else="">
                <div v-if="!result_searc">
                    <h1>{{bad_result_search}}</h1>
                </div>
            <div class="row showw" data-toggle="modal" data-target="#exampleModalCenter" @click="tuch(row.name,row.patronymic,row.surname,row.name_boss,row.id_boss,row.position,row.salary,index,row.id,row.name_img)"  v-for="(row,index) in search_people" style="background-color: #ff97a1;margin:1px 0 1px 0; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" v-else="" >

                <div class="col-lg-1">
                    <img style="width: 100px" v-bind:src="'/images/min/'+row.name_img">
                </div>
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-2" style="text-align: center"><p>{{row.name}}</p></div>
                        <div class="col-lg-2" style="text-align: center"><p>{{row.patronymic}}</p></div>
                        <div class="col-lg-2" style="text-align: center"><p>{{row.surname}}</p></div>
                        <div class="col-lg-2" style="text-align: center"><p>{{row.name_boss}}</p></div>
                        <div class="col-lg-2" style="text-align: center"><p>{{row.position}}</p></div>
                        <div class="col-lg-2" style="text-align: center"><p>{{row.salary}}</p></div>
                    </div>
                </div>



            </div>
            </div>
        </div>

        <br><br><br>
        <div class="row" v-show="!global_search">

            <span v-for="row in count_pages" style="margin-left: 10px" v-on:click="run_next_page(row)"> <a  class="button27" >{{row}}</a></span>
        </div>

    </div>
</template>

<script>



    export default {
        props: ['peoplee','number_page','count_pagee'],

        data(){
            return {

                result_boss_people:[],
                proba:[],

                id_boss:'',

                test:false,
                bad_result_search:'Введіть параметри для пошуку',
                result_searc:false,
                global_search:false,
                index_row:0,
                show_who_from:false,
                who_from:[],
                file: '',
                name:'',
                patronymic:'',
                surname:'',
                position:'',
                name_img:'',
                name_boss:'',
                salary:0,

                search:'',

                search_name:'',
                search_patronymic:'',
                search_surname:'',
                search_position:'',
                search_name_boss:'',
                search_salary_min:'',
                search_salary_max:'',

                id:0,
                filterr:'not',
                show:true,
                people:[],
                search_people:[],
                count_pages:[],
                i:1,
                save_show:false,

                edit_save:false,
            }

        },
        methods: {
            //удалить і вибрати керівника зі всіх працівників
            delete_boss_in_all:function () {
                axios.post(`/user/delete`, {
                    id:this.id,

                    status:'delete_boss_in_all_1',
                }).then(response=>{
                    if(response.data=='ok'){
                    window.location.href = '/';
                }

            });
            },

            //удалить переспроділити підлеглих автоматично
            delete_automatic:function () {

                axios.post(`/user/delete`, {
                        id:this.id,
                        id_boss:this.id_boss,
                    status:'delete_automatic',
                }).then(response=>{
                    if(response.data=='ok'){
                        alert('операція пройшла успішно');
                    window.location.href = '/user/list/';
                }

            });



            },



            get_people_boss:function () {
                axios.post(`/user/delete`, {

                    status:'get_people_boss',
                    id:this.id,
                }).then(response => {
                    this.result_boss_people=response.data
                });
            },

            //перевірка чи правельно було введено поле 'начальник'
            testt:function () {
                axios.post(`/user/test_data_for_save`, {

                    salary:this.salary,
                    name_boss:this.name_boss,
                }).then(response => {
alert(response.data[0]);
                if(response.data=='не заповнене поле начальник'){
                    alert(response.data);

                    }
                if(response.data== 'salary not'){
                    alert(response.data);

                }

                if(response.data==' в нас не працює'){
                    alert(name_boss+response.data);

                }
                if(response.data[0]=='ok'){
                    this.name_boss=response.data[2];
                    this.id_boss=response.data[1];
                    this.test=true;
                }
                if(response.data[0]=='who'){
                    this.show_who_from=true;
                    this.who_from=response.data[1];
                }
            });
            },

            //якщо існує декілька людей з такими ім'ям яке було вказано в полі 'начальник' то їх всіх побачить користувач і може вибрати когось конкретно
            big_boss:function(boss_id,boss_name,boss_patronymic) {
                this.name_boss=boss_name+' '+boss_patronymic;
                this.id_boss=boss_id;
                this.show_who_from=false;
                this.test=true;

            },

            //коли все введено вірно у користовача з'явится кнопка 'зберегти' і при натискані на наї дані будуть відправлено на сервер для збереження
            save:function () {
                axios.post(`/user/save`, {
                    status:'save',
                    name:this.name,
                    patronymic:this.patronymic,
                    surname:this.surname,
                    name_boss:this.name_boss,
                    id_boss:this.id_boss,
                    position:this.position,
                    salary:this.salary,
                }).then(response => {
                    if(response.data[0]==' збережено'){
                    alert(this.name+' '+this.patronymic+' '+this.surname+response.data);
                    if(response.data[1]=='new_page'){
                        window.location.href = '/user/list/'+row+'/'+this.filterr;
                    }else {
                        this.people.push(response.data[2]);
                    }
                }
                if(response.data[0]==' не збережено'){
                    alert(this.name+' '+this.patronymic+' '+this.surname+response.data);
                }




            });
                this.test=false;
            },

            //глобальний пошук по всій базі даних
            global_search_from_db:function () {
                if(this.search_name!=''||this.search_patronymic!=''||this.search_surname!=''||this.search_position!=''||this.search_name_boss!=''||this.search_salary_min!=''||this.search_salary_max!=''){
                    axios.post(`/global_search`, {
                        name:this.search_name,
                        patronymic:this.search_patronymic,
                        surname:this.search_surname,
                        position:this.search_position,
                        name_boss:this.search_name_boss,
                        salary_min:this.search_salary_min,
                        salary_max:this.search_salary_max,

                    }).then(response => {
                        this.result_searc=true;
this.search_people=response.data;

                });
                }


            },

            //вихід з 'особистого кабінета'
            out:function () {
                window.location.href = '/out';
            },

            //сортіровка по будь-якому полі
            filter:function(filter){

                axios.post(`/user/filter`, {
                    filter:filter,
                    number_page:this.number_page,
                }).then(response=>{
                    this.people=response.data;
                });
                this.filterr=filter;
                this.$cookie.set('filter', JSON.stringify(filter), 1);

             },





            //очищення полів які необхідні для додавання нової людини
            add_people:function () {
                    this.name='';
                    this.patronymic='';
                    this.position='';
                    this.surname='';
                    this.name_img='';
                    this.name_boss='';
                    this.salary=0;
                    this.show=false;
                    this.edit_save=false;
            },

            //перехід на нову сторінку з приміненим фільтром
            run_next_page:function(row){
                window.location.href = '/user/list/'+row+'/'+this.filterr;
            },

            //вивід в модальному вікні даних вибраного користувача
            tuch:function (name,patronymic,surname,name_boss,id_boss,position,salary,index,id,name_img) {
                            this.id=id;
                            this.index_row=index;
                            this.name=name;
                this.id_boss=id_boss;
                            this.name_img=name_img;
                            this.patronymic=patronymic;
                            this.surname=surname;
                            this.name_boss=name_boss;
                            this.position=position;
                            this.salary=salary;
                            this.show=true;


            },

            //редагування користувача
            edit:function () {
                axios.post(`/user/save`, {


                    name:this.name,
                    patronymic:this.patronymic,
                    surname:this.surname,
                    name_boss:this.name_boss,
                    id_boss:this.id_boss,
                    position:this.position,
                    salary:this.salary,


                    status:'edit',
                    id:this.id,





                }).then(response => {

                if(response.data[0]=='зміни збережено') {

                    if(this.global_search){
                        window.location.href = '/user/list';
                    }else {
                        this.people.push(response.data[1]);
                        this.people[this.index_row]=response.data[1];
                        this.people.pop();
                    }


                    alert('зміни збережено');

                }
                if(response.data[0]== ' не збережено') {
                    alert(response.data[0]);

                }


                });
                this.test=false;
            },

            //Вибір нового керівника з відділу де звільнють керівника
            delete_new_boss:function(id){
                axios.post(`/user/delete`, {
                    status:'delete_v2',
                    id:id,
                }).then(response=>{

                    if(response.data=='ok'){
                    alert('операція пройшла успішно');
                    window.location.href = '/user/list/';
                }

            });
            },

        },
        computed:{
            //пошук по сторінці
            filteredBlogs:function () {
                return this.people.filter((row)=>{

                        return row.name.match(this.search)|| row.patronymic.match(this.search)|| row.surname.match(this.search)|| row.name_boss.match(this.search)||row.position.match(this.search)
                    });


            }
        },
        created: function () {
            if(JSON.parse(this.$cookie.get('filter'))!= null){
                this.filterr = JSON.parse(this.$cookie.get('filter'));
            }
            this.people=this.peoplee;
            for(this.i;this.i<=this.count_pagee;this.i++){
                this.count_pages.push(this.i)
            }

        }


    }




</script>


