<template>
    <div >
       <nuxt-link class="flex bg-theme_primary_light hover:bg-theme_primary_dark p-3 rounded-xl mb-2" :to="'/diskusi-konser/'+data.id">
       <div class="w-1/3">
            <img width="150px" height="150px" class="rounded-xl" :src="data.thumbnail" :alt="data.thumbnail">
       </div>
        <div class="w-2/3 p-3">
            <h1 class="font-bold text-lg lg:text-2xl">{{ data.name }}</h1>
            <h1 class="font-bold  lg:text-xl text-primary">
                {{ tgl(data.start)}}
            </h1>
            
          
             <button class="font-bold  text-primary lg:text-lg  p-1 rounded-full mt-2">
                30K Bergabung
            </button>

             <!-- <nuxt-link :to="`/edit/konser/${data.id}`" class="bg-primary float-right rounded-full text-secondary p-1 px-4 text-xs">
               Edit
            </nuxt-link> -->
        </div>
       </nuxt-link>
    </div>
</template>
<script>
export default {
    props:['data'],
    methods:{
        tgl(req){
            let arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            let date = new Date(req);
            // millisecond = date.getMilliseconds();
            // detik = date.getSeconds();
            // menit = date.getMinutes();
            // jam = date.getHours();
            // hari = date.getDay();
            let tanggal = date.getDate();
            let bulan = date.getMonth();
            let tahun = date.getFullYear();
            return tanggal+" "+arrbulan[bulan]+" "+tahun;
        }
    }
}
</script>