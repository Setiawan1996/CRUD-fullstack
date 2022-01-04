import Vue from 'vue'
import VueRouter from 'vue-router'
import ProdukList from '../views/ProdukList.vue'
import TambahProduk from '../views/TambahProduk.vue'
import EditProduk from '../views/EditProduk.vue'



Vue.use(VueRouter)

const routes = [
 

  {
    path: '/',
    name: 'ProdukList',
    component: ProdukList
  },
  {
    path: '/Tambah',
    name: 'TambahProduk',
    component: TambahProduk
  },
  {
    path: '/Edit/:id',
    name: 'EditProduk',
    component: EditProduk
  },
 
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
