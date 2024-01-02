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
                        <button type="button" class="btn btn-primary btn-sm">
                            Adicionar
                        </button>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
export default {
}
</script>