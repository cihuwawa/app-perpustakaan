<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Sawwadatul Husnawati',
            'nim' => '3125500049',
            'email' => 'wawawiwawawa@it.student.pens.ac.id',
            'nomor_telepon' => '085895184838',
            'status' => 'aktif'
        ],

        [
            'id' => 2,
            'nama' => 'Sawa suka kucing',
            'nim' => '2310501002',
            'email' => 'kucing@it.student.pens.ac.id',
            'nomor_telepon' => '081298765432',
            'status' => 'aktif'
        ],

        [
            'id' => 3,
            'nama' => 'Wawa cukurukuk',
            'nim' => '2310501003',
            'email' => 'cukurukuk@pens.ac.id',
            'nomor_telepon' => '081211122233',
            'status' => 'nonaktif'
        ],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return 'MemberController@create';
    }

    public function store(Request $request)
    {
        return 'MemberController@store';
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}