export default function ({ store, redirect }) {
    // Jika user terautentikasi
    if (store.state.auth) {
      return redirect('/')
    }
  }