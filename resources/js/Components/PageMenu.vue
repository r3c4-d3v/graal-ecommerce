<template>
    <div class="page__menu">
        <Dropdown v-if="isAuthenticated" align="right" width="48">
            <template #trigger>
                <SecondaryButton type="button">
                    <i class="fa-regular fa-user"></i>
                </SecondaryButton>
            </template>

            <template #content>
                <DropdownLink :href="route('app.profile.edit')">
                    Meu Perfil
                </DropdownLink>
                <DropdownLink :href="route('app.logout')" method="post" as="button">
                    Sair
                </DropdownLink>
            </template>
        </Dropdown>

        <SecondaryButton v-if="isAuthenticated">
            <i class="fa-solid fa-cart-shopping"></i>
        </SecondaryButton>

        <Link
            v-if="showHome"
            :href="route('app.index')"
            class="page__menu__link"
        >
            Voltar ao site
        </Link>

        <Link
            v-if="!isAuthenticated"
            :href="route('app.register.page')"
            class="page__menu__link"
        >
            <SecondaryButton>
                Quero cadastrar
            </SecondaryButton>
        </Link>

        <Link
            v-if="!isAuthenticated"
            :href="route('app.login.page')"
            class="page__menu__link"
        >
            <PrimaryButton>
                Quero pedir
            </PrimaryButton>
        </Link>
    </div>
</template>
<script setup>
import {Link} from "@/Components/Barrels/PageMenu.js"
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

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
