<template>
    <Head title="Categorias" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="h1">Categorias de produtos</h1>
        </template>
        <Container>
            <StoreCategoriesForm />
        </Container>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Container from "@/Components/Container.vue";
import StoreCategoriesForm from "@/Pages/Admin/Category/Partials/StoreCategoriesForm.vue";
</script>
