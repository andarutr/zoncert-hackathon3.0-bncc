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
              <li v-for="tiket in konser.CostConcert" :key="tiket.id">
                  {{ tiket.name }}
              </li>
            </ul>
             <!-- <button  class="bg-primary float-right rounded-full text-secondary p-1 px-4 text-xs">
               Buat Tiket
            </button> -->
        </div>
        <p class="p-4">
             Diskusi Konser :
        </p>

        <div>
          <ul class="p-3">
            <li class="mt-2 flex flex-wrap">
              <span class="font-bold w-full">Ari Bahtiar</span>
              <span>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit quam modi! Sint officiis non nisi? Tempore eveniet sint dolores quasi facilis quaerat amet! Tenetur enim ut hic quam cumque.
              </span>
            </li>

             <li class="text-right mt-2 flex flex-wrap">
                <span class="font-bold float-right w-full">Andaru</span>
                <span>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit quam modi! Sint officiis non nisi? Tempore eveniet sint dolores quasi facilis quaerat amet! Tenetur enim ut hic quam cumque.
                </span>
              </li>

               <li class="mt-2 flex flex-wrap">
                  <span class="font-bold w-full">Admin</span>
                  <span>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit quam modi! Sint officiis non nisi? Tempore eveniet sint dolores quasi facilis quaerat amet! Tenetur enim ut hic quam cumque.
                  </span>
                </li>

                <li class="mt-2 flex flex-wrap">
                  <span class="font-bold w-full">User Lain</span>
                  <span>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit quam modi! Sint officiis non nisi? Tempore eveniet sint dolores quasi facilis quaerat amet! Tenetur enim ut hic quam cumque.
                  </span>
                </li>

          </ul>
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

    