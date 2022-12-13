<template>
    <ol>
        <list-item
            v-for="item in items"
            :key="item.id"
            :item="item"
        ></list-item>
    </ol>
</template>

<script>
    import ListItem from './listitem.vue';

    export default {
        components: {
            'list-item': ListItem
        },

        props: {
            items: Array
        },

        methods: {
            removeItem (item) {this.$parent.removeItem(item)}
        }
    }
</script>
