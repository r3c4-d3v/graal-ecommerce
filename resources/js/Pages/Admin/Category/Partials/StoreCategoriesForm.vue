<style lang="scss">
@import "resources/scss/app.scss";
</style>

<template>
    <section class="max-w-xl">
        <PageHeader title="Cadastrar Categorias" text="Preencha os campos abaixo para cadastrar"/>
        <form @submit.prevent="storeCategory" class="form">
            <div>
                <InputLabel
                    for="name"
                    value="Nome da categoria"
                />

                <TextInput
                    id="name"
                    type="text"
                    ref="nameInput"
                    v-model="form.name"
                />

                <InputError :message="form.errors.name"/>
            </div>

            <div class="container-buttons">
                <PrimaryButton :disabled="form.processing">
                    Cadastrar
                </PrimaryButton>

                <Transition
                    class="transition--default"
                    leave-to-class="opacity-0"
                    enter-from-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="p-success">
                        Categoria cadastrada.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>

<script setup>
import {
    InputLabel,
    TextInput,
    InputError,
    PrimaryButton,
    PageHeader,
    useForm,
    ref,
    handleFormFieldErrors
} from "@/Pages/Admin/Category/Partials/Barrels/StoreCategoriesForm.js";

const nameInput = ref(null);

const form = useForm({ name: '' });

const storeCategory = () => {
    form.post(route('admin.category.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => handleFormFieldErrors('name', nameInput, form)
    })
}

</script>
