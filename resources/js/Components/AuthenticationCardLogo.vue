<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <div class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="70" viewBox="0 0 48 48" style="margin: -22px;">
                <linearGradient id="hHYw7ETtGGdwheWCX7eyKa_cSdaKVzg13zy_gr1" x1="24" x2="24" y1="6" y2="42" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#30dc80"></stop><stop offset="1" stop-color="#21ad64"></stop></linearGradient><path fill="url(#hHYw7ETtGGdwheWCX7eyKa_cSdaKVzg13zy_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path><path fill="#fff" d="M27.733,30.182c-0.703,0.217-1.452,0.339-2.233,0.339c-3.937,0-7.128-2.992-7.128-6.682	s3.191-6.682,7.128-6.682c2.723,0,4.112,1.3,6.761,1.3h1.133v-5.362H32.34c-2.434,0-4.197-1.096-7.032-1.096	c-7.009,0-12.692,5.373-12.692,12s5.682,12,12.692,12c3.078,0,5.898-1.037,8.096-2.76v-5.614	C31.442,29.109,29.253,29.838,27.733,30.182z"></path>
            </svg>
        </div>
    </Link>
</template>
