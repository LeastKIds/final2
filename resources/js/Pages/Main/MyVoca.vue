<template>
    <layout></layout>
    <section>

        <div class="w-full bg-black">
            <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
                <div class="text-center pb-12">
                </div>
                <div style="text-align:center;" class="flex flex-col items-center justify-center">
                    <search></search>
                    <div
                        v-if="button_set === 1 && this.voca.last_page !==1"
                        class="flex relative mx-auto max-w-md w-auto mt-2 mb-5">

                                <button class="px-4 py-2 rounded-md text-sm
                                    font-medium border focus:outline-none focus:ring
                                    transition text-yellow-600 border-yellow-600 hover:text-white
                                    hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300"
                                        @click="select(voca.prev_page_url)"
                                        v-if="voca.prev_page_url"  type="submit">이전</button>

                        <div v-for="i in list" :key="i" class="inline-flex">


                            <button class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring bg-yellow-50
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                                    v-if="i === voca.current_page"
                                    type="submit" @click="pageSelect(i)">{{i}}</button>

                            <button class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                                    v-else @click="pageSelect(i)"
                                    type="submit" >{{i}}</button>

                        </div >


                        <div class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                                v-if="voca.current_page + 7 <= voca.last_page"
                                 >...</div>


                        <button class="px-4 py-2 rounded-md text-sm font-medium border
                            focus:outline-none focus:ring transition text-yellow-600
                            border-yellow-600 hover:text-white hover:bg-yellow-600
                            active:bg-yellow-700 focus:ring-yellow-300 ml-1"
                                @click="select(voca.next_page_url)"
                                v-if="voca.next_page_url" type="submit">다음</button>

                    </div>


                    <div
                        v-if="button_set === 2"
                        class="flex relative mx-auto max-w-md w-auto mt-2 mb-5">

                        <button class="px-4 py-2 rounded-md text-sm
                                    font-medium border focus:outline-none focus:ring
                                    transition text-yellow-600 border-yellow-600 hover:text-white
                                    hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300"
                                @click="select(voca.prev_page_url)"
                                v-if="voca.prev_page_url"  type="submit">이전</button>

                        <div class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                        >...</div>


                        <div v-for="i in list" :key="i" class="inline-flex">


                            <button class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring bg-yellow-50
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                                    v-if="i === voca.current_page"
                                    type="submit" @click="pageSelect(i)">{{i}}</button>

                            <button class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                                    v-else @click="pageSelect(i)"
                                    type="submit" >{{i}}</button>

                        </div >





                        <button class="px-4 py-2 rounded-md text-sm font-medium border
                            focus:outline-none focus:ring transition text-yellow-600
                            border-yellow-600 hover:text-white hover:bg-yellow-600
                            active:bg-yellow-700 focus:ring-yellow-300 ml-1"
                                @click="select(voca.next_page_url)"
                                v-if="voca.next_page_url" type="submit">다음</button>

                    </div>


                    <div
                        v-if="button_set === 3"
                        class="flex relative mx-auto max-w-md w-auto mt-2 mb-5">

                        <button class="px-4 py-2 rounded-md text-sm
                                    font-medium border focus:outline-none focus:ring
                                    transition text-yellow-600 border-yellow-600 hover:text-white
                                    hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300"
                                @click="select(voca.prev_page_url)"
                                v-if="voca.prev_page_url"  type="submit">이전</button>

                        <div class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"

                        >...</div>


                        <div v-for="i in list" :key="i" class="inline-flex">


                            <button class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring bg-yellow-50
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                                    v-if="i === voca.current_page"
                                    type="submit" @click="pageSelect(i)">{{i}}</button>

                            <button class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
                                    v-else @click="pageSelect(i)"
                                    type="submit" >{{i}}</button>

                        </div >


                        <div class="px-4 py-2 rounded-md text-sm
                             font-medium border focus:outline-none focus:ring
                             transition text-yellow-600 border-yellow-600 hover:text-white
                             hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"

                        >...</div>


                        <button class="px-4 py-2 rounded-md text-sm font-medium border
                            focus:outline-none focus:ring transition text-yellow-600
                            border-yellow-600 hover:text-white hover:bg-yellow-600
                            active:bg-yellow-700 focus:ring-yellow-300 ml-1"
                                @click="select(voca.next_page_url)"
                                v-if="voca.next_page_url" type="submit">다음</button>

                    </div>
















                        <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500
                    text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100
                    focus:border-4 focus:border-green-300 flex relative
                    mx-auto max-w-md w-auto mt-2 mb-4" @click="open_modal">단어장 생성</button>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">


                    <div v-for="v in voca.data" :key="v.id">
                        <voca-list :voca="v" @read="read_voca"></voca-list>
                    </div>
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
                    <input type="text" class="bg-gray-300 border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full ease-linear transition-all duration-150"
                           placeholder="단어장 제목" v-model="create_voca.title">
                </div>


                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600
                    text-xs font-bold mb-2" for="message">설명</label>
                    <textarea rows="4" cols="80" class="bg-gray-300 border-0 px-3 py-3 placeholder-blueGray-300
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
            list : [],
            button_set : 1,
            currentPage: 1,
            totalPages: 10
        }
    },
    mounted() {
        this.read_voca()
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
                    if(response.data.success === 1) {
                        console.log(response.data)

                        const url = '/vocabulary/' + response.data.voca.id
                        location.href= url
                    }else {
                        alert('오류 발생! 잠시 후, 다시 시도해 주세요.')
                    }

                }).catch(err => {
                    console.log(err)
            })
        },
        select(url) {
            axios.get(url)
                .then(response => {
                    if(response.data.success === 1) {
                        this.voca=response.data
                        console.log(response)
                        this.page(this.voca)
                    }else {
                        alert('오류 발생! 잠시 후, 다시 시도해 주세요.')
                    }

                }).catch(err => {
                console.log(err)
            })
        },
        pageSelect(page) {
            console.log(page)
            axios.get(this.voca.links[page].url)
                .then(response => {
                    console.log(response)
                        this.voca=response.data
                        // console.log(response)
                        this.page(this.voca)

                }).catch(err => {
                console.log(err)
            })

        },
        page(v) {
            this.list=[]
            if(v.current_page < 5) {
                this.button_set = 1
                console.log(1)
                let page = 0
                if(v.last_page <= 7)
                    page = v.last_page
                else
                    page = 7
                for (let i = 1; i <= page; i++) {
                    this.list.push(i)
                }
            }else if(v.current_page >= v.last_page - 4) {
                this.button_set = 2
                console.log(2)
                for (let i = v.last_page - 5; i<= v.last_page; i++){
                    this.list.push(i)
                }
                console.log(this.list)
            }
            else {
                this.button_set = 3
                console.log(3)
                for (let i = v.current_page -2; i <= v.current_page + 2; i ++) {
                    this.list.push(i)
                }
            }
        },
        read_voca() {
            console.log('read_voca')
            axios.get('/api/vocabulary')
                .then(response => {
                    this.voca = response.data
                    console.log(this.voca)
                    this.page(this.voca)

                }).catch(err => {
                console.log(err)
            })
        },
    }
}
</script>

<style scoped>

</style>
