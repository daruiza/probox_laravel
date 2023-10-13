<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOption;

interface IOptionQuery
{
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request);
    public function updateById(Request $request, int $id);
    public function showByOptionId(Request $request, int $id);
    public function destroy(int $id);
    public function showByModuleId(Request $request, int $id);
}
