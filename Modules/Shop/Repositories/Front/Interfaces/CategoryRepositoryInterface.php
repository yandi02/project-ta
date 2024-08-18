<?php
namespace Modules\Shop\Repositories\Front\Interfaces;

interface CategoryRepositoryInterface{
    public function findAll($options = []);
    public function findBySlug($slug);
    public function insertData($request);
    public function updateData($request, $id);
    public function deleteData($request);
}
?>