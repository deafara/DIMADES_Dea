<?php
    namespace App\Http\Controller\Admin;

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Http\FormRequest;

    interface ControllerInterface{
        public function index();
        public function create();
        public function store(FormRequest $request);
        public function show($id);
        public function edit($id);
        public function update(FormRequest $request,$id);
        public function destroy($id);
    }
?>