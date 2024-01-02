<template>
    <div class="card mb-3">
        <div class="card-header">{{ titulo }}</div>

        <div class="card-body">
            <slot name="conteudo"></slot>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <slot name="rodape"></slot>
        </div>
    </div>
</template>

<script lang="ts">
export default {
    props: {
        titulo: { required: true, type: String },
    }
}
</script>
