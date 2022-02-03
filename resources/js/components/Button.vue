<template>
    <button
        type="button"
        class="w-full px-6 py-2 rounded-lg bg-white shadow text-sm"
        @click="$emit('get-movies', qString)"
    >
        <span>{{ label }}</span>
    </button>
</template>

<script>
export default {
    name: "Button",
    props: {
        label: {
            type: String,
            default: ''
        },
        qString: {
            type: String,
            default: ''
        }
    }
}
</script>

<style scoped>

</style>
