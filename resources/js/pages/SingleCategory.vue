<template>
    <div class="container" v-if="category">
        <h1>{{category.name}}</h1>
        <template v-if="category.posts.length > 0">
            <h3>Lista dei post associati</h3>
            <ul> 
                <li v-for="post in category.posts" :key="post.id">
                    <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">{{post.title}}</router-link>
                </li>
            </ul>
        </template>
    </div>
</template>

<script>
export default {
    name: 'SingleCategory',
    data(){
        return {
            category:null
        }
    },
    created(){
        axios.get(`/api/categories/${this.$route.params.slug}`)
        .then((response)=>{
            this.category = response.data
        })
    }

}
</script>

<style>

</style>