<template>
    <Head title="Log in" />

<!--    <jet-authentication-card>-->
<!--        <template #logo>-->
<!--            <jet-authentication-card-logo />-->
<!--        </template>-->

<!--        <jet-validation-errors class="mb-4" />-->

<!--        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">-->
<!--            {{ status }}-->
<!--        </div>-->

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <jet-label for="email" value="Email" />-->
<!--                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <jet-label for="password" value="Password" />-->
<!--                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />-->
<!--            </div>-->

<!--            <div class="block mt-4">-->
<!--                <label class="flex items-center">-->
<!--                    <jet-checkbox name="remember" v-model:checked="form.remember" />-->
<!--                    <span class="ml-2 text-sm text-gray-600">Remember me</span>-->
<!--                </label>-->
<!--            </div>-->

<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">-->
<!--                    Forgot your password?-->
<!--                </Link>-->

<!--                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Log in-->
<!--                </jet-button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </jet-authentication-card>-->

    <section>
        <div class="bg-black text-white py-20 h-screen ">
            <div class="container mx-auto flex flex-col md:flex-row my-6 md:my-24">
                <div class="flex flex-col w-full lg:w-1/3 p-8">
                    <p class="ml-6 text-yellow-300 text-lg uppercase tracking-loose">일본어 단어장</p>
                    <p class="text-3xl md:text-5xl my-4 leading-relaxed md:leading-snug">일본어 퀴즈 단어장!</p>
                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                        단어장을 작성하고, 친구들과 퀴즈를 푸세요.
                    </p>
                </div>
                <div class="flex flex-col w-full lg:w-2/3 justify-center">
                    <div class="container w-full px-4">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-6/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white">
                                    <div class="flex-auto p-5 lg:p-10">
                                        <h4 class="text-2xl mb-4 text-black font-semibold">로그인</h4>
                                        <jet-validation-errors class="mb-4" />
                                        <div id="feedbackForm">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                       for="email">Email</label><input  name="email" id="email" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder=" " v-model="form.email" @keyup.enter="submit"
                                                                                        style="transition: all 0.15s ease 0s;" />
                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" v-if="error.email">{{error.email}}</span>
                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                >Password</label><input type="password" name="password"  class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400 h-12" placeholder=" " v-model="form.password" @keyup.enter="submit"
                                                                        style="transition: all 0.15s ease 0s;" v-if="show === false"/>
                                                <button class="absolute top-5.5 right-0 rounded-l-none btn bg-gray-800 w-14 h-12" v-if="show === false" @click="toggle" >Show</button>

                                                <input name="password"  class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400 h-12" placeholder=" " v-model="form.password" @keyup.enter="submit"
                                                       style="transition: all 0.15s ease 0s;" v-if="show === true"/>
                                                <button class="absolute top-5.5 right-0 rounded-l-none btn bg-gray-800 w-14 h-12" v-if="show === true" @click="toggle" >Hide</button>


                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" v-if="error.password">{{error.password}}</span>
                                            </div>
                                            <div class="text-center mt-6">
                                                <button id="feedbackBtn"
                                                        class="bg-yellow-300 text-black text-center mx-auto active:bg-yellow-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                        type="submit" style="transition: all 0.15s ease 0s;" @click="submit">로그인
                                                </button>
                                                <a
                                                    class="bg-blue-300 text-black text-center mx-auto active:bg-blue-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ml-3 mr-1 mb-1"
                                                    type='button' style="transition: all 0.15s ease 0s;" :href="route('register')">회원가입
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                }),
                error : {
                    email : '',
                    password : '',
                },
                show : false,
            }

        },

        methods: {
            submit() {

                console.log(this.form.email)
                console.log(this.form.password)

                let check = true
                if(!this.validEmail(this.form.email)) {
                    if(this.error.email)
                        this.error.email += ' | 이메일 형식이 아닙니다.'
                    this.error.email = '이메일 형식이 아닙니다.'
                    check = false
                }

                if(this.form.password.length < 1) {
                    this.error.password = '비밀 번호가 없어요'
                    check = false
                }

                if(check === false) {
                    this.error.email = '이메일 형식이 아닙니다.'
                    return
                }


                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            },
            toggle() {
                this.show = !this.show
            },
            validEmail: function (email) {
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                return re.test(email);
            },
        }
    })
</script>
