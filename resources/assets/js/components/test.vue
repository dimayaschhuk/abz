<template>
    <div>
        <div

                :style="{'margin-left': `${depth*20}px`}"
                class="node">
            <div  style="background-color: #00acd6">
                <span style="color: #1c2d3f" >{{node.name}}  {{node.patronymic}}  {{node.surname}}</span>
                <p>Начальник-<span>{{node.name_boss}}</span></p>
                <p> Посада-<span style="color: #1c2d3f">{{node.position}}</span></p>
                <p> підлеглі<span class="type"  @click="next(depth,node.name)">{{expanded ? '&#9660;':'&#9658;'}}</span></p>
            </div>
        </div>



        <TreeBrowser
                v-if="expanded"
                v-for="child in node.children"
                :key="child.name"
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