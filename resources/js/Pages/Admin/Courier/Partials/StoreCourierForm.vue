<style lang="scss">
@import 'resources/scss/app.scss';
</style>

<template>
    <section class="max-w-xl">
        <header>
            <h2 class="h2">Cadastrar novo entregador</h2>
            <p class="p--small">
                Preencha os campos abaixo para cadastrar um novo entregador.
            </p>
        </header>

        <form @submit.prevent="courierStore" class="form">
            <!-- Firstname Input -->
            <div>
                <InputLabel
                    for="firstName"
                    value="Primeiro nome"
                />

                <TextInput
                    id="firstName"
                    type="text"
                    ref="firstNameInput"
                    v-model="form.firstname"
                />

                <InputError :message="form.errors.firstname"/>
            </div>

            <!-- Lastname Input -->
            <div>
                <InputLabel
                    for="lastname"
                    value="Sobrenome"
                />

                <TextInput
                    type="text"
                    id="lastname"
                    ref="lastNameInput"
                    v-model="form.lastname"
                />

                <InputError :message="form.errors.lastname"/>
            </div>

            <!-- Motorcicle Input -->
            <div>
                <InputLabel for="motorcycleModel" value="Modelo da motocicleta"/>

                <TextInput
                    id="motorcycleModel"
                    type="text"
                    ref="motorcycleModelInput"
                    v-model="form.motorcycle_model"
                />

                <InputError :message="form.errors.motorcycle_model"/>
            </div>

            <!-- License plate Input -->
            <div>
                <InputLabel for="licensePlate" value="Placa"/>

                <TextInput
                    id="licensePlate"
                    type="text"
                    ref="licensePlateInput"
                    v-model="form.license_plate"
                />

                <InputError :message="form.errors.license_plate"/>
            </div>

            <!-- Phone Input -->
            <div>
                <InputLabel for="phone" value="Celular"/>

                <TextInput
                    id="phone"
                    type="text"
                    use-phone-mask
                    ref="phoneInput"
                    v-model="form.phone"
                />

                <InputError :message="form.errors.phone"/>
            </div>

            <!-- Email Input -->
            <div>
                <InputLabel for="email" value="E-mail"/>

                <TextInput
                    id="email"
                    type="text"
                    ref="emailInput"
                    use-email-mask
                    v-model="form.email"
                />

                <InputError :message="form.errors.email"/>
            </div>

            <!-- Photo Input -->
            <div>
                <InputLabel for="photo" value="Foto"/>

                <TextInput
                    id="photo"
                    type="text"
                    ref="photoInput"
                    v-model="form.photo"
                />

                <InputError :message="form.errors.photo"/>
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
                        Entregador Cadastrado com sucesso!
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
    useForm,
    usePage,
    ref,
    handleFormFieldErrors
} from "@/Pages/Admin/Courier/Partials/Barrels/StoreCourierForm.js";

const firstNameInput = ref(null);
const lastNameInput = ref(null);
const motorcycleInput = ref(null);
const licensePlateInput = ref(null);
const phoneInput = ref(null);
const emailInput = ref(null);
const photoInput = ref(null);

const form = useForm({
    firstname: '',
    lastname: '',
    motorcycle_model: '',
    license_plate: '',
    phone: '',
    email: '',
    photo: ''
});

const reset = () => {
    form.reset();
};

const courierStore = () => {
    form.post(route('admin.courier.store'), {
        preserveScroll: true,
        onSuccess: () => reset(),
        onError: () => {
            handleFormFieldErrors('firstName', firstNameInput, form);
            handleFormFieldErrors('lastName', lastNameInput, form);
            handleFormFieldErrors('motorcycle_model', motorcycleInput, form);
            handleFormFieldErrors('license_plate', licensePlateInput, form);
            handleFormFieldErrors('phone', phoneInput, form);
            handleFormFieldErrors('email', emailInput, form);
            handleFormFieldErrors('photo', photoInput, form);
        },
    });
}

</script>

