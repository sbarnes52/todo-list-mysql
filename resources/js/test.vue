<template>

    <form @submit.prevent="addItem(newItem)">
        <input v-model="newItem">
        <button>Add item</button>
    </form>

    <list :items="todoList"></list>

</template>

<script>
    import axios from 'axios';
    import List from './components/list.vue';

    export default {
        data () {
            return {
                todoList: [],
                newItem: ''
            }
        },

        components: {
            'list': List
        },

        methods: {
            getItems () {
                axios.get('/api/list')
                .then((response) => {this.todoList = response.data})
                .catch(error => {console.log(error)});
            },
            addItem (addition) {
                axios.post('api/list/store', {text: addition})
                .then((response) => {
                    if (response.status === 201) {
                        console.log("Added successfully");
                        this.getItems();
                    }
                })
                .catch((error) => {console.log(error)});
            },
            removeItem (removal) {
                axios.delete('api/list/' + removal.id)
                .then((response) => {
                    if (response.status === 200) {
                        console.log("Deleted successfully");
                        this.getItems();
                    }
                })
                .catch(error => {console.log(error)});
            },
        },

        created () {
            this.getItems();
        }
    }

</script>

<style>

</style>