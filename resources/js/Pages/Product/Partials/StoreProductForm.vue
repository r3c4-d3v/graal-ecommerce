<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm} from '@inertiajs/vue3';
import { ref } from 'vue';

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
    if(form.errors[fieldName]) {
        form.reset(fieldName);
        inputElement.focus();
    }
}

function storeProduct() {
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
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Cadastrar novo produto</h2>

            <p class="mt-1 text-sm text-gray-600">
                Preencha os campos abaixo para cadastrar um novo produto.
            </p>
        </header>

        <form @submit.prevent="storeProduct" class="mt-6 space-y-6">
            <!-- Name Input -->
            <div>
                <InputLabel for="name" value="Nome do produto"/>

                <TextInput
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.name" class="mt-2"/>
            </div>

            <!-- Description Input -->
            <div>
                <InputLabel for="description" value="Descrição do produto."/>

                <TextInput
                    id="description"
                    ref="descriptionInput"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.description" class="mt-2"/>
            </div>

            <!-- Price Input -->
            <div>
                <InputLabel for="price" value="Preço por unidade"/>

                <TextInput
                    id="price"
                    ref="priceInput"
                    v-model="form.price"
                    type="text"
                    class="mt-1 block w-full"
                    use-money-mask
                />

                <InputError :message="form.errors.price" class="mt-2"/>
            </div>

            <!-- Category Input -->
            <div>
                <InputLabel for="category" value="Categoria"/>

                <TextInput
                    id="category"
                    ref="categoryInput"
                    v-model="form.category"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.category" class="mt-2"/>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Cadastrar</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Produto Cadastrado.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>


