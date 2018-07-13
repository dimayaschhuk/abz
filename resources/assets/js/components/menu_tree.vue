<template>
    <div>

        <button @click="ok" class="btn btn-primary" v-show="new_boss">Вибрати</button>
        <div class="modal fade"  v-bind:id='id_modal' tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">People</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <div class="row" >
                            <div class="col-lg-5">

                                    <img style="width: 300px" v-bind:src="'/images/max/'+name_img">


                            </div>
                            <div class="col-lg-7">
                                <div class="row" >
                                    <div class="col-lg-6"><h5>name</h5></div>
                                    <div class="col-lg-6"> <input type="text" disabled class="form-control" v-model="name" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>patronymic</h5></div>
                                    <div class="col-lg-6"> <input type="text" disabled class="form-control" v-model="patronymic" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>surname</h5></div>
                                    <div class="col-lg-6"> <input type="text" disabled class="form-control" v-model="surname" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>position</h5></div>
                                    <div class="col-lg-6"> <input type="text" disabled class="form-control" v-model="position" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>name_boss</h5></div>
                                    <div class="col-lg-6"> <input type="text" disabled class="form-control" v-model="name_boss" ></div>
                                </div>
                                <div class="row" >
                                    <div class="col-lg-6"><h5>salary</h5></div>
                                    <div class="col-lg-6"> <input type="number" disabled class="form-control" v-model="salary" ></div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

        <p data-toggle="modal" v-bind:data-target='id_modal_button'>{{name}}  {{patronymic}}  {{surname}}</p>
        <p data-toggle="modal" v-bind:data-target='id_modal_button'>Начальник-{{name_boss}}</p>
        <p data-toggle="modal" v-bind:data-target='id_modal_button'>Посада-{{position}}</p>








    </div>
</template>






<script>


    export default {

        props: ['id','name','patronymic','surname','id_boss','name_boss','position','salary','name_img','created_at','new_bosss'],
        data(){
            return{

                expanded:false,
                data:[],
                id_modal:'',
                id_modal_button:'',
                new_boss:false,

            }
        },
        methods:{
            ok:function () {
                axios.post(`/user/delete`, {
                    id:this.id,
                    name:this.name+' '+this.patronymic,
                    status:'delete_boss_in_all_2',
                }).then(response=>{
                    if(response.data=='ok'){
                    window.location.href = '/';
                }
                if(response.data=='error_boss'){
                   alert('не можна вибрати дану людину');
                }
                if(response.data=='$i>9999999999'){
                    alert('Виникла помилка');
                }

            });
            }
        },
        created: function () {
            if(this.new_bosss==1){
                this.new_boss=true;
            }
            this.id_modal='modal'+this.id;
            this.id_modal_button='#modal'+this.id;

        }


    }




</script>
<style scoped>


</style>