<template>
    <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center border-double border-4 border-light-blue-500">
        <div class="mb-8">
            <img class="object-center object-cover rounded-full h-20 w-20" :src="voca.user.profile_photo_url" alt="photo">
        </div>
        <div class="text-center">
            <p class="text-xl text-white font-bold mb-2  w-48 truncate">{{voca.title}}</p>
            <p class="text-base text-gray-400 font-normal w-48 truncate">{{voca.message}}</p>

            <div class="flex items-center justify-center w-full mt-5 mb-5">

                <div class="flex items-center justify-center w-full mb-12">

                    <div class="m-3" v-if="open_check === false">
                        <button class="bg-white text-gray-800
                        font-bold rounded border-b-2 border-yellow-500
                        hover:border-yellow-600 hover:bg-yellow-500 hover:text-white
                        shadow-md py-2 px-6 inline-flex items-center" @click="open_voca">
                            <span class="mr-2">비공개</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentcolor" d="M6 2v6h.01L6 8.01 10 12l-4 4 .01.01H6V22h12v-5.99h-.01L18 16l-4-4 4-3.99-.01-.01H18V2H6zm10 14.5V20H8v-3.5l4-4 4 4zm-4-5l-4-4V4h8v3.5l-4 4z"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="m-3" v-if="open_check === true">
                        <button class="bg-white text-gray-800 font-bold
                        rounded border-b-2 border-green-500 hover:border-green-600
                         hover:bg-green-500 hover:text-white shadow-md py-2 px-6
                         inline-flex items-center" @click="close_voca">
                            <span class="mr-2">공개</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                            </svg>
                        </button>
                    </div>

                </div>

            </div>


            <button class="px-4 py-2 rounded-md text-sm font-medium border
            focus:outline-none focus:ring transition text-blue-600 border-blue-600
            hover:text-white hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 m-3"
                    type="submit" @click="update">편집</button>
            <button class="px-4 py-2 rounded-md text-sm font-medium border
            focus:outline-none focus:ring transition text-yellow-600 border-yellow-600
            hover:text-white hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-3"
                    type="submit" @click="open_modal">삭제</button>
        </div>



        <jet-dialog-modal :show="openModal" @close="openModal = false">
            <template #title>
                삭제
            </template>

            <template #content>
                <div class="relative w-full mb-3 mt-8">
                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full ease-linear transition-all duration-150 font-bold"
                           placeholder="단어장 제목" value="삭제하시겠습니까?">
                </div>
                <div class="justify-center">
                    <button class="bg-yellow-600 text-white
                active:bg-blueGray-600 text-sm font-bold uppercase
                px-6 py-3 rounded shadow hover:shadow-lg outline-none
                focus:outline-none mr-1 mb-1 ease-linear transition-all
                duration-150 text-left mr-5" type="button" @click="close_modal">
                        아뇨
                    </button>

                    <button class="bg-red-400 text-white
                active:bg-blueGray-600 text-sm font-bold uppercase
                px-6 py-3 rounded shadow hover:shadow-lg outline-none
                focus:outline-none mr-1 mb-1 ease-linear transition-all
                duration-150 text-right" type="button" @click="voca_delete">
                        예ㅖ
                    </button>
                </div>


            </template>


        </jet-dialog-modal>
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import axios from 'axios'
import Toggle from '@vueform/toggle'

export default {
    name: "VocaList",
    components : {
        JetDialogModal,
        Toggle,
    },
    props : ['voca'],
    mounted () {
        // console.log('$$$$$$$$$$$$$$$$$$$$')
        // console.log(this.voca)
        if(this.voca.open === '0')
            this.open_check = false
        else if(this.voca.open === '1')
            this.open_check = true
    },
    data() {
        return {
            openModal : false,
            value: true,
            open_check : false
        }
    },
    methods : {
        update(id) {
            location.href= '/vocabulary/' + this.voca.id
        },
        open_modal() {
            this.openModal = true
        },
        close_modal() {
            this.openModal = false
        },
        voca_delete() {
            console.log('delete')
            axios.delete('/api/vocabulary/'+this.voca.id)
                .then(response => {
                    console.log(response)
                    this.close_modal()
                    this.$emit('read')
                }).catch(err => {
                    console.log(err)
            })
        },
        open_voca() {
            axios.patch('/api/vocabulary/open/' + this.voca.id)
                .then(response => {
                    console.log(response)
                    this.open_check = true
                }).catch(err => {
                    console.log(err)
            })

        },
        close_voca() {
            axios.patch('/api/vocabulary/close/' + this.voca.id)
                .then(response => {
                    console.log(response)
                    this.open_check = false
                }).catch(err => {
                    console.log(err)
            })
        }

    }
}
</script>

<style scoped>
input:checked ~ .dot {
    transform: translateX(100%);
    background-color: #48bb78;
}
</style>
