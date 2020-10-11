import Vuex from 'vuex'

const createStore = () => {
  return new Vuex.Store({
    state: {
        settings: false,
        theme: localStorage.getItem("theme") || 'theme-light',
        primaryColor: localStorage.getItem("primary-color") || 'primary-purple',
        loading: false,
        menu_tab: '',
        kategori: [
            'Populer',
            'Terbaru',
            'Minggu Ini'
        ]
    },
    mutations: {
        setMenuTab(state,to){
            state.menu_tab = to
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