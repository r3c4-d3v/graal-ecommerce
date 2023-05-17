<template>
    <div class="page__menu">
        <Link
            v-if="!isAuthenticated"
            :href="route('login')"
            class="page__menu__link"
        >
            Acessar
        </Link>

        <Link
            v-if="!isAuthenticated"
            :href="route('register')"
            class="page__menu__link"
        >
            Cadastrar
        </Link>

        <Link
            method="post"
            v-if="isAuthenticated"
            :href="route('logout')"
            class="page__menu__link"
        >
            Sair
        </Link>
    </div>
</template>
<script setup>
import {Link} from "@/Components/Barrels/PageMenu.js"

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    isAuthenticated: {
        type: Boolean,
        required: true
    },
})
</script>
