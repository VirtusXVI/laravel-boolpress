<template>
  <div class="container">
    <h1 class="mb-5">Blog</h1>
    <Posts/>
  </div>
</template>

<script>

import Posts from './parts/Posts.vue';

export default {
  name: 'Blog',
  components:{
    Posts,
  }
}
</script>

<style>

</style>