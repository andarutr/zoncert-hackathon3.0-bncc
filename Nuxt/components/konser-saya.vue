<template>
    <div >
       <nuxt-link class="flex bg-theme_primary_light hover:bg-theme_primary_dark p-3 rounded-xl mb-2" :to="'/masuk-konser/'+data.id">
       <div class="w-1/3">
            <img width="150px" height="150px" class="rounded-xl" :src="data.thumbnail" :alt="data.thumbnail">
       </div>
        <div class="w-2/3 p-3">
            <h1 class="font-bold text-lg lg:text-2xl">{{ data.name }}</h1>
            <h1 class="font-bold  lg:text-xl text-primary">
                {{ tgl(data.start)}}
            </h1>
            
             <button class="text-primary border-2  border-primary px-6 p-1 rounded-full mt-3">
               Lihat Konser
            </button>


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
            let tanggal = date.getDate();
            let bulan = date.getMonth();
            let tahun = date.getFullYear();
            return tanggal+" "+arrbulan[bulan]+" "+tahun;
        }
    }
}
</script>