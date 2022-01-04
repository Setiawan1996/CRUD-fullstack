<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProdukModel;

class Produk extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $model      = new ProdukModel();
        $data       = $model->findAll();

        if(!$data)return $this->fail('Data tidak ada');
        return $this->respond($data);    
        }

    /**
     * Return the properties of a resource object
     *  
     * @return mixed
     */
    public function show($id = null)
    {
        $model      = new ProdukModel();
        $data       = $model->find(['id'=>$id]);
        if(!$data)return $this->fail('Data tidak ada');
        return $this->respond($data[0]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
   
    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $json   = $this->request->getJSON();
        $data   = [
                'judul' => $json->judul,
                'harga' => $json->harga
        ];

        $model  = new ProdukModel();
        $produk = $model->insert($data);
        if(!$produk) return $this->fail('Gagal tersimpan', 400);
        return $this->respondCreated($produk);

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {

    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $json   = $this->request->getJSON();
        $data   = [
                'judul' => $json->judul,
                'harga' => $json->harga
        ];

        $model  = new ProdukModel();
        $cekId  = $model->find(['id' =>$id]);
        if(!$cekId) return $this->fail('Data tidak ada', 404);
        $produk = $model->update($id, $data);
        if(!$produk) return $this->fail('Gagal update', 400);
        return $this->respond($produk);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model  = new ProdukModel();
        $cekId  = $model->find(['id' =>$id]);
        if(!$cekId) return $this->fail('Data tidak ada', 404);
        $produk = $model->delete($id);
        if(!$produk) return $this->fail('Gagal update', 400);
        return $this->respondDeleted('Data berhasil dihapus');
    }
}
