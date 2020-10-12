<template>
    <div >
       <nuxt-link class="flex bg-theme_primary_light hover:bg-theme_primary_dark p-3 rounded-xl mb-2 flex-wrap" :to="'/masuk-konser/1'">
       <div class="w-1/3">
            <img width="150px" height="150px" src="/il/undraw_transfer_money_rywa.svg" alt="Populer">
       </div>
        <div class="w-2/3 p-3">
            <h1 class="font-bold text-lg lg:text-2xl">
                {{ data.concert.name }}
            </h1>
            <h1 class="font-bold  lg:text-xl text-primary">

                {{ data.concert.start }}
            </h1>
            
           
           
        </div>

        <div class="w-full ">
            <button class=" float-right  text-primary border-2  border-primary px-6 p-1 rounded-full mt-3">
               Lihat Konser
            </button>
            
            <button v-if="data.status == 'Verified'" class="hover:bg-primary_dark border-2 border-primary text-secondary bg-primary px-6 p-1 rounded-full mt-3">
               Verified
            </button>
              <button v-else class="bg-theme_primary_dark border-2 border-primary text-primary px-6 p-1 rounded-full mt-3">
               Pending
            </button>

        </div>
        
       </nuxt-link>

       
    </div>
</template>
<script>
export default {
     props:['data'],
}
</script>