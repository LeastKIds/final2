<template>
    <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center border-double border-4 border-light-blue-500">
        <div class="mb-8">
            <img class="object-center object-cover rounded-full h-20 w-20" :src="voca.user.profile_photo_url" alt="photo">
        </div>
        <div class="text-center">
            <p class="text-xl text-white font-bold mb-2  w-20 truncate">{{voca.title}}</p>
            <p class="text-base text-gray-400 font-normal w-20 truncate">{{voca.message}}</p>
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
export default {
    name: "VocaList",
    components : {
        JetDialogModal,
    },
    props : ['voca'],
    data() {
        return {
            openModal : false,
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
    }
}
</script>

<style scoped>

</style>
