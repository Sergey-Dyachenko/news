<?php


namespace App\Http\Controllers;


use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

interface BaseApiInterface
{
    public function index();
    public function store(Request $request);
    public function destroy($id);
    public function show($id);
    public function update($id, $input);
}
