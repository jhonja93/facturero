<script setup>
import { ref } from "vue";
import Input from "@/Components/Input.vue";

const props = defineProps(["products"]);
const emit = defineEmits(["update:products"]);

const _products = ref(props.products)

function updateProducts() {
  emit("update:products", _products)
}

</script>

<template>
    <table class="min-w-full">
        <thead>
            <tr>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    Código
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    Producto
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    Cantidad
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    Precio Unitario
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    Descuento Unitario
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    Subtotal
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    ICE
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    IVA
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                >
                    Total
                </th>
            </tr>
        </thead>

        <tbody class="bg-white">
            <tr v-for="(p, index) in _products" :key="index">
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <div class="text-sm leading-5 text-gray-900">
                        {{ p.codigo }}
                    </div>
                </td>
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <div class="text-sm leading-5 text-gray-900 w-40">
                        {{ p.producto }}
                    </div>
                </td>
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <Input class="w-32 text-right" type="number" v-model="p.cantidad" @input="updateProducts"/>
                </td>
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                  <Input class="text-right" type="number" step="0.01" v-model="p.precio" @input="updateProducts"/>
                </td>
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <Input class="w-32" step="0.01" type="number" v-model="p.descuento" @input="updateProducts"/> %
                </td>
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <div class="text-sm leading-5 text-gray-900">
                        ${{ p.subtotal }}
                    </div>
                </td>
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <div class="text-sm leading-5 text-gray-900">$0.00</div>
                </td>
                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <div class="text-sm leading-5 text-gray-900">
                        ${{ p.iva }}
                    </div>
                </td>

                <td
                    class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                    <div class="text-sm leading-5 text-gray-900">
                        ${{ p.total }}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
