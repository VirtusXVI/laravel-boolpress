<template>
  <div>
    <div>
        <div class="row row-cols-3">
            <div class="col" v-for="post,index in posts" :key="index">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ textSlicer(post.description) }}</p>
                        <a :href="'/blog/' + post.slug">Scopri Di Più</a>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <ul class="pagination">
                <li class="page-item"  
                :class="paginationData.current_page == 1 ? 'disabled' : ''"><a class="page-link" @click="apiCall(paginationData.current_page - 1)">Previous</a></li>
                <li class="page-item"  
                :class="paginationData.current_page == paginationData.last_page ? 'disabled' : ''"><a class="page-link" 
                @click="apiCall(paginationData.current_page + 1)">Next</a></li>
            </ul>
        </nav>
    </div>
  </div>

  
</template>

<script>
export default {
    name: 'Posts',
    data(){
        return{
            posts: [],
            paginationData: [],
        }
    },
    methods:{
        apiCall(pageNumber){
            axios.get('http://127.0.0.1:8000/api/posts?page=' + pageNumber)
            .then((response) =>{
            this.posts = response.data.results.data;
            this.paginationData = response.data.results;
            console.log(this.posts);
            })
        },
        textSlicer(text){
            if(text.length > 200){
                return text.slice(0, 200);
            }
            else{
                return text;
            }
        }
    },
    mounted(){
        this.apiCall(1);
    }
}
</script>

<style>
a{
    cursor: pointer;
}
</style>