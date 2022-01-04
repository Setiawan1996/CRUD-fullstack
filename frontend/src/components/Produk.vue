<template>
	<div class="table-container">
        
        <h1 class="title">Produk</h1>
        <router-link :to="{ name: 'TambahProduk' }" class="button is-success">Tambah Produk</router-link>  
  <table class="table is-striped is-fullwidth">
    <thead>
    	<tr>
    		<th>Judul</th>
    		<th>Harga</th>
    		<th>Aksi</th>
    	</tr>
    </thead>
    <tbody>
    	<tr v-for="produk in produks" :key="produk.id">
    		<td>{{ produk.judul }}</td>
    		<td>Rp.{{ produk.harga }}</td>
    		<td>
                 <router-link :to="{ name: 'EditProduk',params: { id:produk.id } }" class="button is-info is-small  mr-2">Update</router-link>

                 <button class="button is-danger is-small" @click="deleteProduk(produk.id)">Hapus</button></td>
    	</tr>

    </tbody>

  </table>
 
</div>
</template>

<script>
import axios from "axios";

	export default
	{
		name: "produk",
        data(){
            return{
                produks:[],
            };
        },
        created(){
            this.getProduks();
        },
        methods:{
            async getProduks(){
                try{
                   const response = await axios.get("http://localhost:8080/produk");
                   this.produks = response.data;
                }catch (error){
                    console.log(error);
                }
            },
            async deleteProduk(id){
                try{
                   await axios.delete(`http://localhost:8080/produk/${id}`);
                    this.getProduks();     
                }catch (error){
                    console.log(error);
                }
            },
        },
	};
</script>

<style>
	
</style>