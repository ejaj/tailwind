<template>
    <div>
        <p class="font-black text-center mt-4 text-3xl">Todo List</p>
        <table class="table-auto" width="100%">
            <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items" :key="item.id">
                <td class="border px-4 py-2">{{ item.id }}</td>
                <td class="border px-4 py-2">{{ item.title }}</td>
                <td class="border px-4 py-2" width="20px">
                    <div class="inline-flex">
                        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            <router-link :to="{name: 'edit', params: { id: item.id }}"
                                         class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </router-link>
                        </button>
                        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">

                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    @click="deleteItem(item.id)">Delete
                            </button>
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        created() {
            this.axios
                .get('http://tailwind.tl/api/items')
                .then(response => {
                    this.items = response.data;
                });
        },
        methods: {
            deleteItem(id) {
                this.axios
                    .delete(`http://tailwind.tl/api/item/delete/${id}`)
                    .then(response => {
                        let i = this.items.map(item => item.id).indexOf(id); // find index of your object
                        this.items.splice(i, 1)
                    });
            }
        }
    }
</script>
