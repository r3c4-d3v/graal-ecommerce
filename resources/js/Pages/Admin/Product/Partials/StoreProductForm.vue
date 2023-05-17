<style lang="scss">
@import 'resources/scss/app.scss';
</style>

<template>
    <section class="max-w-xl">
        <header>
            <h2 class="h2">Cadastrar novo produto</h2>
            <p class="p--small">
                Preencha os campos abaixo para cadastrar um novo produto.
            </p>
        </header>

        <form @submit.prevent="storeProduct" class="form">
            <!-- Name Input -->
            <div>
                <InputLabel
                    for="name"
                    value="Nome do produto"
                />

                <TextInput
                    id="name"
                    type="text"
                    ref="nameInput"
                    v-model="form.name"
                />

                <InputError :message="form.errors.name"/>
            </div>

            <!-- Description Input -->
            <div>
                <InputLabel
                    for="description"
                    value="Descrição do produto."
                />

                <TextInput
                    type="text"
                    id="description"
                    ref="descriptionInput"
                    v-model="form.description"
                />

                <InputError :message="form.errors.description"/>
            </div>

            <!-- Price Input -->
            <div>
                <InputLabel for="price" value="Preço por unidade"/>

                <TextInput
                    id="price"
                    type="text"
                    use-money-mask
                    ref="priceInput"
                    v-model="form.price"
                />

                <InputError :message="form.errors.price"/>
            </div>

            <!-- Category Input -->
            <div>
                <InputLabel for="category" value="Categoria"/>

                <SelectInput
                    id="category"
                    ref="categoryInput"
                    v-model="form.category"
                    :input-options="productCategories"
                />

                <InputError :message="form.errors.category"/>
            </div>

            <!-- Buttons -->
            <div class="container__buttons">
                <PrimaryButton :disabled="form.processing">Cadastrar</PrimaryButton>

                <Transition
                    class="transition--default"
                    leave-to-class="opacity-0"
                    enter-from-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="p-success">
                        Produto Cadastrado.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>

<script setup>
import {
    InputLabel,
    InputError,
    PrimaryButton,
    TextInput,
    SelectInput,
    useForm,
    usePage,
    ref,
    handleFormFieldErrors
} from "@/Pages/Admin/Product/Partials/Barrels/StoreProductForm.js";

const nameInput = ref(null);
const descriptionInput = ref(null);
const priceInput = ref(null);
const categoryInput = ref(null);

const productCategories = usePage().props.productCategories;

const form = useForm({
    name: '',
    description: '',
    price: '',
    category: ''
});

const reset = () => {
    form.reset();
    categoryInput.value.resetSelected()
};

const storeProduct = () => {
    form.post(route('admin.product.store'), {
        preserveScroll: true,
        onSuccess: () => reset(),
        onError: () => {
            handleFormFieldErrors('name', nameInput, form);
            handleFormFieldErrors('description', descriptionInput, form);
            handleFormFieldErrors('price', priceInput, form);
            handleFormFieldErrors('category', categoryInput, form);
        },
    });
}

</script>

