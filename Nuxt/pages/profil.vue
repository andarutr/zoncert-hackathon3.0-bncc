<template>
  <div class="w-full pt-16 p-2">
 
   <h2 class="text-primary w-full  p-3 rounded-lg  font-bold text-2xl ">
     Profil Saya

     <span @click="logout" class="cursor-pointer float-right text-sm border-b  border-danger px-2 font-normal text-danger">
         Keluar
    </span>
   </h2>




    <div class="flex p-3 w-full flex-wrap">
       <div class="border-2 rounded-full p-2 bg-theme_primary_light">
          <img src="/icon.png" width="50" height="50" alt="">
       </div>
        <div class="px-2 pt-2">
           <label class="w-full font-bold py-2">Nama</label>
            <h2 class="text-xl">
              {{ $store.state.user.name}}
            </h2>
        </div>
    </div>
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Email</label>
       <h2 class="text-xl">
          {{ $store.state.user.email}}
       </h2>
    </div>






       

        
  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  middleware: "auth",
  methods:{
    logout(){
      this.$store.commit("logout")
    }
  }
}
</script>

    