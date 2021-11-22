<template>
    <layout></layout>
    <section>

        <div class="w-full bg-black">
            <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
                <div class="text-center pb-12">
                </div>
                <div style="text-align:center;" class="flex flex-col items-center justify-center">
                    <search @searching="searching"></search>
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


                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">


                    <div v-for="v in voca.data" :key="v.id">
                        <voca-list :voca="v" @read="read_voca"></voca-list>
                    </div>
                </div>
            </section>
        </div>

    </section>
</template>

<script>
import {defineComponent} from "vue";
import Layout from './../Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Search from './../Button/Search.vue'
import List from './../Button/List.vue'
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import VocaList from './../Button/VocaListOther.vue'
import Pagination from './../Button/Pagination.vue'

import axios from 'axios'
export default {
    name: "OtherVoca",
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
            totalPages: 10,
            search_word : '',
        }
    },
    mounted() {
        this.read_voca()
    },
    methods : {
        select(url) {
            console.log(url)
            axios.get(url)
                .then(response => {

                    this.voca=response.data.voca
                    console.log(response)
                    this.page(this.voca)


                }).catch(err => {
                console.log(err)
            })
        },
        pageSelect(page) {
            console.log(page)
            axios.get(this.voca.links[page].url)
                .then(response => {
                    console.log(response)
                    this.voca=response.data.voca
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
            console.log('other_voca')


            if(this.search_word) {
                this.search_axios()
            } else {
                axios.get('/api/other')
                    .then(response => {
                        this.voca = response.data.voca
                        console.log(this.voca)
                        this.page(this.voca)

                    }).catch(err => {
                    console.log(err)
                })
            }

        },
        searching(search) {
            console.log(search)
            this.search_word = search
            this.search_axios()
        },
        search_axios() {
            axios.get('/api/other/words/search/'+this.search_word)
                .then(response => {
                    this.voca = response.data.voca
                    console.log(this.voca)
                    this.page(this.voca)
                }).catch(err => {
                console.log(err)
            })
        }

    }
}
</script>

<style scoped>

</style>
