<template>
	<div>
		<h1 class="title">Update Produk</h1>
		<form @submit.prevent="updateProduk">
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
				<button class="button is-primary mt-4">Update</button>
			</div>
			<div>
				
			</div>

		</div>
		</div>
		</form>
	</div>
	
</template>

<script>
import axios from "axios";

	export default{
		name: "EditForm",
		data(){
			return{
				judul: "",
				harga: "",
			};
		},
		created(){
		this.getProdukById();
		},
		methods:{
			async getProdukById(){
				try{
					const response = await axios.get(`http://localhost:8080/produk/${this.$route.params.id}`);
					(this.judul = response.data.judul), (this.harga = response.data.harga);
				} catch (error){
					console.log(error);
				}
			},
			async updateProduk(){
				try{
					await axios.put(`http://localhost:8080/produk/${this.$route.params.id}`,{
						judul: this.judul,
						harga: this.harga,
					});
					(this.judul= ""), (this.harga= ""), this.$router.push("/");
				
				} catch (error){
					console.log(error);
				}
			},
		},

	};
</script>

<style>
	
</style>