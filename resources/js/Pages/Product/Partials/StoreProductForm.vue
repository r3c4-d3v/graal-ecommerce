<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import SecondaryButton from "@/Components/SecondaryButton.vue";

const nameInput = ref(null);
const descriptionInput = ref(null);
const priceInput = ref(null);
const categoryInput = ref(null);

const form = useForm({
    name: '',
    description: '',
    price: '',
    category: ''
});

const handleFormFieldErrors = (fieldName, inputElement) => {
    if (form.errors[fieldName]) {
        form.reset(fieldName);
        inputElement.focus();
    }
}

const storeProduct = () => {
    form.post(route('product.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            handleFormFieldErrors('name', nameInput);
            handleFormFieldErrors('description', descriptionInput);
            handleFormFieldErrors('price', priceInput);
            handleFormFieldErrors('category', categoryInput);
        },
    });
}

const reset = () => form.reset();

</script>

<style lang="scss">
    @import "resources/scss/app.scss";
</style>

<template>
    <section>
        <header>
            <h2 class="h2">Cadastrar novo produto</h2>
            <p class="p-small">
                Preencha os campos abaixo para cadastrar um novo produto.
            </p>
        </header>

        <form @submit.prevent="storeProduct" class="form">
            <!-- Name Input -->
            <div>
                <InputLabel for="name" value="Nome do produto"/>
                <TextInput id="name" ref="nameInput" v-model="form.name" type="text"/>
                <InputError :message="form.errors.name"/>
            </div>

            <!-- Description Input -->
            <div>
                <InputLabel for="description" value="Descrição do produto."/>
                <TextInput id="description" ref="descriptionInput" v-model="form.description" type="text"/>
                <InputError :message="form.errors.description"/>
            </div>

            <!-- Price Input -->
            <div>
                <InputLabel for="price" value="Preço por unidade"/>
                <TextInput id="price" ref="priceInput" v-model="form.price" type="text" use-money-mask/>
                <InputError :message="form.errors.price"/>
            </div>

            <!-- Category Input -->
            <div>
                <InputLabel for="category" value="Categoria"/>
                <TextInput id="category" ref="categoryInput" v-model="form.category" type="text"/>
                <InputError :message="form.errors.category"/>
            </div>

            <!-- Buttons -->
            <div class="container-buttons">
                <PrimaryButton :disabled="form.processing">Cadastrar</PrimaryButton>
                <SecondaryButton v-on:click="reset" :disabled="form.processing">Limpar campos</SecondaryButton>
                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition-default">
                    <p v-if="form.recentlySuccessful" class="p-success">Produto Cadastrado.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>


