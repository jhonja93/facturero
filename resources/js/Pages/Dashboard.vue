<template>
    <Head title="Facturas" />

    <BreezeAuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Facturero
            </h2>
        </template> -->

        <Container>
            <template #title>
                <h2 class="mb-3 text-lg">Listado de facturas</h2>
                <div>
                    <Link :href="route('factura.create')">
                        <!-- Crear -->
                        <Button class="mb-2">Crear</Button>
                    </Link>
                </div>
            </template>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                        >
                            Número
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                        >
                            Fecha
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                        >
                            Cliente
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                        >
                            Valor
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                        >
                            Estado
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50"
                        ></th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    <tr v-for="(f, index) in facturas" :key="index">
                        <td
                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                        >
                            <div class="text-sm leading-5 text-gray-900">
                                {{ f.numero }}
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                        >
                            <div class="text-sm leading-5 text-gray-900">
                                {{ f.fecha }}
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                        >
                            <div class="text-sm leading-5 text-gray-900">
                                {{ f.cliente }}
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                        >
                            <div class="text-sm leading-5 text-gray-900">
                                {{ f.valor }}
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                        >
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                                >{{ f.estado }}</span
                            >
                        </td>

                        <td
                            class="px-6 py-4 text-sm font-medium leading-5 text-right border-b border-gray-200 whitespace-nowrap"
                        >
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            Acciones
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <span>
                                        Firmar
                                    </span>
                                    <span>
                                        Ver PDF
                                    </span>
                                </template>
                            </Dropdown>
                        </td>
                    </tr>
                </tbody>
            </table>
        </Container>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Container from "@/Layouts/Container.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Button from "./../Components/Button.vue";
import Dropdown from "./../Components/Dropdown.vue";
import { defineComponent, ref } from "vue";

const { facturas } = defineProps(["facturas"]);

// export default defineComponent({
//     components: {
//         Head, Button, Link, BreezeAuthenticatedLayout,
//         Dropdown
//     },
//     setup(props) {
//         const facturas = props.facturas

//         return { facturas };
//     }
// });
</script>
