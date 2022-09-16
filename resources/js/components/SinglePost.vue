<template>
  <div>
    <div v-if="singlePost" class="card mb-3">
      <div class="card-body">
          <h5 class="card-title">{{ singlePost.title }}</h5>
          <p class="card-text">{{ singlePost.description }}</p>
          <div v-if="singlePost.category">
            <p class="card-text">{{ singlePost.category.name }}</p>
          </div>
          <div v-if="tags">
            <p v-for="tag,index in tags" :key="index" class="card-text">{{ tag.tags }}</p>
          </div>
          <a href="/blog">Torna a Blog</a>
      </div>
  </div>
  </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data (){
      return{
        singlePost: null,
        tags: '',
      }
    },
    mounted(){
      axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
      .then((response) => {
        this.singlePost = response.data.results;
        this.tags = this.singlePost.tags;
        console.log(this.singlePost);
        console.log(this.tags);
      });
      // console.log(this.$route.params.slug);
    }
    
}
</script>

<style>

</style>