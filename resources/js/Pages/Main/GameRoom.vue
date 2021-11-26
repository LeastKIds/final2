<template>
    <layout></layout>
    <div style="height:150px;"></div>
    <div class="font-sans bg-grey-lighter flex flex-col min-h-screen w-full">
        <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
            <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6 p-3">

                    <div id="moka-w1wgf" class="items-center justify-center w-full p-8 flex flex-col">

                        <div id="moka-ix3cs" class="bg-gray-400 items-center justify-center md:w-1/2 w-full shadow-md p-5 h-auto rounded-lg blur-3 bg-opacity-50 flex flex-col col-span-12">
                            <h4 class="w-48 border-t-4 border-solid border-red-500 h-10" id="moka-uuij0">
                            </h4>
                            <h4 class="text-black    text-2xl" id="moka-8q3tt" style="font-family: Abel;">사람들 기다리는 중...</h4>
                            <h2 class="text-black   text-5xl text-center mt-2 mb-10" id="moka-cqg7a" style="font-family: &quot;Archivo Black&quot;;">함께 풀어요!</h2>
                            <button value="button" class="hover:text-gray-300 bg-yellow-800 text-white hover:bg-black w-56 p-4 text-2xl font-bold" id="moka-8pwrq" style="font-family: Barlow;">시작</button>
                        </div>
                    </div>

                <div class="flex flex-col items-center justify-center">
                    <div class="grid grid-cols-4 gap-4">

                        <div class="items-center justify-center flex flex-col inline-flex" v-for="(i, index) in test" :key="index">
                            <div class="bubble text-white w-40" v-if="chat">
                                <h3 class="m-1 font-black">welcomewelc</h3>
                            </div>
                            <div class="bubble2" v-if="chat===false">
                            </div>
                            <div class="card text-center shadow-2xl bg-gray-500 inline-flex m-1">
                                <div>
                                    <figure class="px-10 pt-6 z-0">
                                        <img class="object-center object-cover rounded-full h-20 w-20 z-" src="https://picsum.photos/id/1005/400/250" alt="photo">
                                    </figure>
                                    <div class="card-body z-0">
                                        <h2 class="card-title">이름</h2>
                                        <p>이메일</p>
                                        <div class="justify-center card-actions">
                                            <button class="btn btn-outline btn-accent">More info</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>

                </div>



            </div>



        </div>

    </div>
</template>

<script>
import Layout from './../Layouts/Layout.vue';

export default {
    name: "GameRoom",
    components: {
        Layout,
    },
    data() {
        return {
            test : [1,2,3,4],
            chat : false,
        }
    },
    mounted() {
        const val = this
        setTimeout(function() {
            val.chatClick()
        },3000)
        console.log('s')
    }
    ,
    methods: {
        chatClick() {
            this.chat = true
            console.log('t')
        }
    },
}
</script>

<style scoped>

.bubble{
    /*width: 230px;*/
    /*height: 50px;*/
    text-align: center;
    background: #808080;
    padding: 5px;
    margin: 35px auto;
    position: relative;
    border-radius:10px;
}
.bubble:before
{
    content: "";
    display: block;
    width: 0;
    border-width:15px 15px 0px 15px ;
    border-color:#808080 transparent;
    border-style:solid;
    position: absolute;
    bottom:-15px;
    right: 50%;
    transform: translateX(50%)
}

.bubble2{width: 230px;
    height: 50px;
    text-align: center;
    /*background: #808080;*/
    padding: 5px;
    margin: 35px auto;
    position: relative;
    border-radius:10px;
}
.bubble2:before
{
    /*content: "";*/
    display: block;
    width: 0;
    border-width:15px 15px 0px 15px ;
    /*border-color:#808080 transparent;*/
    border-style:solid;
    position: absolute;
    bottom:-15px;
    right: 50%;
    transform: translateX(50%)
}
</style>
