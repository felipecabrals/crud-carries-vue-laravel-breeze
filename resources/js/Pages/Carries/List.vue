<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

const transportadoras = ref([]);

const fetchTransportadoras = async () => {
  try {
    const response = await axios.get('/transportadoras');
    transportadoras.value = response.data;
  } catch (error) {
    console.error('Erro ao buscar transportadoras:', error);
  }
};

onMounted(fetchTransportadoras);

const deleteTransportadora = async (id) => {
  try {
    await axios.delete(`/transportadoras/${id}`);
    fetchTransportadoras();
  } catch (error) {
    console.error('Erro ao excluir transportadora:', error);
  }
};
</script>

<template>
  <div>
    <Link :href="route('transportadoras.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Nova Transportadora</Link>

    <table class="min-w-full divide-y divide-gray-200">
      <thead>
        <tr>
          <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
          <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Endereço</th>
          <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Bairro</th>
          <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Cidade</th>
          <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">UF</th>
          <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">CEP</th>
          <th class="px-6 py-3 bg-gray-50"></th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="transportadora in transportadoras" :key="transportadora.id">
          <td class="px-6 py-4 whitespace-no-wrap">{{ transportadora.nome }}</td>
          <td class="px-6 py-4 whitespace-no-wrap">{{ transportadora.endereco }}</td>
          <td class="px-6 py-4 whitespace-no-wrap">{{ transportadora.bairro }}</td>
          <td class="px-6 py-4 whitespace-no-wrap">{{ transportadora.cidade }}</td>
          <td class="px-6 py-4 whitespace-no-wrap">{{ transportadora.uf }}</td>
          <td class="px-6 py-4 whitespace-no-wrap">{{ transportadora.cep }}</td>
          <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
            <Link :href="route('transportadoras.edit', { id: transportadora.id })"  class="text-indigo-600 hover:text-indigo-900">Editar</Link>
            <button @click="deleteTransportadora(transportadora.id)" class="text-red-600 hover:text-red-900 ml-2">Excluir</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
