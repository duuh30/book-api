<?php

namespace App\Interfaces;

interface BaseServiceInterface {

    public function model();
    public function getModel();
    public function store($data = []);
    public function all();
    public function destroy($id);
    public function findById($id);
    public function update($id, $data = []);
}
