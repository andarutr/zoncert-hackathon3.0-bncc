<template>
  <div class="w-full  p-2 bg-theme_primary_light mt-20 rounded-lg">


 
    <h2 class="text-primary w-full lg:w-1/4 p-3 rounded-lg  font-bold text-2xl ">
       Daftar
    </h2>
    
     
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Nama</label>
        <input type="text" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Nama" v-model="d.name">
    </div>
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Email</label>
        <input type="email" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Email" v-model="d.email">
    </div>

    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Password</label>
        <input @keyup.enter="register" type="password" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Password" v-model="d.password">
    </div>
    <div class="flex p-3 w-full flex-wrap">

   <button @click="register" class="bg-primary w-full p-2  rounded-full font-bold text-xl text-secondary ">
     Daftar
   </button>

   <h2 class="w-full text-center p-3">
     Sudah Punya Akun ? 
   </h2>
   <nuxt-link to="/login" class="text-primary text-center mt-2 w-full p-2  rounded-full font-bold text-xl border-2 border-primary ">
     Masuk
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
     register() {
      //  cek
        if(this.d.name && this.d.email && this.d.password){
          this.$store.commit("register", this.d);
        }else{
          this.$toast.error('Nama, Email & Password Tidak Boleh Kosong',{
            closeOnSwipe: true,
            duration : 3000
          })
        }
   
    }
  }
}
</script>

    