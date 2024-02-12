<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IProjectTagQuery
{
    public function store(Request $request);
    public function showTagsByProjectId(Request $request, int $id);
    public function destroy(Request $request, int $id);
    public function showProjectTagById(Request $request, int $id);
}