<template>
    <div >
       <nuxt-link class="flex bg-theme_primary_light hover:bg-theme_primary_dark p-3 rounded-xl mb-2" :to="'/konser/'+data.id">
       <div class="w-1/3">
            <img width="150px" height="150px" src="/il/undraw_super_thank_you_obwk.svg" alt="Populer">
       </div>
        <div class="w-2/3 p-3">
            <h1 class="font-bold text-lg lg:text-2xl">Live Konser BTS Full Fight</h1>
            <h1 class="font-bold  lg:text-xl text-primary">4 - 6 November 2020</h1>
            
            <button class="bg-primary hover:bg-primary_dark text-secondary px-6 p-1 rounded-full mt-3">
                Beli Tiket
            </button>
        </div>
       </nuxt-link>
    </div>
</template>
<script>
export default {
    props:['data']
}
</script>