<template>
    <div class="w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center border-double border-4 border-light-blue-500">
        <div class="mb-8">
            <img class="object-center object-cover rounded-full h-20 w-20" :src="voca.user.profile_photo_url" alt="photo">
        </div>
        <div class="text-center">
            <p class="text-xl text-white font-bold mb-2  w-20 truncate">{{voca.title}}</p>
            <p class="text-base text-gray-400 font-normal w-20 truncate">{{voca.message}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "VocaList",
    props : ['voca'],
}
</script>

<style scoped>

</style>
