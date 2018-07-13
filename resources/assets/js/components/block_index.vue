<template>
<div>


    <TreeBrowser
        :node="root"
        :new_boss="new_boss"
        v-on:next_man="next_man"
    />
</div>
</template>
<script>
    export default {
        props:['peoples','new_boss'],
data(){
    return{

        root:{},
        i:0,
        name:'',
    }
},
        methods:{
            next_man(data){
                axios.post(`/next_man`, {
                    name:data[1]}).then(response => {
                        if(response.data!='')
                {
                    switch (data[0]) {
                        case 1:
                            var name;
                            this.root['children'].filter(function (item) {
                                if (item.name == data[2][0]) {
                                    item.children = response.data;
                                    name =item.name+' '+item.patronymic+' '+item.surname;
                                }
//
                            });
                            alert('завантажуются підлеглі ' + name+'?');
                            break;
                        case 2:
                            var name;
                            this.root['children'].filter(function (item) {
                                if (item.name == data[2][1]) {
                                    item['children'].filter(function (iten) {
                                        if (iten.name == data[2][0]) {
                                            iten.children = response.data;
                                            name =iten.name+' '+iten.patronymic+' '+iten.surname;

                                        }
                                    });
                                }
                            });
                            alert('завантажуются підлеглі ' +name);
                            break;
                        case 3:
                            var name;
                            this.root['children'].filter(function (item) {
                                if (item.name == data[2][2]) {
                                    item['children'].filter(function (iten) {
                                        if (iten.name == data[2][1]) {
                                            iten['children'].filter(function (itez) {
                                                if (itez.name == data[2][0]) {
                                                    itez.children = response.data;
                                                     name =iten.name+' '+iten.patronymic+' '+iten.surname;
//                                                    this.name=itez.name;

                                                     name =iten.name+' '+iten.patronymic+' '+iten.surname;
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                            alert('завантажуются підлеглі ' + this.name);
                            break;
                        case 4:
                            var name;
                            this.root['children'].filter(function (item) {
                                if (item.name == data[2][3]) {
                                    item['children'].filter(function (iten) {
                                        if (iten.name == data[2][2]) {
                                            iten['children'].filter(function (itez) {
                                                if (itez.name == data[2][1]) {
                                                    itez['children'].filter(function (itex) {
                                                        if (itex.name == data[2][0]) {
                                                            itex.children = response.data;
                                                             name =iten.name+' '+iten.patronymic+' '+iten.surname;
//                                                            this.name=itex.name;

                                                        }
                                                    });
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                            alert('завантажуются підлеглі ' + this.name);
                            break;
                        case 5:
                            var name;
                            alert('Перебор');
                            break;
                        case 6:
                            alert('Перебор');
                            break;
                        case 7:
                            alert('Перебор');
                            break;
                        case 8:
                            alert('Перебор');
                            break;
                        case 9:
                            alert('Перебор');
                            break;
                        case 10:
                            alert('Перебор');
                            break;
                        default:
                            alert('системою передюачно иерархию до 10 рівнів');
                    }
//                    this.root['children'][0].children=response.data;
       ;
                }else {
                            alert('ytvf gslktukb[')
                }
            });
console.log(data[2]);
            },

        },
        created: function () {
           this.root=this.peoples;


        }


    }
</script>
<style>

</style>


















































<!--<template>-->

    <!--<div>-->
<!--{{category}}-->
        <!--<div>-->
            <!--<ol>-->
                <!--<tree :nodes="category" :show_checkbox="show_checkbox" :depth="0" v-on:push_people="push_people"></tree>-->
            <!--</ol>-->
        <!--</div>-->


        <!--<button v-on:click="test" >ok</button>-->


    <!--</div>-->


<!--</template>-->






<!--<script>-->


    <!--export default {-->
        <!--props: ['peoples'],-->
        <!--data(){-->
            <!--return {-->

                <!--id: '',-->
                <!--category: [],-->
                <!--show_checkbox: false,-->
                <!--subcaregory: [],-->
                <!--where: '',-->
                <!--who: '',-->
                <!--show_ok: false,-->
                <!--idd: 0,-->
                <!--iddd: 0,-->
                <!--categor_set:[],-->


            <!--}-->

        <!--},-->
        <!--methods: {-->

<!--test:function () {-->

    <!--var finalObj = this.category.concat({ "111": [ { "id": 22, "name": "qqqqqqqq", "patronymic": "Михайлович", "surname": "Ящук", "boss": 0, "position": "головний иректор", "salary": 999999.99, "name_img": null, "created_at": null, "updated_at": null } ]});-->


    <!--this.category = finalObj;-->
<!--//    this.category.push('aaaaaaaaaaaaaaaaaaaaaaaaaaaa');-->
<!--},-->
            <!--push_people(data){-->
<!--//                this.category.push({ "0": [ { "id": 22, "name": "Вася", "patronymic": "Михайлович", "surname": "Ящук", "boss": 0, "position": "головний иректор", "salary": 999999.99, "name_img": null, "created_at": null, "updated_at": null } ]});-->
<!--//                axios.post(`/test`, {id:data[0]}).then(response => {-->

<!--//alert(response.data);-->
<!--//                    this.category.push(response.data);-->


<!--//                });-->



            <!--},-->

        <!--},-->
        <!--created: function () {-->
            <!--this.category = this.peoples;-->
        <!--}-->


    <!--}-->




<!--</script>-->
