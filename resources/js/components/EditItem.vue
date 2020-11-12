<template>
    <div>
        <p class="font-black text-center mt-4 text-3xl">Edit Todo List</p>
        <form @submit.prevent="updateItem" class="w-full max-w-sm">
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Title
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-full-name"
                           type="text" v-model="item.title">
                </div>
            </div>


            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                        Update Item
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                item: {}
            }
        },
        created() {
            this.axios
                .get(`http://tailwind.tl/api/item/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.item = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateItem() {
                this.axios
                    .post(`http://tailwind.tl/api/item/update/${this.$route.params.id}`, this.item)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>