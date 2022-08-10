<template>
    <Head title="Nueva Factura" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nueva Factura
            </h2>
        </template>

        <form @submit.prevent="factura.post('/guardar-factura')" class="py-5">
            <Container class="mt-3">
                <div class="mt-2">
                    <div class="p-4">
                        <h2
                            class="text-lg font-semibold text-gray-700 capitalize"
                        >
                            Cliente
                        </h2>

                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700" for="username"
                                    >Nombre</label
                                >
                                <input
                                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                    type="text"
                                    v-model="factura.cliente.nombre"
                                />
                            </div>

                            <div>
                                <label class="text-gray-700" for="punto_emision"
                                    >Punto emisión</label
                                >
                                <input
                                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                    type="text"
                                    v-model="factura.cliente.punto_venta"
                                />
                            </div>

                            <div>
                                <label class="text-gray-700" for="emailAddress"
                                    >Email</label
                                >
                                <input
                                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                    type="email"
                                    v-model="factura.cliente.email"
                                />
                            </div>

                            <div>
                                <label class="text-gray-700" for="guia_remision"
                                    >Guia de Remisión</label
                                >
                                <input
                                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                    type="text"
                                    v-model="factura.cliente.guia_remision"
                                />
                            </div>

                            <div>
                                <label class="text-gray-700" for="direccion"
                                    >Dirección</label
                                >
                                <input
                                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                    type="text"
                                    v-model="factura.cliente.direccion"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </Container>

            <Container>
                <ProductsList v-model:products="productos"/>
            </Container>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end mt-4">
                    <Link
                        :href="route('dashboard')"
                        class="px-4 py-2 text-gray-800 bg-white mr-3 rounded-md hover:bg-gray-200 focus:outline-none focus:bg-gray-200"
                    >
                        Cancelar
                    </Link>
                    <button
                        :disabled="factura.processing"
                        class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                    >
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Container from "@/Layouts/Container.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ProductsList from "./components/ProductsList.vue";

const props = defineProps(["iva"]);

const factura = useForm({
    cliente: {
        nombre: "",
        email: "",
        punto_venta: "",
        guia_remision: "",
        direccion: "",
    },
    productos: [
        {
            codigo: null,
            producto: null,
            cantidad: 0,
            precio: 0.0,
            descuento: 0,
        }
    ],
});

const productos = factura.productos.map(
    ({ codigo, producto, cantidad, precio, descuento }) => {
        const subtotal = (precio - precio * descuento) * cantidad;
        const iva = subtotal * props.iva;
        const total = subtotal + iva;

        return {
            codigo,
            producto,
            cantidad,
            precio: precio.toFixed(2),
            descuento,
            subtotal: subtotal.toFixed(2),
            iva: iva.toFixed(2),
            total: total.toFixed(2),
        };
    }
);
</script>
