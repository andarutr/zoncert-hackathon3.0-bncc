<template>
  <div class="w-full pt-16 p-2 mb-20">
     
        <div class="w-full p-3 flex">

             <img  class="w-20 h-20" src="/il/undraw_super_thank_you_obwk.svg" alt="Populer">
            
            <div class="px-5">
                   <h1 class="font-bold text-2xl">
                            Live Konser BTS Full Fight
                    </h1>
                    <h1 class="font-bold  text-xl text-primary">4 - 6 November 2020</h1>
            </div>
           
        </div>


        <div v-if="konser_saya">
             <button class="bg-primary float-right rounded-full text-secondary p-1 px-4 text-xs">
               Buat Tiket
            </button>
        </div>
        <p class="p-4">
             Diskusi Konser
        </p>

  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  created(){
    // get konser
  },
  data(){
    return{
      konser_saya: true
    }
  }
}
</script>

    