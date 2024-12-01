<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::whereNotNull('id_staff')->get();
        return view('Admin.Staff.index', compact('staff'));
    }

    public function create()
    {
        return view('Admin.Staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_staff' => 'required|unique:users',
            'password' => 'required|min:8',
            'no_hp' => 'required',
            'jabatan' => 'required',
        ]);

        $staff = User::create([
            'name' => $request->name,
            'id_staff' => $request->id_staff,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('staff.index');
    }

    public function edit($id)
    {
        $staff = User::findOrFail($id);
        return view('Admin.Staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
        ]);

        $staff = User::findOrFail($id);
        $staff->update($request->all());

        return redirect()->route('staff.index');
    }

    public function show()
    {

    }

    public function destroy($id)
    {
        $staff = User::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index');
    }
}
