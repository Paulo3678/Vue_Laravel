<template>
    <div :class="estilo" role="alert">

    </div>
</template>

<script>
export default {
    props: {
        type: { type: String }
    },
    computed: {
        estilo() {
            return 'alert alert-' + this.type;
        }
    }
}
</script>
