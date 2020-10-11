<template>
  <div class="w-full  min-h-screen bg-theme_primary flex flex-wrap justify-center items-center pt-32">
    
    <div v-for="menu in $store.state.kategori" :key="toId(menu)" 
    ref="element"  
    :id="toId(menu)" 
    class="h-screen w-full p-3 lg:px-20">
      <h1 class="font-bold text-xl uppercase">
        {{ menu }}
      </h1>
    </div>
  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  mounted() {
      var that = this;
        window.addEventListener("scroll", function() {
          for(let index = 0; index < that.$store.state.kategori.length;index++){
            let top = that.$refs.element[index].getBoundingClientRect().top;
              if(top <= 120){
                  that.$store.commit('setMenuTab',that.toId(that.$store.state.kategori[index]))
              }
          }
        
      });
  }
  ,methods:{
    toId(string){
         return  string.replace(' ','').replace('&','').replace('-','').replace('/','').replace(' ','')
      }
  }
}
</script>

    