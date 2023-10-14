<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IOptionQuery
{
    public function index(Request $request);
    public function store(Request $request);
    public function showByOptionId(Request $request, int $id);
    public function update(Request $request, int $id);
    public function destroy(Request $request, int $id);
    public function showOptionByModuleId(Request $request, int $id_module);
}