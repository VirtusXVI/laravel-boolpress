<template>
  <div>
    <p>
        <router-link to="/foo">Go to Foo</router-link>
        <router-link to="/bar">Go to Bar</router-link>
    </p>
    <Posts/>
  </div>
</template>

<script>
import Posts from '../components/Posts.vue';

export default {
    components:{
        Posts,
    }
}
</script>

<style>

</style>