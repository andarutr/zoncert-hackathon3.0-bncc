<template>
    <div >
       <nuxt-link class="flex bg-theme_primary_light hover:bg-theme_primary_dark p-3 rounded-xl mb-2" :to="'/konser/'+data.id">
       <div class="w-1/3">
            <img width="150px" height="150px" :src="data.thumbnail" alt="Populer">
       </div>
        <div class="w-2/3 p-3">
            <h1 class="font-bold text-lg lg:text-2xl">{{ data.name }}</h1>
            <h1 class="font-bold  lg:text-xl text-primary">{{ tgl(data.start) }}</h1>
            
            <button class="hover:bg-primary_dark text-secondary bg-primary px-6 p-1 rounded-full mt-3">
                Beli Tiket
            </button>
            <button class="text-primary float-right mt-3 flex">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-heart-fill " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                    <span class="px-2">30K</span>
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