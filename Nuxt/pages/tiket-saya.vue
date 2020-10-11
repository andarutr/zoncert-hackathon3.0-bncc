<template>
  <div class="w-full pt-16 p-2 flex flex-wrap">
 
 
 

   <nuxt-link to="/" class="text-center border-primary border-4 w-full p-2 rounded-full text-primary font-bold text-xl mt-3 ">
    Cari Konser
   </nuxt-link>

   <img src="/il/undraw_transfer_money_rywa.svg" alt="Tiket">
  

  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  middleware: "auth",
}
</script>

    