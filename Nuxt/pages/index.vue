<template>
  <div class="w-full flex flex-wrap  pt-10 mt-4 mb-20">
    
    <div class=" w-full p-3">
      <h1 class="font-bold text-xl uppercase pb-4">
        Populer
      </h1>
       <img v-if="!konserPopuler" src="/il/undraw_super_thank_you_obwk.svg" alt="Populer">
    
        <konser class="w-full" v-for="konser in konserPopuler" :key="konser.id" :data="konser" />
    </div>

     <div  class="w-full p-3">
      <h1 class="font-bold text-xl uppercase pb-4">
        Terbaru
      </h1>
       <img v-if="!konserTerbaru" src="/il/undraw_update_uxn2.svg" alt="Terbaru">
   
        <konser class="w-full" v-for="konser in konserTerbaru" :key="konser.id" :data="konser" />

      
    </div>

  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  data(){
      return{
        konserPopuler: '',
        konserTerbaru: ''
      }
  },
  created(){
    this.getData()
  },
  methods:{
    getData(){
      this.$axios.get(this.$store.state.api+"concert/populer")
        .then(res => {
          this.konserPopuler = res.data.data.data
        })

      this.$axios.get(this.$store.state.api+"concert")
        .then(res => {
          this.konserTerbaru = res.data.data.data
        })

    }
  }

}
</script>

    