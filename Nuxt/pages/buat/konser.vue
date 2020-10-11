<template>
  <div class="w-full mt-20 rounded-lg bg-theme_primary_light  p-2 flex flex-wrap mb-20">

    
   <h2 class="w-full p-3 rounded-full text-primary text-3xl font-bold">
     Buat Konser Baru
   </h2>

   <!-- Form -->
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Kategori</label>
        <v-select class="w-full bg-theme_primary"  :options="$store.state.kategori" label="category" v-model="d.category_id" multiple :reduce="dx => dx.category" />
    </div>
       <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Jenis Konser</label>
        <v-select class="w-full bg-theme_primary"  :options="$store.state.jenis_konser" label="type" v-model="d.type_id" :reduce="dx => dx.type" />
    </div>
       <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Nama</label>
        <input type="text" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.name">
    </div>
    
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Tanggal Mulai</label>
        <input type="date" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.start">
    </div>
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Tanggal Selesai</label>
        <input type="date" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.end">
    </div>
  

    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Tempat</label>
        <textarea placeholder="Tempat Konser" v-model="d.location" class="bg-theme_primary w-full p-3 rounded-lg px-5"></textarea>
    </div>


   <div class="flex p-3 w-full flex-wrap justify-center">
        <label class="w-full font-bold py-2 text-center">Gambar Utama</label>
       
       <croppa v-model="myCroppa"   
                :width="300"
                :height="300"
                 :quality="2"
                :placeholder="'Upload Foto'"
                ></croppa>

    </div>
       <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Deskripsi</label>
       
        <textarea v-model="d.description" placeholder="Detail Konser" class="bg-theme_primary w-full p-3 rounded-lg px-5" cols="30" rows="10"></textarea>
    </div>

    <div class="flex p-3 w-full flex-wrap">
     
     <button @click="simpan" class="bg-primary text-secondary w-full p-3 rounded-lg px-5">
         Simpan
     </button>
     </div>

  </div>
</template>

<script>

// If your build tool supports css module
import 'vue-croppa/dist/vue-croppa.css';

import Vue from 'vue';
import Croppa from 'vue-croppa';

Vue.use(Croppa);

export default {
  scrollToTop: true,
  layout: 'app',
  middleware: "auth",
  data(){
        return{
            myCroppa: {},
            d: {},
        }
  },
  methods:{
      simpan(){

            this.d.thumbnail = this.myCroppa.generateDataUrl();
            this.$axios.post(this.$store.state.api+"concert/create",this.d)
                .then(res => {
                    if(res.data.status == "success"){
                        this.$router.push("/konser-saya")
                    }
                })
      }
  }
}
</script>

    