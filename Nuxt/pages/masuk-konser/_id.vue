<template>
  <div class="w-full pt-16 p-2 mb-20" v-if="konser">
     
        <div class="w-full p-3 flex">

            <img  class="w-20 h-20" :src="konser.thumbnail" alt="Populer">
            
            <div class="px-5">
                   <h1 class="font-bold text-2xl">
                        {{konser.name}}
                    </h1>
                    <h1 class="font-bold  text-xl text-primary">{{tgl(konser.start)}} - {{tgl(konser.end)}}</h1>
            </div>
           
        </div>


        <div v-if="konser_saya">

            <div class="flex flex-wrap py-3">
                 <button class="hover:bg-primary hover:text-secondary text-lg  text-center  border-primary border-2 w-full lg:w-1/2 p-2 rounded-full text-primary mb-2 font-bold"
                 v-for="tiket in konser.cost_concert" :key="tiket.id">
                   {{ tiket.name }}
                    <span class="px-2">{{ tiket.cost  }}</span>
                </button>
            </div>

              <button @click="buatTiket = !buatTiket"  class="bg-primary float-right rounded-full text-secondary p-1 px-4 text-xs">
                Buat Tiket
              </button>
                 <div v-if="buatTiket">
                    
                  <div class="flex p-3 w-full flex-wrap">
                      <label class="w-full font-bold py-2">Nama Tiket</label>
                      <input type="text" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" placeholder="Nama Tiket" v-model="tiket.name">
                  </div>

                  <div class="flex p-3 w-full flex-wrap">
                      <label class="w-full font-bold py-2">Harga Tiket</label>
                      <input type="text" class="bg-theme_primary_light w-full p-3 rounded-lg px-5" placeholder="Nama Tiket" v-model="tiket.cost">
                  </div>
                   <div class="flex p-3 w-full flex-wrap">

                      <button @click="simpan" class="bg-primary w-full p-2  rounded-full font-bold text-xl text-secondary ">
                        Tambahkan Tiket
                      </button>
                   </div>
                 </div>
            <!-- Form -->


            

        </div>

        
            <iframe class="rounded-xl" width="100%" height="315" src="https://www.youtube.com/embed/Q-EkFs_KrDc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            
        <p class="p-4">
             Diskusi:
        </p>
         <ul class="p-3 bg-theme_primary_light rounded-xl">
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
                <li>
                    <div class="flex p-3 w-full flex-wrap">
                        <label class="w-full font-bold py-2">Komentar</label>
                        <input type="text" class="bg-theme_primary w-full p-3 rounded-lg px-5" placeholder="Komentar" >
                    </div>
                </li>

          </ul>

  </div>
</template>

<script>
export default {
  scrollToTop: true,
  layout: 'app',
  created(){
    // Cek Konser
    this.$axios.get(this.$store.state.api+"check-ticket/"+this.$route.params.id)
      .then(res => {
        console.log(res.data.status)
          if(res.data.status == "success"){
            this.getData()
          }else{
            this.$router.push("/tiket-saya")
          }
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
        getData(){
           this.$axios.get(this.$store.state.api+"concert/"+this.$route.params.id)
              .then(res => {
                console.log(res.data)
                this.konser = res.data
                if(this.konser.user_id == this.$store.state.user.id){
                  this.konser_saya = true
                }else{
                  this.konser_saya = false
                }
              })
        },
        simpan(){
          // this.tiket.concert_id = this.konser.id
          this.$axios.post(this.$store.state.api+"cost/"+this.konser.id,this.tiket)
            .then(res => {
              this.getData()
            })
        }
    },
  data(){
    return{
      konser_saya: true,
      konser: '',
      tiket: {},
      buatTiket: false
    }
  }
}
</script>

    