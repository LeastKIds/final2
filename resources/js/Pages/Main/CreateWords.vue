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
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs
                mt-1 ml-1" v-if="error.title">{{error.title}}</span>
                        <input type="text" class="bg-gray-300 border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full ease-linear transition-all duration-150"
                               placeholder="단어장 제목" v-model="update_voca.title">
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600
                    text-xs font-bold mb-2" for="message">설명</label>
                        <textarea rows="4" cols="80" class="bg-gray-300 border-0 px-3 py-3 placeholder-blueGray-300
                    text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none
                    focus:ring w-full" placeholder="설명 써줘요" v-model="update_voca.message"></textarea>
                    </div>

                    <button class="mr-2 p-2 pl-5 pr-5 bg-transparent
                    border-2 border-blue-500 text-blue-500 text-lg rounded-lg
                    hover:bg-blue-500 hover:text-gray-100 focus:border-4
                    focus:border-blue-300" @click="voca_update">수정</button>
                    <button class="ml-2 p-2 pl-5 pr-5 bg-transparent border-2
                    border-red-500 text-red-500 text-lg rounded-lg
                    hover:bg-red-500 hover:text-gray-100 focus:border-4
                    focus:border-red-300" @click="open_modal">삭제</button>
                </div>





        </div>
        <div style="text-align:center;" v-for="(word,index) in words_x" :key="word.id">
            <input type="text" placeholder="한자" class="text-center mb-2 bg-gray-100 p-2
            rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" readonly :value="word.kannzi" v-if="edit_button[index] === 1"/>
            <input type="text" placeholder="히라가나" class="text-center mb-2 bg-gray-100
            p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" readonly :value="word.hiragana" v-if="edit_button[index] === 1"/>
            <input type="text" placeholder="한글" class="text-center mb-2 bg-gray-100
             p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
              focus:border-indigo-600 m-1" readonly :value="word.korean" v-if="edit_button[index] === 1"/>

            <input type="text" placeholder="한자" class="text-center mb-2 bg-gray-100 p-2
            rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" v-model="word.kannzi" v-if="edit_button[index] === 0"/>
            <input type="text" placeholder="히라가나" class="text-center mb-2 bg-gray-100
            p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" v-model="word.hiragana" v-if="edit_button[index] === 0"/>
            <input type="text" placeholder="한글" class="text-center mb-2 bg-gray-100
             p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
              focus:border-indigo-600 m-1" v-model="word.korean" v-if="edit_button[index] === 0"/>
            <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-yellow-500
            text-yellow-500 text-lg rounded-lg hover:bg-yellow-500 hover:text-gray-100
            focus:border-4 focus:border-yellow-300　m-1"
                    v-if="edit_button[index] === 1" @click="edit_word(index)">수정</button>

            <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100
            focus:border-4 focus:border-green-300 m-1" @click="update_word(word.id, word.kannzi, word.hiragana, word.korean)"
                    v-if="edit_button[index] === 0">저장</button>

            <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-red-500
             text-red-500 text-lg rounded-lg hover:bg-red-500 hover:text-gray-100
             focus:border-4 focus:border-red-300 m-1" @click="delete_word(word.id)">삭제</button>
        </div>
        <div style="text-align:center;">
            <input type="text" placeholder="한자" class="text-center mb-2 bg-gray-100
            p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" v-model="word.kannzi"/>
            <input type="text" placeholder="히라가나" class="text-center mb-2 bg-gray-100
             p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
             focus:border-indigo-600 m-1" v-model="word.hiragana" />
            <input type="text" placeholder="한글" class="text-center mb-2 bg-gray-100
            p-2 rounded-lg border-2 border-indigo-500 shadow-md focus:outline-none
            focus:border-indigo-600 m-1" v-model="word.korean"/>
            <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100
            focus:border-4 focus:border-green-300 m-1" @click="create_word">저장</button>
        </div>
        <div style="text-align:center;" class="flex flex-col items-center justify-center">
             <span class="flex items-center font-medium tracking-wide text-red-500 text-xl
                mt-1 ml-1" v-if="error.message">{{error.message}}</span>
        </div>


        <div class="w-full  flex justify-center items-center">
            <button
                data-modal-toggle="example2"
                data-modal-action="open"
                class="bg-purple-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-purple-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-8"
            >
                게임 시작
            </button>
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
    <div style="height:100px;">
    </div>
</template>

