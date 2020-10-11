<template>
  <div class="w-full pt-16 p-2 flex flex-wrap justify-center">
 
 
 

   <img src="/il/undraw_transfer_money_rywa.svg" class="w-2/3" alt="Tiket">
  
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
}
</script>

    