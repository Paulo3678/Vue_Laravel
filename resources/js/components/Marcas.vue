<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- INICIO CARD BUSCA -->
                <card-component titulo="Busca de marcas">
                    <template v-slot:conteudo>
                        <div class="row">
                            <div class="col">
                                <input-container-component id="inputId" titulo="ID" type="number"
                                    help="Opcional. Informe o ID do registro" idhelp="inputId">
                                    <input type="number" class="form-control" id="inputId" aria-describedby="idHelp"
                                        placeholder="ID">
                                </input-container-component>
                            </div>

                            <div class="col">
                                <input-container-component id="inputNome" titulo="Nome" type="text"
                                    help="Opcional. Informe o nome da marca" idhelp="inputNome">
                                    <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp"
                                        placeholder="Nome">
                                </input-container-component>
                            </div>
                        </div>
                    </template>
                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Pesquisar
                        </button>
                    </template>
                </card-component>

                <!-- INICIO CARD LISTAGEM DE MARCAS -->
                <card-component titulo="Relação de Marcas">
                    <template v-slot:conteudo>
                        <table-component />
                    </template>
                    <template v-slot:rodape>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalMarca">
                            Adicionar
                        </button>
                    </template>
                </card-component>
            </div>
        </div>

        <modal-component id="modalMarca" titulo="Adicionar marca">

            <template v-slot:conteudo>
                <input-container-component id="novoNome" titulo="Nome da marca" type="number" help="Informe o nome da marca"
                    idhelp="novoNomeHelp">
                    <input type="text" class="form-control" id="novoNome" aria-describedby="novoNomeHelp"
                        placeholder="Informe o nome da marca" v-model="nomeMarca">
                </input-container-component>

                <input-container-component id="novoImagem" titulo="Imagem" type="number"
                    help="Selecione uma imagem no formato png" idhelp="novoImagemHelp">
                    <input type="file" class="form-control" id="novoImagem" aria-describedby="novoImagemHelp"
                        placeholder="Selecione uma imagem" @change="carregarImagem($event)">
                </input-container-component>
            </template>

            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="salvar()">Salvar</button>
            </template>
        </modal-component>
    </div>
</template>

<script lang="ts">
import axios from 'axios';

export default {
    data() {
        return {
            urlBase: 'http://localhost:8000/api/v1/marca',
            nomeMarca: '',
            arquivoImagem: [],
        }
    },
    methods: {
        carregarImagem(event) {
            this.arquivoImagem = event.target.files;
        },
        salvar() {
            let formData = new FormData();
            formData.append("nome", this.nomeMarca);
            formData.append("imagem", this.arquivoImagem[0]);

            let config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Accept': 'application/json',
                }
            };


            axios.post(this.urlBase, formData, config)
                .then(response => {
                    console.log(response);
                })
                .catch(errors => {
                    console.log(errors);
                });
        }
    }
}
</script>