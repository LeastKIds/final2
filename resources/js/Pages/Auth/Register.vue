<template>
    <Head title="Register" />

<!--    <jet-authentication-card>-->
<!--        <template #logo>-->
<!--            <jet-authentication-card-logo />-->
<!--        </template>-->

<!--        <jet-validation-errors class="mb-4" />-->

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <jet-label for="name" value="Name" />-->
<!--                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <jet-label for="email" value="Email" />-->
<!--                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <jet-label for="password" value="Password" />-->
<!--                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <jet-label for="password_confirmation" value="Confirm Password" />-->
<!--                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />-->
<!--            </div>-->

<!--            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">-->
<!--                <jet-label for="terms">-->
<!--                    <div class="flex items-center">-->
<!--                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />-->

<!--                        <div class="ml-2">-->
<!--                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </jet-label>-->
<!--            </div>-->

<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">-->
<!--                    Already registered?-->
<!--                </Link>-->

<!--                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Register-->
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
                                        <h4 class="text-2xl mb-4 text-black font-semibold">회원가입</h4>
                                        <div id="feedbackForm" >
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                       for="email">이메일</label><input type="email" name="email" id="email" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder=" " v-model="form.email"
                                                                                     style="transition: all 0.15s ease 0s;" required />

                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" v-if="error.email">{{error.email}}</span>
                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                       for="email">이름</label><input name="email"  class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder=" " v-model="form.name"
                                                                                    style="transition: all 0.15s ease 0s;" required />
                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" v-if="error.name">{{error.name}}</span>
                                            </div>

                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                       for="email">비밀번호</label><input name="email" type="password" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400 h-12" placeholder="최소 8글자" v-model="form.password"
                                                                                      style="transition: all 0.15s ease 0s;" required  v-if="show === false"/>
                                                <button class="absolute top-5.5 right-0 rounded-l-none btn bg-gray-800 w-14 h-12" v-if="show === false" @click="toggle" >Show</button>

                                                <input name="email" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400 h-12" placeholder="최소 8글자" v-model="form.password"
                                                       style="transition: all 0.15s ease 0s;" required  v-if="show === true"/>
                                                <button class="absolute top-5.5 right-0 rounded-l-none btn bg-gray-800 w-14 h-12" v-if="show === true" @click="toggle" >Hide</button>

                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" v-if="error.password">{{error.password}}</span>
                                            </div>

                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                       for="email">비밀번호 확인</label><input type="password" name="email"  class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400 h-12" placeholder="최소 8글자" v-if="show2 === false" v-model="form.password_confirmation"
                                                                                         style="transition: all 0.15s ease 0s;" required />
                                                <button class="absolute top-5.5 right-0 rounded-l-none btn bg-gray-800 w-14 h-12" v-if="show2 === false" @click="toggle2" >Show</button>

                                                <input name="email"  class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400 h-12" placeholder="최소 8글자" v-if="show2 === true" v-model="form.password_confirmation"
                                                       style="transition: all 0.15s ease 0s;" required />
                                                <button class="absolute top-5.5 right-0 rounded-l-none btn bg-gray-800 w-14 h-12" v-if="show2 === true" @click="toggle2" >Hide</button>


                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" v-if="error.password_confirmation">{{error.password_confirmation}}</span>
                                            </div>
                                            <div class="text-center mt-6">
                                                <button id="feedbackBtn"
                                                        class="bg-yellow-300 text-black text-center mx-auto active:bg-yellow-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                        type="submit" style="transition: all 0.15s ease 0s;" @click="submit" >회원가입
                                                </button>
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

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                }),
                error:{
                    email : '',
                    password : '',
                    password_confirmation : '',
                    name : '',
                },
                show : false,
                show2 : false,
            }
        },

        methods: {
            submit() {
                let check = true
                if(!this.form.email) {
                    this.error.email = '이메일이 비어있습니다.'
                    check = false
                }
                if(!this.validEmail(this.form.email)) {
                    if(this.error.email)
                        this.error.email += ' | 이메일 형식이 아닙니다.'
                    this.error.email = '이메일 형식이 아닙니다.'
                    check = false
                }
                if(!this.form.name) {
                    this.error.name = '이름이 없습니다.'
                    check = false
                }
                if(this.form.password.length <8) {
                    this.error.password = '패스워드가 8자리 미만입니다.'
                    check = false
                }
                if(this.form.password_confirmation !== this.form.password) {
                    this.error.password_confirmation = '비밀번호가 다릅니다.'
                    check = false
                }

                if(check === false)
                    return

                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            },
            toggle(){
                this.show = !this.show
            },
            toggle2(){
                this.show2 = !this.show2
            },
            validEmail: function (email) {
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                return re.test(email);
            }
        }
    })
</script>
