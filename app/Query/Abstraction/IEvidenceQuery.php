<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEvidenceQuery
{
    public function index(Request $request);
    public function store(Request $request);
    public function showById(Request $request, int $id);
    public function update(Request $request, int $id);
    public function destroy(Request $request, int $id);
}