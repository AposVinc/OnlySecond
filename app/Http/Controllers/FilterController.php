<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller{
    //un esempio (che non sto usando) https://www.larashout.com/filtering-eloquent-models-in-laravel
    public function getProducts(Request $request)
    {
        if ($request->has('arrMaterialsChecked') and !$request->arrMaterialsChecked->isEmpty()){
            foreach ($request->arrMaterialsChecked as $material){
                echo $material->name;
            }
        }
    }
/*
arrRatesChecked,
arrGenresChecked,
arrBrandsChecked,
arrCollectionsChecked,
arrCategoriesChecked,
arrColorsChecked,
arrMaterialsChecked
*/
}
