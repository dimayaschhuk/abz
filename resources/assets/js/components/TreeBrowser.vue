<template>
    <div>
        <div

                :style="{'margin-left': `${depth*40}px`}"
                class="node">

            <div style="background-color: #0B90C4; width: 30%;border-radius: 25px;padding: 20px; margin-top: 10px">
                    <menu_tree

                        :id="node.id"
                         :name="node.name"
                         :patronymic="node.patronymic"
                         :surname="node.surname"
                         :id_boss="node.id_boss"
                         :name_boss="node.name_boss"
                         :position="node.position"
                         :salary="node.salary"
                         :name_img="node.name_img"
                         :created_at="node.created_at"

                         :new_bosss="new_boss"
                    />
            <p> підлеглі<span class="type"  @click="next(depth,node.name)">{{expanded ? '&#9660;':'&#9658;'}}</span></p>
        </div>

        </div>



        <TreeBrowser
              v-if="expanded"
              v-for="child in node.children"
              :key="child.name"
              :new_boss="new_boss"
              :node="child"
              :depth="depth +1"
              v-on:next_man="next_man"

        />





    </div>
</template>






<script>


    export default {
        name:'TreeBrowser',
        props: {
            node:Object,
            new_boss:{
                type:Number,
                default:0,
            },
            depth:{
                type:Number,
                default:0,
            }
        },
        data(){
            return{
                expanded:false,
                data:[],

            }
        },
        methods:{
            //кнопка яка підгружає підлеглих
            next:function (depth,name) {
                if(this.node.children==undefined){

                     this.data[0]=depth;
                    this.data[1]=name;
                    this.data[2]=[];
                    this.data[2].push(this.node.name);
                    this.$emit('next_man', this.data);
                }else{
                    this.expanded =! this.expanded;
                }


            },
            next_man(data){
                data[2].push(this.node.name);
                this.$emit('next_man', data);
            }
        }


    }




</script>
<style scoped>
    .node{
        text-align:left;
        font-size:18px;
    }

</style>