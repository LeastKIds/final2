<template>
    <div>
        <layout></layout>
        <div style="height:100px;">
        </div>

        <div style="text-align:center;" class="flex flex-col items-center justify-center text-gray-700">
            <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
                <div class="relative w-full mb-3 mt-8">
                    <label class="block uppercase text-blueGray-600
                    text-xs font-bold mb-2" for="full-name">단어장 제목</label>

                    <input type="text" class="bg-gray-300 border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full ease-linear transition-all duration-150" readonly
                           placeholder="단어장 제목" v-model="update_voca.title">
                </div>

                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600
                    text-xs font-bold mb-2" for="message">설명</label>
                    <textarea rows="4" cols="80" class="bg-gray-300 border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full" placeholder="설명 써줘요" v-model="update_voca.message" readonly></textarea>
                </div>


            </div>





        </div>
        <div style="text-align:center;" v-for="(word,index) in words_x" :key="word.id">
            <input type="text" placeholder="한자" class="text-center mb-2 bg-gray-100 p-2
            rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" readonly :value="word.kannzi" />
            <input type="text" placeholder="히라가나" class="text-center mb-2 bg-gray-100
            p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" readonly :value="word.hiragana" />
            <input type="text" placeholder="한글" class="text-center mb-2 bg-gray-100
             p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
              focus:border-indigo-600 m-1" readonly :value="word.korean" />




        </div>










    </div>
    <div style="height:100px;">
    </div>
</template>

<script>
import Layout from './../Layouts/Layout.vue';
import axios from 'axios'
export default {
    name: "CreateWords",
    components: {
        Layout,
    },
    props: ['voca','words'],
    data() {
        return{
            voca_x : '',
            words_x : '',
            error : {
                title : '',
                message : '',
            },
            update_voca : {
                title : '',
                message : '',
            },
            check : true,
            openModal : false,
            word : {
                kannzi : '',
                hiragana : '',
                korean : '',
            },
            edit_button : [],
            word_error : [],
            first_page : false,
        }
    },
    mounted () {
        console.log(this.words)
        this.voca_x = this.voca
        this.words_x = this.words
        this.update_voca.title = this.voca_x.title


    },
    methods : {


    }
}
</script>

<style scoped>

</style>
