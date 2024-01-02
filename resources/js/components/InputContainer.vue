<template>
    <div class="form-group mb-3">
        <label :for="id">{{ titulo }}</label>
        <slot></slot>
        <small :id="idhelp" class="form-text text-muted">
            {{ help }}
        </small>
    </div>
</template>

<script lang="ts">
export default {
    props: {
        id: { type: String, required: true },
        titulo: { type: String, required: true },
        help: { type: String, required: true },
        idhelp: { type: String, required: true },
        type: { type: String, required: true },
    }
}
</script>
