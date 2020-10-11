<template>
  <div class="w-full  p-2 bg-theme_primary_light mt-20 rounded-xl">


 
    <h2 class="text-primary w-full lg:w-1/4 p-3 rounded-lg  font-bold text-2xl ">
       Masuk
    </h2>
    
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Email</label>
        <input type="email" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Email" v-model="d.username">
    </div>

    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Password</label>
        <input  @keyup.enter="login" type="password" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Password" v-model="d.password">
    </div>
    <div class="flex p-3 w-full flex-wrap">

   <button @click="login" class="bg-primary w-full p-2  rounded-full font-bold text-xl text-secondary ">
     Masuk
   </button>
      <h2 class="w-full text-center p-3">
     Belum Punya Akun ? 
    </h2>
   <nuxt-link to="/register" class="text-primary text-center mt-2 w-full p-2  rounded-full font-bold text-xl border-2 border-primary ">
     Daftar
   </nuxt-link>
   
    </div>
   


  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  middleware: "noauth",
  data(){
    return{
      d: {}
    }
  },
  methods:{
     login() {
      //  cek
      if(this.d.username && this.d.password){
         this.$store.commit("login", this.d);
      }else{
        this.$toast.error('Email & Password Tidak Boleh Kosong',{
          closeOnSwipe: true,
          duration : 3000
        })
      }
   
    }
  }
}
</script>

    