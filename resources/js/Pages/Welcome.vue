<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <!-- Header Menu Center -->
    <header class="w-full text-white bg-green-600 border-gray-100 shadow-sm body-font">
        <div class="container flex flex-col items-start justify-center px-6 py-8 mx-auto md:flex-row">
            <a class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="70" viewBox="0 0 48 48" style="margin: -22px;">
                    <linearGradient id="hHYw7ETtGGdwheWCX7eyKa_cSdaKVzg13zy_gr1" x1="24" x2="24" y1="6" y2="42" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#30dc80"></stop><stop offset="1" stop-color="#21ad64"></stop></linearGradient><path fill="url(#hHYw7ETtGGdwheWCX7eyKa_cSdaKVzg13zy_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path><path fill="#fff" d="M27.733,30.182c-0.703,0.217-1.452,0.339-2.233,0.339c-3.937,0-7.128-2.992-7.128-6.682	s3.191-6.682,7.128-6.682c2.723,0,4.112,1.3,6.761,1.3h1.133v-5.362H32.34c-2.434,0-4.197-1.096-7.032-1.096	c-7.009,0-12.692,5.373-12.692,12s5.682,12,12.692,12c3.078,0,5.898-1.037,8.096-2.76v-5.614	C31.442,29.109,29.253,29.838,27.733,30.182z"></path>
                </svg>
            </a>
        </div>
    </header>
    <main style="display: flex;width: 100%;justify-content: center;flex-direction: column;min-height: 80vh;background-color: rgba(240, 253, 244, 0.44);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="container mx-auto my-10 py-4 px-8">
                                <div class="flex flex-col justify-center items-center">
                                    <h1 class="text-4xl font-bold mb-10">CRUD de Clientes con Compañías y Direcciones</h1>
                                    <div class="prose max-w-none">
                                        <h2 class="text-2xl font-bold mb-4">Descripción</h2>
                                        <p>Este proyecto es un CRUD completo de clientes, con funcionalidades para gestionar compañías y direcciones asociadas. Está construido con Laravel como framework backend, Vue.js para el frontend y Tailwind CSS para el diseño.</p>

                                        <h2 class="text-2xl font-bold mb-4">Características</h2>
                                        <ul class="list-disc pl-4">
                                            <li class="mb-2 text-green-700"><b>CRUD completo de clientes:</b></li>
                                            <ul class="list-disc pl-4">
                                                <li><b>Crear:</b> Agregar nuevos clientes con nombre, email, teléfono y dirección.</li>
                                                <li><b>Leer:</b> Listar todos los clientes con sus datos.</li>
                                                <li><b>Actualizar:</b> Editar la información de un cliente existente.</li>
                                                <li><b>Eliminar:</b> Eliminar un cliente del sistema.</li>
                                                <li><b>Crear mediante API:</b> Agregar nuevos clientes desde la API <a href="https://jsonplaceholder.typicode.com/users" target="_blank">https://jsonplaceholder.typicode.com/users</a></li>
                                            </ul>
                                        </ul>

                                        <h2 class="text-2xl font-bold mb-4">Requisitos</h2>
                                        <ul class="list-disc pl-4">
                                            <li>PHP 8.0 o superior</li>
                                            <li>Composer</li>
                                            <li>Node.js</li>
                                            <li>NPM o Yarn</li>
                                        </ul>

                                        <h2 class="text-2xl font-bold mb-4">Instalación</h2>
                                        <ol class="list-decimal pl-4">
                                            <li>Clonar el proyecto: <code>git clone https://github.com/yosoymitxel/crud-clientes-laravel</code></li>
                                            <li>Configurar las conexiones dentro del archivo .env</li>
                                            <li>Migrar base de datos <code>php artisan migrate --seed</code></li>
                                            <li>Instalar las dependencias de Laravel: <code>composer install</code></li>
                                            <li>Instalar las dependencias de Vue.js y Node.js: <code>npm install</code> o <code>yarn install</code></li>
                                            <li>Compilar los assets de Vue.js: <code>npm run dev</code> o <code>yarn run dev</code></li>
                                        </ol>

                                        <h2 class="text-2xl font-bold mb-4">Ejecución</h2>
                                        <ol class="list-decimal pl-4">
                                            <li>Iniciar el servidor de Laravel: <code>php artisan serve</code></li>
                                            <li>La aplicación estará disponible en <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></li>
                                        </ol>

                                        <h2 class="text-2xl font-bold mb-4">Uso</h2>
                                        <p>La aplicación tiene una interfaz sencilla para gestionar clientes, compañías y direcciones. Puedes crear, leer, actualizar y eliminar clientes, así como gestionar sus compañías y direcciones asociadas.</p>

                                        <h2 class="text-2xl font-bold mb-4">Nota</h2>
                                        <p>Este proyecto es un ejemplo y puede ser modificado y ampliado según tus necesidades.</p>

                                        <h2 class="text-2xl font-bold mb-4">Links</h2>
                                        <ul class="list-disc pl-4">
                                            <li><a href="https://github.com/yosoymitxel/crud-clientes-laravel" target="_blank">Repositorio GitHub</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="contenedor-login" class="" v-if="!isAuthenticated">
                                <div class="text-center flex ">
                                    <a :href="route('login')" class="py-5 bg-green-500 text-white w-1/2">
                                        Login
                                    </a>
                                    <a :href="route('register')" class="py-5 bg-blue-500 text-white w-1/2">
                                        Register
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</template>
