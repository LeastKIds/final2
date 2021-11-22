<template>
    <Link class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col
    justify-center items-center border-double border-4
    border-light-blue-500" :href="'/other/words/'+voca.id">
        <div class="mb-8">
            <img class="object-center object-cover rounded-full h-20 w-20" :src="voca.user.profile_photo_url" alt="photo">
        </div>
        <div class="text-center">
            <p class="text-xl text-white font-bold mb-2  w-48 truncate">{{voca.title}}</p>
            <p class="text-base text-gray-400 font-normal w-48 truncate">{{voca.message}}</p>
        </div>
    </Link>
</template>

<script>

import axios from 'axios'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    name: "VocaListOther",
    components : {
        Link,
    },
    props : ['voca'],
    mounted () {
        // console.log('$$$$$$$$$$$$$$$$$$$$')
        // console.log(this.voca)
        if(this.voca.open === 0)
            this.open_check = false
        else if(this.voca.open === 1)
            this.open_check = true
    },
    data() {
        return {

        }
    },
    methods : {

    }
}
</script>

<style scoped>

</style>
