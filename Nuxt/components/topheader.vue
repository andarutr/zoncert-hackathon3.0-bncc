<template>
    <div class="w-full px-3 fixed lg:px-10 p-3 bg-theme_primary_light z-50">
           <!-- Header -->
            <nav class="w-full flex flex-wrap" >
                
                    <nuxt-link to="/" class="mr-auto flex ">
                        <div class="flex text-primary" >
                            <img class="w-8 h-8 " src="/icon.png" alt="avatar" >
                                <span class="hidden lg:block px-2 font-bold text-2xl"> 
                                    Zoncert
                                </span> 
                              <span class="block lg:hidden px-2 font-bold text-xl"> 
                                 Zoncert
                            </span> 
                        </div>

                    </nuxt-link>

                    <div class="ml-auto flex">

                         <nuxt-link v-for="kat in $store.state.kategori" :key="kat.id" :to="`/cari?keyword=${kat.category}`" class="
                          hidden lg:flex 
                          px-5 text-primary cursor-pointer relativehover:text-primary_dark">
                            <span class="p-1">{{ kat.category }}</span>
                        </nuxt-link>
                         <nuxt-link  to="/cari" class="px-3 text-primary cursor-pointer relative flex">
                           <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="m-1 bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                          </svg>
                        </nuxt-link>
                        
                          <nuxt-link to="/login" v-if="!$store.state.auth" class="
                          border-2 border-primary font-bold
                          rounded-xl
                          px-5 text-primary cursor-pointer  relative flex">
                       
                            <span class="p-1">Masuk</span>
                        </nuxt-link>

                        <div @click="$store.commit('toggleSetting')" class="px-3 text-primary cursor-pointer relative flex">
                            <svg class="bi bi-gear m-1" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                                <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                                </svg>
                        </div>
                    </div>
                  
            </nav>


   </div>
</template>

<script>
export default {
    methods:{
    }
}
</script>



<style scoped>


.filter-container .mobile-tab-wrap {
  overflow: auto;
}

.filter-container .mobile-tab-wrap .filter-tabs {
  width: auto;
  min-width: 1000px;
  background: transparent;
}

.filter-tabs {
  display: flex;
  flex-wrap: wrap;
  background: #f2f2f2;
}

</style>