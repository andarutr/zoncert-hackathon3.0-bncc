<template>
  <div class="w-full pt-16 p-2 mb-20" v-if="konser">
        <img  class="w-full lg:w-2/3 mx-auto" src="/il/undraw_super_thank_you_obwk.svg" alt="Populer">
        <div class="w-full p-3">
            <div class="flex flex-wrap py-3">
                 <button class="hover:bg-primary hover:text-secondary text-lg  text-center  border-primary border-2 w-full lg:w-1/2 p-2 rounded-full text-primary mb-2 font-bold">
                    Paket 1
                    <span>Rp. 500.000</span>
                </button>
                <button class="hover:bg-primary hover:text-secondary text-lg  text-center  border-primary border-2 w-full lg:w-1/2 p-2 rounded-full text-primary mb-2 font-bold">
                    Paket 1
                    <span>Rp. 500.000</span>
                </button>
                <button class="hover:bg-primary hover:text-secondary text-lg  text-center  border-primary border-2 w-full lg:w-1/2 p-2 rounded-full text-primary mb-2 font-bold">
                    Paket 1
                    <span>Rp. 500.000</span>
                </button>
                <button class="hover:bg-primary hover:text-secondary text-lg  text-center  border-primary border-2 w-full lg:w-1/2 p-2 rounded-full text-primary mb-2 font-bold">
                    Paket 1
                    <span>Rp. 500.000</span>
                </button>
            </div>
              <button @click="$store.commit('like',konser.id);konser.like = konser.like+1" 
              class="text-primary float-right w-full justify-center border border-primary p-2 rounded-full  text-center mt-4 flex">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-heart-fill " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                    <span class="px-2" > {{  konser.like }} Suka</span> 
            </button>
            <button class="bg-primary w-full hover:bg-primary_dark text-secondary font-bold  text-2xl p-2 rounded-full my-3">
                Beli Tiket
            </button>
            <h1 class="font-bold text-2xl">
                {{ konser.name }}
            </h1>
          <h1 class="font-bold  text-xl text-primary">{{tgl(konser.start)}} - {{tgl(konser.end)}}</h1>
            
            <p class="py-2">
                {{ konser.description}}
            </p>
        </div>

  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
   created(){
        // get konser
        this.$axios.get(this.$store.state.api+"concert/"+this.$route.params.id)
        .then(res => {
            console.log(res.data)
            this.konser = res.data
        })
    },
    methods:{
        tgl(req){
            let arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            let date = new Date(req);
            let tanggal = date.getDate();
            let bulan = date.getMonth();
            let tahun = date.getFullYear();
            return tanggal+" "+arrbulan[bulan]+" "+tahun;
        }
    },
    data(){
        return{
            konser_saya: true,
            konser: ''
        }
    }
}
</script>

    