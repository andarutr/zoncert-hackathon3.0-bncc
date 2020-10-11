<template>
  <div class="w-full pt-16 p-2 flex flex-wrap">
 

   
     <div v-if="!konserSaya" class="w-full content-center justify-center flex my-3">
            <img src="/il/undraw_happy_music_g6wc.svg" alt="avatar" >
      </div>
      
  <nuxt-link to="/buat/konser" class=" text-lg bg-primary border-primary border-4 w-full text-center lg:w-1/2 p-2 rounded-full text-secondary mb-2 font-bold">
     Buat Konser Baru
   </nuxt-link>
    <nuxt-link to="/" class=" text-lg  text-center  border-primary border-4 w-full lg:w-1/2 p-2 rounded-full text-primary mb-2 font-bold">
     Cari Konser
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
            konserSaya: ''
        }
  }
}
</script>

    