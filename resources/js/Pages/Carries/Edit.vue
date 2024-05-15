<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';

defineProps({
    transportadora: {
        type: Object,
    },
});

const atualizarTransportadora = async (transportadora) => {
  try {
    await axios.put(`/transportadoras/${transportadora.id}`, transportadora);
    window.history.back();
    // this.$inertia.put(`/transportadoras/${transportadora.id}`, transportadora)
  } catch (error) {
    console.error('Erro ao criar transportadora:', error);
  }
};

</script>

<template>
    <AuthenticatedLayout>
      <div class="flex">
      <div class="container bg-white justify-center">
        <h1 class="text-2xl font-bold mb-4">Atualizar Transportadora</h1>
        <form @submit.prevent="atualizarTransportadora(transportadora)" class="space-y-4">
          <div class="space-y-2">
            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" id="nome" v-model="transportadora.nome" class="p-2 border rounded-md w-full" required>
          </div>
          <div class="space-y-2">
            <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
            <input type="text" id="cep" v-model="transportadora.cep" @blur="buscarEndereco" class="p-2 border rounded-md w-full" required>
          </div>
          <div class="space-y-2">
            <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
            <input type="text" id="endereco" v-model="transportadora.endereco" class="p-2 border rounded-md w-full" required>
          </div>
          <div class="space-y-2">
            <label for="bairro" class="block text-sm font-medium text-gray-700">Bairro</label>
            <input type="text" id="bairro" v-model="transportadora.bairro" class="p-2 border rounded-md w-full" required>
          </div>
          <div class="space-y-2">
            <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
            <input type="text" id="cidade" v-model="transportadora.cidade" class="p-2 border rounded-md w-full" required>
          </div>
          <div class="space-y-2">
            <label for="uf" class="block text-sm font-medium text-gray-700">UF</label>
            <input type="text" id="uf" v-model="transportadora.uf" class="p-2 border rounded-md w-full" required>
          </div>
          <div class="space-y-2">
            <label for="limite_credito" class="block text-sm font-medium text-gray-700">Limite de Crédito</label>
            <input type="text" id="limite_credito" v-model="transportadora.limite_credito" class="p-2 border rounded-md w-full" required>
          </div>
          <div class="space-y-2">
            <label for="data_analise_credito" class="block text-sm font-medium text-gray-700">Data de Análise de Crédito</label>
            <input type="text" id="data_analise_credito" v-model="transportadora.data_analise_credito" class="p-2 border rounded-md w-full" required>
          </div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Atualizar</button>
        </form>
      </div>
    </div>
    </AuthenticatedLayout>
    </template>
