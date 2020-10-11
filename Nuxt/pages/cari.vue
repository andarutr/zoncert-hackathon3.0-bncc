<template>
  <div class="w-full pt-16 p-2 mb-20">
 
   <div class="flex flex-wrap  ">
     <b class="p-2 w-full text-2xl text-primary font-bold">Cari Konser</b>

         
      
      <div class="flex w-full flex-wrap mb-3">
          <input @keyup.enter="getData" type="text" class="bg-theme_primary_light w-full p-3 rounded-xl px-5" placeholder="Cari Nama Konser" v-model="keyword">
      </div>
      
      <div v-if="keyword" class="w-full">
        <konser class="w-full" v-for="konser in cariKonser" :key="konser.id" :data="konser" />
         
      </div>
      <div v-else class="flex w-full flex-wrap">
           <nuxt-link v-for="kat in $store.state.kategori" :key="kat.id" :to="`/cari?keyword=${kat.category}`" class="
              flex font-bold rounded-xl mb-2 p-2 text-center text-lg w-full
              px-5 text-primary hover:bg-theme_primary_dark bg-theme_primary_light  cursor-pointer relativehover:text-primary_dark">
                <span class="p-1">{{ kat.category }}</span>
            </nuxt-link>
      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  data(){
    return{
      keyword: '',
      cariKonser: ''
    }
  },
  created(){
     if(this.$route.query.keyword){
        this.keyword = this.$route.query.keyword
        
      }
      
    this.getData()
  },
  methods:{
    getData(){
      if(this.keyword){
          this.$axios.get(this.$store.state.api+"concert/search/"+this.keyword)
            .then(res => {
              console.log(res.data.data.data)
              this.cariKonser = res.data.data.data
            })
      }
    
    }
  },
  watch:{
    $route (to, from){
        if(this.$route.query.keyword){
          this.keyword = this.$route.query.keyword
          this.getData()
        }
  }
},
}
</script>

    