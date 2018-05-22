<template>
    <div>
        <div v-for="product in products" :key="id" :product="product" class="col-md-6">
            <div class="col-md-4">
                <img :src="product.image" :alt="product.name" width="150" height="150">
            </div>
            <div class="col-md-8">
                <h3>{{product.name}}</h3>
                <p>{{product.description}}</p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            category_id: Number
        },
        data: function () {
            return {
                products: []
            }
        },
        watch: {
            category_id: function (newVal, oldVal) {
                axios.get('/api/category/products/' + newVal)
                    .then(response => {
                        this.products = response.data
                    })
            }
        }
    }
</script>