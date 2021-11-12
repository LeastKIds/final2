<template>
    <layout></layout>


    <section>
        <div class="bg-black text-white py-8">
            <div class="container mx-auto flex flex-col items-start md:flex-row my-12 md:my-24">
                <div class="flex flex-col w-full sticky md:top-36 lg:w-1/3 mt-2 md:mt-12 px-8">
                    <p class="ml-2 text-yellow-300 uppercase tracking-loose">어서오세요!</p>
                    <p class="text-3xl md:text-4xl leading-normal md:leading-relaxed mb-2">일본어 단어장</p>
                    <p class="text-sm md:text-base text-gray-50 mb-4">
                        단어장을 작성하고, 그 단어장으로 친구들과 게임을 즐겨 보세요!
                    </p>
                    <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                        <div class="mb-8">
                            <img class="object-center object-cover rounded-full h-36 w-36" :src="$page.props.user.profile_photo_url" alt="photo">
                        </div>
                        <div class="text-center">
                            <p class="text-xl text-white font-bold mb-2">{{$page.props.user.name}}</p>
                            <p class="text-base text-gray-400 font-normal">{{$page.props.user.email}}</p>
                            <div class="m-5 items-center content-start">
                                <Link class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg
                                hover:bg-green-500 hover:text-gray-100 focus:border-4
                                focus:border-green-300 mr-1 inline-block mb-5 w-28" :href="route('profile.show')">프로필</Link>
                                <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-yellow-500 text-yellow-500 text-lg rounded-lg
                                hover:bg-yellow-500 hover:text-gray-100 focus:border-4 w-28
                                focus:border-yellow-300 ml-2" @click="logout">로그아웃</button>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="ml-0 md:ml-12 lg:w-2/3 sticky">
                    <div class="container mx-auto w-full h-full">
                        <div class="relative wrap overflow-hidden p-10 h-full">
                            <div class="border-2-2 border-yellow-555 absolute h-full border"
                                 style="right: 50%; border: 2px solid #FFC100; border-radius: 1%;"></div>
                            <div class="border-2-2 border-yellow-555 absolute h-full border"
                                 style="left: 50%; border: 2px solid #FFC100; border-radius: 1%;"></div>
                            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="order-1 w-5/12 px-1 py-4 text-right">
                                    <p class="mb-3 text-base text-yellow-300">온라인</p>
                                    <h4 class="mb-3 font-bold text-lg md:text-2xl">참가참가</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        온라인으로 친구들과 함께하세요!
                                    </p>
                                </div>
                            </div>
                            <Link class="mb-8 flex justify-between items-center w-full right-timeline" href="/vocabulary">
                                <div class="order-1 w-5/12"></div>
                                <div class="order-1  w-5/12 px-1 py-4 text-left">
                                    <p class="mb-3 text-base text-yellow-300">단어장</p>
                                    <h4 class="mb-3 font-bold text-lg md:text-2xl">내 단어장</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        힘겹게 단어장을 쓰세요! 그리고 그걸로 게임을 할 수 있답니다.
                                    </p>
                                </div>
                            </Link>
                            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="order-1 w-5/12 px-1 py-4 text-right">
                                    <p class="mb-3 text-base text-yellow-300">검색</p>
                                    <h4 class="mb-3 font-bold text-lg md:text-2xl">단어장 찾기</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        힘들게 단어장 만들지 말고, 남의 단어장을 베껴오세요!
                                    </p>
                                </div>
                            </div>

                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 w-5/12"></div>

                                <div class="order-1  w-5/12 px-1 py-4">
                                    <p class="mb-3 text-base text-yellow-300">출처</p>
                                    <h4 class="mb-3 font-bold  text-lg md:text-2xl text-left">모두의 힘</h4>
                                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                                        여기 저기서 베껴온 레이아웃의 출처를 밝혀보아요!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <img class="mx-auto -mt-36 md:-mt-36" src="https://user-images.githubusercontent.com/54521023/116968861-ef21a000-acd2-11eb-95ac-a34b5b490265.png" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Layout from './../Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
    name: "Main",
    components: {
        Head,
        Link,
        Layout,
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        }

    },
}
</script>

<style scoped>

</style>


