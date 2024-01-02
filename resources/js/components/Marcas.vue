<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Busca de marcas</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="inputId">ID</label>
                                    <input type="number" class="form-control" id="inputId" aria-describedby="idHelp"
                                        placeholder="ID">
                                    <small id="idHelp" class="form-text text-muted">
                                        Opcional. Informe o ID do registro.
                                    </small>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="inputNome">Nome</label>
                                    <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp"
                                        placeholder="Nome">
                                    <small id="nomeHelp" class="form-text text-muted">
                                        Opcional. Informe o nome da marca.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Pesquisar
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