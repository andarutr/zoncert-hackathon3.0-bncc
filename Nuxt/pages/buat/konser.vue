<template>
  <div class="w-full pt-16 p-2 flex flex-wrap mb-20">

    
   <h2 class="w-full p-3 rounded-full text-primary text-3xl font-bold">
     Buat Konser Baru
   </h2>




   <!-- Form -->
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Kategori</label>
        <v-select class="w-full bg-theme_primary_light" :options="$store.state.kategori" v-model="d.kategori" multiple />
    </div>
       <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Jenis Konser</label>
        <v-select class="w-full bg-theme_primary_light" :options="$store.state.jenis_konser" v-model="d.jenis_konser" />
    </div>
       <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Nama</label>
        <input type="text" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.nama">
    </div>
    
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Tanggal Mulai</label>
        <input type="text" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.tgl_mulai">
    </div>
    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Tanggal Selesai</label>
        <input type="text" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.tgl_selesai">
    </div>
       <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Jam Mulai</label>
        <input type="text" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.jam_mulai">
    </div>

    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Jam Selesai</label>
        <input type="text" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" placeholder="Nama Konser" v-model="d.jam_selesai">
    </div>


    <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Tempat</label>
        <textarea placeholder="Tempat Konser" class="bg-theme_primary_light w-full p-3 rounded-lg px-5"></textarea>
    </div>


   <div class="flex p-3 w-full flex-wrap justify-center">
        <label class="w-full font-bold py-2 text-center">Gambar Utama</label>
       
       <croppa v-model="myCroppa"></croppa>

    </div>
       <div class="flex p-3 w-full flex-wrap">
        <label class="w-full font-bold py-2">Deskripsi</label>
       
        <textarea v-model="d.deskripsi" placeholder="Detail Konser" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" cols="30" rows="10"></textarea>
    </div>

    <div class="flex p-3 w-full flex-wrap">
     
     <button class="bg-primary w-full p-3 rounded-lg px-5">
         Simpan
     </button>
     </div>

    
    

    <!-- <div class="flex p-3 w-full flex-wrap">
    <label class="w-full font-bold py-2">Gambar Pendukung</label>
    </div>
    
    <div class="flex p-3 w-full flex-wrap">
    <label class="w-full font-bold py-2">Daftar Harga</label>
    </div> -->

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
  data(){
        return{
            myCroppa: {},
            d: {},
        }
  },
  method:{
      simpan(){
        //    this.myCroppa.generateBlob(
        //         blob => {
        //         // write code to upload the cropped image file (a file is a blob)
        //         },
        //         'image/jpeg',
        //         0.8
        //     ); // 80% compressed jpeg file
        //     }
      }
  }
}
</script>

    