<template>
  <div>
    <Header/>
    <div>
      <router-view></router-view>
    </div>
  </div>

</template>

<script>
import Home from '../components/Home.vue';
import Blog from '../components/Blog.vue';
import About from '../components/About.vue';
import SinglePost from '../components/SinglePost.vue';
import Header from '../components/parts/Header.vue';

export default {
    components:{
        Home,
        About,
        Header,
        Blog,
        SinglePost
    }
}
</script>

<style>

</style>