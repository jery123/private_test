<?php

namespace App\Repositories;

use App\Models\Produit;


class ProduitRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app()->make(Produit::class);
    }

    // Tạo produit
    public function storeproduit($data) : Produit
    {
        $produit = $this->model->create($data);

        return $produit;
    }

    // Update produit
    public function updateProduit($data, $produit) : Produit
    {
        $produit->update($data);

        return $produit;
    }

    // Show produit
    public function showProduit($produit_id) : Produit
    {
        return $this->model->findOrFail($produit_id);
    }

    // Destroy produit
    public function destroyProduit($produit) : bool
    {
        $p = $this->model->findOrFail($produit->id);
        
        return $p->delete();
    }
}
