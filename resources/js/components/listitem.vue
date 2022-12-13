<template>
    <li>
        {{ item.text }}
        <button @click="removeItem(item)">Remove</button>
    </li>
</template>

<script>
    export default {
        props: {
            item: Object
        },

        methods: {
            removeItem (item) {this.$parent.removeItem(item)}
        }
    }
</script>
