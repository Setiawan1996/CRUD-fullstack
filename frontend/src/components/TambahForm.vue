<template>
	<div>
		<h1 class="title">Tambah Produk</h1>
		<form @submit.prevent="saveProduk">
		<div class="field">
			<label class="label">Produk</label>
			<div class="control">
				<input type="text" v-model="judul" class="input" placeholder="Produk"/>
			</div>
		</div>
		<div class="field">
			<label class="label">Harga</label>
			<div class="control">
				<input type="text" v-model="harga" class="input" placeholder="Harga"/>
			</div>
			<div class="field">
			<div class="control">
				<button class="button is-primary mt-4">Simpan</button>
			</div>
		</div>
		</div>
		</form>
	</div>
</template>

<script>
import axios from "axios";
export default{
	name:"TambahForm",
	data(){
		return {
			judul: '',
			harga: ''
		}
	},
	methods: {
		async saveProduk(){
			try{
			await axios.post('http://localhost:8080/produk',{
				judul: this.judul,
				harga: this.harga
			});
			(this.judul = ''),
			(this.harga  = ''),

			this.$router.push('/');
			}catch (error){
			console.log(error);
			}

		},
	},
};	
</script>

<style>
	
</style>