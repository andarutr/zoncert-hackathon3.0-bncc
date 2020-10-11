<template>
  <div class="w-full flex flex-wrap  pt-10 mt-4 mb-20">
    
    <div class=" w-full p-3">
      <h1 class="font-bold text-xl uppercase pb-4">
        Populer
      </h1>
        <konser class="w-full" v-for="i in 5" :key="i" :data="{id:1}" />
    </div>

     <div  class="w-full p-3">
      <h1 class="font-bold text-xl uppercase pb-4">
        Terbaru
      </h1>

      <konser class="w-full" v-for="i in 5" :key="i" :data="{id:1}" />
      
    </div>

  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',

}
</script>

    