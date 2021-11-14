<template>
    <div class="flex relative mx-auto max-w-md w-auto mt-2 mb-5">

        <button class="px-4 py-2 rounded-md text-sm
        font-medium border focus:outline-none focus:ring
        transition text-yellow-600 border-yellow-600 hover:text-white
        hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300"
                v-if="voca.prev_page_url"  type="submit">이전</button>

            <div v-if="voca.last_page <= 4" class="inline-flex">


                    <button class="px-4 py-2 rounded-md text-sm
         font-medium border focus:outline-none focus:ring
         transition text-yellow-600 border-yellow-600 hover:text-white
         hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300 m-1"
            v-for="i in 4" :key="i"
                            type="submit" >{{v}}</button>

            </div>


        <button class="px-4 py-2 rounded-md text-sm font-medium border
        focus:outline-none focus:ring transition text-yellow-600
        border-yellow-600 hover:text-white hover:bg-yellow-600
        active:bg-yellow-700 focus:ring-yellow-300 ml-1"
                v-if="voca.next_page_url" type="submit" @click="select">다음</button>

    </div>


</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
export default {
    name: "Pagination",
    props: ['voca'],
    components: {Link},
    data() {
        return {
            currentPage : 1,
        }
    },
    mounted() {
        this.currentPage = this.voca.current_page
        console.log('t')
        console.log(this.voca.last_page)
    },
    methods : {
        page() {
            console.log('t');
        },
        select() {
            console.log(this.voca.current_page)
        }
    }
}
</script>

<style scoped>

</style>
