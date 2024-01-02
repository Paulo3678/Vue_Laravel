<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- INICIO CARD BUSCA -->
                <div class="card mb-3">
                    <div class="card-header">Busca de marcas</div>

                    <div class="card-body">
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
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Pesquisar
                        </button>
                    </div>
                </div>

                <!-- INICIO CARD LISTAGEM DE MARCAS -->
                <div class="card">
                    <div class="card-header">Relação de marcas</div>

                    <div class="card-body">
                        <table-component />
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm">
                            Adicionar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>