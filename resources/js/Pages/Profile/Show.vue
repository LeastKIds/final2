<template>
<!--    <app-layout title="Profile">-->
<!--        <template #header>-->
<!--            <h2 class="font-semibold text-xl text-gray-800 leading-tight">-->
<!--                Profile-->
<!--            </h2>-->
<!--        </template>-->

<!--        <div>-->
<!--            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">-->
<!--                <div v-if="$page.props.jetstream.canUpdateProfileInformation">-->
<!--                    <update-profile-information-form :user="$page.props.user" />-->

<!--                    <jet-section-border />-->
<!--                </div>-->

<!--                <div v-if="$page.props.jetstream.canUpdatePassword">-->
<!--                    <update-password-form class="mt-10 sm:mt-0" />-->

<!--                    <jet-section-border />-->
<!--                </div>-->

<!--                <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">-->
<!--                    <two-factor-authentication-form class="mt-10 sm:mt-0" />-->

<!--                    <jet-section-border />-->
<!--                </div>-->

<!--                <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />-->

<!--                <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">-->
<!--                    <jet-section-border />-->

<!--                    <delete-user-form class="mt-10 sm:mt-0" />-->
<!--                </template>-->
<!--            </div>-->
<!--        </div>-->
<!--    </app-layout>-->

    <layout></layout>


    <section>
        <div class="bg-black text-white py-8">
            <div class="container mx-auto flex flex-col items-start md:flex-row my-12 md:my-24">

                <div class="ml-0 sticky">
                    <div class="container mx-auto w-full h-full">
                        <div class="relative wrap overflow-hidden h-full">
                            <div class="border-2-2 border-yellow-555 absolute h-full border"
                                 style=" border: 2px solid #FFC100; border-radius: 1%;"></div>
                            <div class="border-2-2 border-yellow-555 absolute h-full border"
                                 style=" border: 2px solid #FFC100; border-radius: 1%;"></div>

                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 pl-7">
                                    <div class="bg-gray-900 rounded-lg p-5" v-if="$page.props.jetstream.canUpdateProfileInformation">
                                        <update-profile-information-form :user="$page.props.user" />

                                    </div>
                                </div>

                            </div>

                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 pl-7">
                                    <div class="bg-gray-900 rounded-lg p-5" v-if="$page.props.jetstream.canUpdatePassword">
                                                            <update-password-form class="mt-10 sm:mt-0" />


                                                        </div>
                                </div>

                            </div>

                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 pl-7">
                                    <div class="bg-gray-900 rounded-lg p-5" v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                                                            <two-factor-authentication-form class="mt-10 sm:mt-0" />

                                                        </div>
                                </div>

                            </div>

                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 pl-7">
                                    <div class="bg-gray-900 rounded-lg p-5">
                                        <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />
                                    </div>

                                </div>

                            </div>

                            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                                <div class="order-1 pl-7">
                                    <div class="bg-gray-900 rounded-lg p-5">
                                        <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">

                                            <delete-user-form class="mt-10 sm:mt-0" />
                                        </template>
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
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
    import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
    import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue'
    import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
    import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'
    import Layout from './../Layouts/Layout.vue';

    export default defineComponent({
        props: ['sessions'],

        components: {
            AppLayout,
            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
            Layout,
        },
    })
</script>
