<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
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

const storeProduct = () => {
    form.post(route('product.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.name) {
                form.reset('name');
                nameInput.value.focus();
            }
            if (form.errors.description) {
                form.reset('description');
                descriptionInput.value.focus();
            }
            if (form.errors.price) {
                form.reset('price');
                priceInput.value.focus();
            }
            if (form.errors.category) {
                form.reset('category');
                categoryInput.value.focus();
            }
        },
    });
};
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
            <div>
                <InputLabel for="name" value="Nome do produto" />

                <TextInput
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <div>
                <InputLabel for="description" value="Descrição do produto." />

                <TextInput
                    id="description"
                    ref="descriptionInput"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.description" class="mt-2" />
            </div>

            <div>
                <InputLabel for="price" value="Preço por unidade" />

                <TextInput
                    id="price"
                    ref="priceInput"
                    v-model="form.price"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.price" class="mt-2" />
            </div>
            <div>
                <InputLabel for="category" value="Categoria id" />

                <TextInput
                    id="category"
                    ref="categoryInput"
                    v-model="form.category"
                    type="number"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.category" class="mt-2" />
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
