<template>
  <div class="w-full pt-16 p-2 flex flex-wrap justify-center">
 
 
 

 <tiket-saya class="w-full" v-for="tiket in tiketSaya.data" :key="tiket" :data="tiket" />

  
   <nuxt-link to="/" class="text-center border-primary border-4 w-full p-2 rounded-full text-primary font-bold text-xl my-3 ">
    Beli Tiket
   </nuxt-link>


  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  middleware: "auth",
  data(){
    return{
      tiketSaya: ''
    }
  },
  created(){
      this.$axios.get(this.$store.state.api+"my-ticket")
          .then(res => { 
            this.tiketSaya = res.data
      })
  }
}
</script>

    