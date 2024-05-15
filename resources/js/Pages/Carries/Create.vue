
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive, ref  } from 'vue';
import axios from 'axios';

const form = reactive ({
  id: 2,
  nome: '',
  endereco: '',
  bairro: '',
  cidade: '',
  uf: '',
  limite_credito: '',
  data_analise_credito: '',
  cep: '',
});

const cep = ref('');

const buscarEndereco = async () => {
  try {
    axios.defaults.baseURL = 'http://localhost:8000';
    const response = await axios.get(`getEnderecoFromViaCEP?cep=${cep.value}`);
    const endereco = response.data;
    form.endereco = endereco.logradouro;
    form.bairro = endereco.bairro;
    form.cidade = endereco.localidade;
    form.uf = endereco.uf;
    form.cep = cep.value;
  } catch (error) {
    console.error('Erro ao buscar endereço:', error);
  }
};

const criarTransportadora = async () => {
  try {
    await axios.post('transportadoras', form);
    // Redirecionar para a página de listagem ou realizar outra ação após a criação bem-sucedida
  } catch (error) {
    console.error('Erro ao criar transportadora:', error);
  }
};


</script>

<template>
  <AuthenticatedLayout>
    <div class="flex">
    <div class="container bg-white justify-center">
      <h1 class="text-2xl font-bold mb-4">Criar Transportadora</h1>
      <form @submit.prevent="criarTransportadora" class="space-y-4">
        <div class="space-y-2">
          <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
          <input type="text" id="nome" v-model="form.nome" class="p-2 border rounded-md w-full" required>
        </div>
        <div class="space-y-2">
          <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
          <input type="text" id="cep" v-model="cep" @blur="buscarEndereco" class="p-2 border rounded-md w-full" required>
        </div>
        <div class="space-y-2">
          <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
          <input type="text" id="endereco" v-model="form.endereco" class="p-2 border rounded-md w-full" required>
        </div>
        <div class="space-y-2">
          <label for="bairro" class="block text-sm font-medium text-gray-700">Bairro</label>
          <input type="text" id="bairro" v-model="form.bairro" class="p-2 border rounded-md w-full" required>
        </div>
        <div class="space-y-2">
          <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
          <input type="text" id="cidade" v-model="form.cidade" class="p-2 border rounded-md w-full" required>
        </div>
        <div class="space-y-2">
          <label for="uf" class="block text-sm font-medium text-gray-700">UF</label>
          <input type="text" id="uf" v-model="form.uf" class="p-2 border rounded-md w-full" required>
        </div>
        <div class="space-y-2">
          <label for="limite_credito" class="block text-sm font-medium text-gray-700">Limite de Crédito</label>
          <input type="text" id="limite_credito" v-model="form.limite_credito" class="p-2 border rounded-md w-full" required>
        </div>
        <div class="space-y-2">
          <label for="data_analise_credito" class="block text-sm font-medium text-gray-700">Data de Análise de Crédito</label>
          <input type="text" id="data_analise_credito" v-model="form.data_analise_credito" class="p-2 border rounded-md w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
      </form>
    </div>
  </div>
  </AuthenticatedLayout>
  </template>