<template>
    <div v-if="hasErrors">
        <div class="text-2xl mb-4 font-semibold text-red-600">Whoops! Something went wrong.</div>

        <ul class="block uppercase text-xs font-bold mb-2 text-red-600">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    })
</script>
