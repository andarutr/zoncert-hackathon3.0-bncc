<template>
  <div class="w-full pt-16 p-2 mb-20" v-if="konser">
        <img  class="w-full lg:w-2/3 mx-auto rounded-xl" :src="konser.thumbnail" alt="Populer">
        <div class="w-full p-3">
           
            <div class="flex flex-wrap py-3">
                 <button class="hover:bg-primary hover:text-secondary text-lg  text-center  border-primary border-2 w-full lg:w-1/2 p-2 rounded-full text-primary mb-2 font-bold"
                 v-for="tiket in konser.cost_concert" :key="tiket.id" @click="cost_id = tiket.id" :class="(cost_id == tiket.id) ? 'bg-primary text-secondary' : ''">
                   {{ tiket.name }}
                    <span class="px-2">{{ tiket.cost  }}</span>
                </button>
            </div>


              <span class="px-2 text-left text-primary font-bold text-xl" > {{  konser.like }} Menyukai</span> 
              <button @click="$store.commit('like',konser.id);konser.like = konser.like+1" 
              class="text-primary float-right w-full justify-center border border-primary p-2 rounded-full   mt-4 flex">


                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-heart-fill " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                    <span class="px-2" > Sukai</span> 
            </button>
            <button @click="simpan" class="bg-primary w-full hover:bg-primary_dark text-secondary font-bold  text-2xl p-2 rounded-full my-3">
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
        },
        simpan(){
            if(this.cost_id){
                this.$axios.get(this.$store.state.api+"buy-ticket/"+this.konser.id+"/"+this.cost_id)
                    .then(res => {
                        this.$router.push("/tiket-saya")
                    })
            }
        }
    },
    data(){
        return{
            cost_id: '',
            konser_saya: true,
            konser: ''
        }
    }
}
</script>

    