<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ITaskQuery
{
    public function index(Request $request);
    public function store(Request $request);
    public function showById(Request $request, int $id);
    public function update(Request $request, int $id);
    public function destroy(Request $request, int $id);

    public function showEvidenceById(Request $request, int $id);
    public function showProjectById(Request $request, int $id);
}