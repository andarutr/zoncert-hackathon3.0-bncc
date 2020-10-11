<template>
  <div class="w-full pt-16 p-2 mb-20" v-if="konser">
     
        <div class="w-full p-3 flex">

             <img  class="w-20 h-20" src="/il/undraw_super_thank_you_obwk.svg" alt="Populer">
            
            <div class="px-5">
                   <h1 class="font-bold text-2xl">
                            {{konser.name}}
                    </h1>
                    <h1 class="font-bold  text-xl text-primary">{{tgl(konser.start)}} - {{tgl(konser.end)}}</h1>
            </div>
           
        </div>


        <div v-if="konser_saya">
            <ul>
              <li>
                  {{ konser.CostConcert}}
              </li>
            </ul>
             <button class="bg-primary float-right rounded-full text-secondary p-1 px-4 text-xs">
               Buat Tiket
            </button>
              <button class="bg-primary float-right rounded-full text-secondary p-1 px-4 text-xs">
              Edit Konser
            </button>
        </div>
        <p class="p-4">
             Diskusi Konser :
        </p>

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

    