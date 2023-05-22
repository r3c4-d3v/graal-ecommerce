<template>
    <div class="page__menu">
        <Link
            v-if="showHome"
            :href="route('app.index')"
            class="page__menu__link"
        >
            Voltar ao site
        </Link>
        <Link
            v-if="!isAuthenticated"
            :href="route('app.login.page')"
            class="page__menu__link"
        >
            Acessar
        </Link>

        <Link
            v-if="!isAuthenticated"
            :href="route('app.register.page')"
            class="page__menu__link"
        >
            Cadastrar
        </Link>

        <Link
            method="post"
            v-if="isAuthenticated && !showHome"
            :href="route('app.logout')"
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
    showHome: {
        type: Boolean,
        default: false
    }
})
</script>
