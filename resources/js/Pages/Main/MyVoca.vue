<template>
    <layout></layout>
    <section>
<!--        <div class="bg-black text-white py-8 h-screen" id="backgroundS">-->
<!--            <div class="container h-screen mx-auto flex flex-col items-start border-double border-4 border-light-blue-500 p-5-->
<!--            md:flex-row my-12 md:my-24">-->



<!--&lt;!&ndash;                <div>&ndash;&gt;-->
<!--&lt;!&ndash;                    <div id="whoobe-1yakq" class="w-60 xs:w-80 bg-white text-base  rounded-lg shadow m-auto -brown-400 border border-t-8 border-b-8 border-gray-700 m-10 flex flex-col">&ndash;&gt;-->
<!--&lt;!&ndash;                        <div id="whoobe-pa28x" class="p-4 flex flex-col text-center ">&ndash;&gt;-->
<!--&lt;!&ndash;                            <h3 type="element" class="text-4xl text-black mt-5 font-black" id="whoobe-ozjao">내 단어장</h3>&ndash;&gt;-->
<!--&lt;!&ndash;                            <search></search>&ndash;&gt;-->
<!--&lt;!&ndash;                            <List></List>&ndash;&gt;-->
<!--&lt;!&ndash;                            <button type="button" value="button" class="hover:text-white hover:bg-green-400&ndash;&gt;-->
<!--&lt;!&ndash;                            bg-gray-800 text-gray-400 m-auto my-4 px-6 py-2 text-lg&ndash;&gt;-->
<!--&lt;!&ndash;                            rounded shadow-px-4 border-0" id="whoobe-wkfvm" @click="open_modal">단어장 작성</button>&ndash;&gt;-->


<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="ml-16">&ndash;&gt;-->
<!--&lt;!&ndash;                        <pagination :voca="voca"/>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                </div>&ndash;&gt;-->

<!--                <div class="grid grid-colsl-1 gap-1">-->
<!--                    <div class="grid grid-cols-2 gap-2">-->
<!--                        <search></search>-->
<!--                        <pagination :voca="voca"></pagination>-->
<!--                    </div>-->

<!--                    <div class="grid grid-cols-2 gap-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">-->
<!--                        <div class=" flex  flex-col  md:flex-row justify-center-->
<!--                    flex-wrap gap-2 mt-5  mr-5 ml-5 mb-5" v-for="(v, index) in voca.data" :key="index">-->
<!--                            <voca-list :voca="v"></voca-list>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->






<!--            </div>-->
<!--        </div>-->

        <div class="w-full bg-black">
            <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
                <div class="text-center pb-12">
<!--                    <h2 style="visibility: hidden;" class="text-base font-bold text-indigo-600 hide">-->
<!--                        We have the best equipment in the market-->
<!--                    </h2>-->
<!--                    <h1 style="visibility: hidden;" class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-white hide">-->
<!--                        Check our awesome team memwhite-->
<!--                    </h1>-->
                </div>
                <div class="">
                    <search></search>
                        <pagination :voca="voca"></pagination>


                        <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500
                    text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100
                    focus:border-4 focus:border-green-300 flex relative
                    mx-auto max-w-md w-auto mt-2 mb-4" @click="open_modal">단어장 생성</button>



                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
<!--                    <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">-->
<!--                        <div class="mb-8">-->
<!--                            <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">-->
<!--                        </div>-->
<!--                        <div class="text-center">-->
<!--                            <p class="text-xl text-white font-bold mb-2">Dany Bailey</p>-->
<!--                            <p class="text-base text-gray-400 font-normal">Software Engineer</p>-->
<!--                        </div>-->
<!--                    </div>-->


                    <div v-for="v in voca.data" :key="v.id">
                        <voca-list :voca="v"></voca-list>
                    </div>
<!--                    <voca-list :voca="voca"></voca-list>-->
                </div>
            </section>
        </div>


        <jet-dialog-modal :show="openModal" @close="openModal = false">
            <template #title>
                단어장 만들기
            </template>

            <template #content>
                <div class="relative w-full mb-3 mt-8">
                    <label class="block uppercase text-blueGray-600
                    text-xs font-bold mb-2" for="full-name">단어장 제목</label>
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs
                mt-1 ml-1" v-if="error.title">{{error.title}}</span>
                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full ease-linear transition-all duration-150"
                           placeholder="단어장 제목" v-model="create_voca.title">
                </div>


                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600
                    text-xs font-bold mb-2" for="message">설명</label>
                    <textarea rows="4" cols="80" class="border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full" placeholder="설명 써줘요" v-model="create_voca.message"></textarea>
                </div>
                <div class="justify-center">
                    <button class="bg-yellow-600 text-white
                active:bg-blueGray-600 text-sm font-bold uppercase
                px-6 py-3 rounded shadow hover:shadow-lg outline-none
                focus:outline-none mr-1 mb-1 ease-linear transition-all
                duration-150 text-left mr-5" type="button" @click="close_modal">
                        닫기
                    </button>

                    <button class="bg-red-400 text-white
                active:bg-blueGray-600 text-sm font-bold uppercase
                px-6 py-3 rounded shadow hover:shadow-lg outline-none
                focus:outline-none mr-1 mb-1 ease-linear transition-all
                duration-150 text-right" type="button" @click="save_voca">
                        단어 추가하기
                    </button>
                </div>


            </template>


        </jet-dialog-modal>


    </section>
</template>

<script>
import {defineComponent} from "vue";
import Layout from './../Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Search from './../Button/Search.vue'
import List from './../Button/List.vue'
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import VocaList from './../Button/VocaList.vue'
import Pagination from './../Button/Pagination.vue'
// import VPagination from ''
// import Paginate from 'vuejs-paginate'
// import Pagination from 'vue-pagination-2';

import axios from 'axios'
export default {
    name: "MyVoca",
    components: {
        Head,
        Link,
        Layout,
        Search,
        List,
        JetDialogModal,
        VocaList,
        Pagination,
    },
    data() {
        return {
            voca : '',
            openModal : false,
            create_voca : {
                title : '',
                message : '',
            },
            error: {
                title : '',
                message : '',
            },
            data : '',
        }
    },
    mounted() {
        axios.get('/api/vocabulary')
            .then(response => {
                this.voca = response.data
                this.data = this.voca
                console.log(this.voca)

            }).catch(err => {
                console.log(err)

        })
    },
    methods : {
        open_modal() {
            this.openModal = true
        },
        close_modal() {
            this.openModal = false
        },
        save_voca() {
            let check = true
            if(!this.create_voca.title) {
                this.error.title='제목은 꼭 필요해요!'
                check = false
            }

            if(check === false)
                return
            const data = {
                title : this.create_voca.title,
                message : this.create_voca.message,
            }
            axios.post('/api/vocabulary', data)
                .then(response => {
                    console.log(response)
                }).catch(err => {
                    console.log(err)
            })
        },
        myCallback(pageNum) {
            console.log(pageNum)
        }
    }
}
</script>

<style scoped>

</style>
