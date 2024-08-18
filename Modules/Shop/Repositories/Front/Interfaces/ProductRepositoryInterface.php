<?php
namespace Modules\Shop\Repositories\Front\Interfaces;

use Illuminate\Http\Request;

interface ProductRepositoryInterface{
    public function findAll($options = []);
    public function findBySKU($sku);
    public function findByID($id);
    public function findUser();
    public function findCategory();
    public function insertData(Request $request);
    public function updateData($request, $id);
    public function deleteData($id);
}
?>