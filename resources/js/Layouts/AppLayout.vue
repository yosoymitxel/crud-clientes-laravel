<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Swal from 'sweetalert2'



defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />


        <div class="min-h-screen bg-gray-100">

            <!-- Header Menu Center -->
            <header class="w-full text-white bg-green-600 border-gray-100 shadow-sm body-font">
                <div class="container flex flex-col items-start justify-between px-6 py-8 mx-auto md:flex-row">
                    <a class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="70" viewBox="0 0 48 48" style="margin: -22px;">
                            <linearGradient id="hHYw7ETtGGdwheWCX7eyKa_cSdaKVzg13zy_gr1" x1="24" x2="24" y1="6" y2="42" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#30dc80"></stop><stop offset="1" stop-color="#21ad64"></stop></linearGradient><path fill="url(#hHYw7ETtGGdwheWCX7eyKa_cSdaKVzg13zy_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path><path fill="#fff" d="M27.733,30.182c-0.703,0.217-1.452,0.339-2.233,0.339c-3.937,0-7.128-2.992-7.128-6.682	s3.191-6.682,7.128-6.682c2.723,0,4.112,1.3,6.761,1.3h1.133v-5.362H32.34c-2.434,0-4.197-1.096-7.032-1.096	c-7.009,0-12.692,5.373-12.692,12s5.682,12,12.692,12c3.078,0,5.898-1.037,8.096-2.76v-5.614	C31.442,29.109,29.253,29.838,27.733,30.182z"></path>
                        </svg>
                    </a>
                    <nav class="flex flex-wrap items-center justify-center  text-base md:ml-auto md:mr-auto">
                        <a :href="route('dashboard')" :active="route().current('dashboard')" class="mr-5 font-medium hover:text-green-900">Home</a>
                        <a :href="route('clientes.index')" :active="route().current('clientes')" class="mr-5 font-medium hover:text-green-900">Costumers</a>
                    </nav>
                    <div class="items-center h-full">
                        <a href="#_" class="mr-5 font-medium hover:text-gray-900">Login</a>
                        <a href="#_"
                           class="px-4 py-2 text-xs font-bold text-white uppercase transition-all duration-150 bg-green-900 rounded shadow outline-none active:bg-teal-600 hover:shadow-md focus:outline-none ease">
                            Sign Up
                        </a>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <div class="ms-3 relative">
                            <!-- Teams Dropdown -->
                            <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
                                <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.current_team.name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            </button>
                                        </span>
                                </template>

                                <template #content>
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Team
                                        </div>

                                        <!-- Team Settings -->
                                        <DropdownLink :href="route('teams.show', $page.props.auth.user.current_team)">
                                            Team Settings
                                        </DropdownLink>

                                        <DropdownLink v-if="$page.props.jetstream.canCreateTeams" :href="route('teams.create')">
                                            Create New Team
                                        </DropdownLink>

                                        <!-- Team Switcher -->
                                        <template v-if="$page.props.auth.user.all_teams.length > 1">
                                            <div class="border-t border-gray-200" />

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Switch Teams
                                            </div>

                                            <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                                <form @submit.prevent="switchToTeam(team)">
                                                    <DropdownLink as="button">
                                                        <div class="flex items-center">
                                                            <svg v-if="team.id == $page.props.auth.user.current_team_id" class="me-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>

                                                            <div>{{ team.name }}</div>
                                                        </div>
                                                    </DropdownLink>
                                                </form>
                                            </template>
                                        </template>
                                    </div>
                                </template>
                            </Dropdown>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="ms-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                    </button>

                                    <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                </template>

                                <template #content>
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Manage Account
                                    </div>

                                    <DropdownLink :href="route('profile.show')">
                                        Profile
                                    </DropdownLink>

                                    <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                        API Tokens
                                    </DropdownLink>

                                    <div class="border-t border-gray-200" />

                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <DropdownLink as="button">
                                            Log Out
                                        </DropdownLink>
                                    </form>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>


                </div>
            </header>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow ">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main style="display: flex;width: 100%;justify-content: center;flex-direction: column;min-height: 80vh;background-color: rgba(240, 253, 244, 0.44);">
            <slot />
            </main>

            <footer class="bg-green-800 text-white  mt-10">
                <div class="container mx-auto flex flex-col items-center py-8">
                    <p class="mb-4">Creado por</p>
                    <p class="mb-4" > <a href="https://github.com/yosoymitxel" target="_blank" class="text-green-50"><i class="fab fa-github"></i>
                        Yosoymitxel</a></p>
                    <p >Repositorio: <a href="https://github.com/yosoymitxel/crud-clientes-laravel" target="_blank" class="text-green-50">Crud Clientes Laravel</a></p>
                </div>
                <div class="p-2 bg-green-900 text-center">
                    <p>&copy; {{ new Date().getFullYear() }} Todos los derechos reservados.</p>
                </div>
            </footer>
        </div>
    </div>
</template>