<script>
import Layout from './../Layouts/Layout.vue';
import axios from 'axios'
import JetDialogModal from '@/Jetstream/DialogModal.vue'
export default {
    name: "CreateWords",
    components: {
        Layout,
        JetDialogModal,
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
        this.update_voca.message = this.voca_x.message
        this.set_edit_button()
    },
    methods : {
        voca_update() {
            this.check = true
            if(!this.update_voca.title) {
                this.error.title = '제목은 꼭 필요해요!'
                this.check = false
            }

            if(this.check === false)
                return

            const data = {
                'title' : this.update_voca.title,
                'message' : this.update_voca.message
            }
            axios.patch('/api/vocabulary/'+this.voca_x.id, data)
                .then(response => {
                    console.log(response)
                    if(response.data.success === 1) {
                        this.voca_x = response.data.voca_u;
                        this.update_voca.title = response.data.voca_u.title
                        this.update_voca.message = response.data.voca_u.message
                    }else {
                        alert('오류 발생! 잠시 후, 다시 시도해 주세요.')
                    }

                }).catch(err => {
                    console.log(err)
            })
        },
        voca_delete() {
            axios.delete('/api/vocabulary/' + this.voca_x.id)
                .then(response => {
                    console.log(response)
                }).catch(err => {
                    console.log(err)
            })
        },
        open_modal() {
            this.openModal = true
        },
        close_modal() {
            this.openModal = false
        },
        create_word() {
            let check = true
            this.error.message = ''
            if(this.checkKannzi(this.word.kannzi) === false && this.word.kannzi) {
                this.error.message += '한자 칸에 한자가 아니에요!'
                check = false
            }


            if(!this.word.kannzi && !this.word.hiragana) {
                if(this.error.message)
                    this.error.message += ' / '
                this.error.message += '한자, 히라가나 둘 중 하나는 꼭 써야 해요!'
                check = false
            }


            if(!this.word.korean) {
                if(this.error.message)
                    this.error.message += ' / '
                this.error.message += '한글은 꼭 적어야 해요!'
                check = false
            }



            if(check === false)
                return
            const data = {
                kannzi : this.word.kannzi,
                hiragana : this.word.hiragana,
                korean : this.word.korean,
            }
            this.first_page = true
            axios.post('/api/words/'+this.voca_x.id, data)
                .then(response => {
                    if(response.data.success === 1) {
                        this.word.kannzi = ''
                        this.word.hiragana = ''
                        this.word.korean = ''
                        this.read_words()
                    }else {
                        alert('오류발생! 잠시 후에 다시 시도해 주세요!')
                    }
                }).catch(err => {
                    console.log(err)
            })
        },
        delete_word(word_id) {
            axios.delete('/api/words/'+word_id)
                .then(response => {
                    console.log(response)
                    if(response.data.success === 1) {
                        this.read_words()
                    } else {
                        alert('오류발생! 잠시 후에 다시 시도해 주세요!')
                    }
                }).catch(err => {
                    console.log(err)
            })
        },
        checkKannzi(str) {
            const REGEX_CHINESE = /[\u4e00-\u9fff]|[\u3400-\u4dbf]|[\u{20000}-\u{2a6df}]|[\u{2a700}-\u{2b73f}]|[\u{2b740}-\u{2b81f}]|[\u{2b820}-\u{2ceaf}]|[\uf900-\ufaff]|[\u3300-\u33ff]|[\ufe30-\ufe4f]|[\uf900-\ufaff]|[\u{2f800}-\u{2fa1f}]/u;
            return REGEX_CHINESE.test(str);
        },
        read_words() {
            axios.get('/api/words/'+this.voca_x.id)
                .then(response => {
                    console.log(response)
                    if(response.data.success === 1) {
                        this.words_x = response.data.words
                        console.log('read_words')
                        console.log(this.first_page)
                        if(this.first_page) {
                            window.scrollTo( 0, document.body.scrollHeight )
                            this.first_page = false
                        }
                        this.set_edit_button()
                    }
                }).catch(err => {
                    console.log(err)
            })
        },
        set_edit_button() {
            console.log('set_edit_button')
            this.edit_button = []
            for(let i=0; i<this.words_x.length; i++) {
                this.edit_button.push(1)
            }
            console.log(this.edit_button)
        },
        edit_word(i) {
            console.log(i)
            this.edit_button[i] = 0
        },
        update_word(i, kannzi, hiragana, korean) {
            let check = true
            this.word_error[i] = ''
            if(this.checkKannzi(kannzi) === false && kannzi) {
                this.word_error[i] += '한자 칸에 한자가 아니에요!'
                check = false
            }


            if(!kannzi && !hiragana) {
                if(this.word_error[i])
                    this.word_error[i] += ' / '
                this.word_error[i] += '한자, 히라가나 둘 중 하나는 꼭 써야 해요!'
                check = false
            }


            if(!korean) {
                if(this.word_error[i])
                    this.word_error[i] += ' / '
                this.word_error[i] += '한글은 꼭 적어야 해요!'
                check = false
            }



            if(check === false)
                return
            const data = {
                kannzi : kannzi,
                hiragana : hiragana,
                korean : korean,
            }
            console.log('test');
            axios.patch('/api/words/'+i, data)
                .then(response => {
                    console.log(response)
                    if(response.data.success === 1) {
                        this.read_words()
                    } else
                        alert('오류발생! 잠시 후에 다시 시도해 주세요!')
                }).catch(err => {
                    console.log(err)
            })
        }

    }
}
</script>

<style scoped>

</style>
