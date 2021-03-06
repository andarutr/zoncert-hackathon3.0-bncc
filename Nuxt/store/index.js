import Vuex from 'vuex'

const createStore = () => {
  return new Vuex.Store({
    state: {
        auth: localStorage.getItem("auth") || false,
        access_token: localStorage.getItem("access_token") || '',
        user: JSON.parse(localStorage.getItem("user")) || '',
        api: 'http://localhost:8000/api/',
        settings: false,
        theme: localStorage.getItem("theme") || 'theme-light',
        primaryColor: localStorage.getItem("primary-color") || 'primary-orange',
        loading: false,
        kategori: [],
        jenis_konser: [],
        konser_saya: ''
    },
    mutations: {
        like(state,data){
            this.$axios.$get(state.api+'like/'+data)
                .then(res => {
                    console.log(res)
                })
        },
        setKonserSaya(state,data){
            state.konser_saya = data
        },
        setKategori(state,data){
            state.kategori = data
        },
        setJenisKonser(state,data){
            state.jenis_konser = data
        },
        setUserData(state,data){
            
            localStorage.setItem("user",JSON.stringify(data))
            state.user = data
            localStorage.setItem("auth",true)
            state.auth = true
        },
        logout(state){
            this.$axios.$post(state.api+'logout')
            .then(res => {
                console.log("Success Logout")
            });

            localStorage.clear()
            state.auth = false
            state.access_token =  ""
            this.$axios.setHeader('Authorization', '')
            this.$router.push("/login")
          
        },
        login(state,data){
            state.loading = true
            //    Login
                 this.$axios.$post(state.api+'login',data)
                    .then(res => {
                        // console.log(res.user)
                        if(res.user){
                            localStorage.setItem("auth",true)
                            localStorage.setItem("user",JSON.stringify(res.user))
                            localStorage.setItem("access_token",res.access_token)
                            this.$axios.setHeader('Authorization', 'Bearer '+res.access_token)
                            state.auth =  true
                            state.access_token =  res.access_token
                            state.user =  res.user
                            this.$router.push("/profil")
                        }else{
                            this.$toast.error("Username / password salah ",{
                                closeOnSwipe: true,
                                duration : 3000
                              })
                        }   
                       
                    }).catch(res => {
                        this.$toast.error("Username / password salah ",{
                            closeOnSwipe: true,
                            duration : 3000
                          })
                    })

        },

        register(state,data){
            state.loading = true
            //   Register
                 this.$axios.$post(state.api+'register',data)
                    .then(res => {
                        localStorage.setItem("auth",true)
                        localStorage.setItem("user",JSON.stringify(res.user))
                        localStorage.setItem("access_token",res.access_token)
                        this.$axios.setHeader('Authorization', 'Bearer '+res.access_token)
                        state.auth =  true
                        state.user =  res.user
                        state.access_token =  res.access_token
                        this.$router.push("/profil")

                    }).catch(res => {
                        this.$toast.error("Email terdaftar, gunakan email lain ",{
                            closeOnSwipe: true,
                            duration : 3000
                          })
                    })

        },
        loading(state,to){
            state.loading = to
        },
        setTheme(state, to) {
            state.theme = to
            localStorage.setItem("theme", to)
        },
        setPrimaryColor(state,to){
            state.primaryColor = to
            localStorage.setItem("primary-color", to)
        },
        toggleSetting(state,to){
            if(state.settings){
                state.settings = false
            }else{
                state.settings = true
            }
        },
        
    },
  })
}

export default createStore