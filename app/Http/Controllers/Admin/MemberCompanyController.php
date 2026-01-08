<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MemberCompany;
use Illuminate\Http\Request;

class MemberCompanyController extends Controller
{
    public function index()
    {
        $memberCompanies = MemberCompany::orderBy('name')->paginate(10);
return view('admin.member-companies.index', compact('memberCompanies'));
      
    }

    public function create()
    {
        return view('admin.member-companies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string|max:10',
            'members' => 'required|integer|min:0',
            'industry' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
            'animation' => 'nullable|string|max:50',
        ]);

        MemberCompany::create($data);

        return redirect()->route('admin.member-companies.index')->with('success', 'Company added successfully');
    }

    public function edit(MemberCompany $memberCompany)
    {
        return view('admin.member-companies.edit', compact('memberCompany'));
    }

    public function update(Request $request, MemberCompany $memberCompany)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string|max:10',
            'members' => 'required|integer|min:0',
            'industry' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
            'animation' => 'nullable|string|max:50',
        ]);

        $memberCompany->update($data);

        return redirect()->route('admin.member-companies.index')->with('success', 'Company updated successfully');
    }

    public function destroy(MemberCompany $memberCompany)
    {
        $memberCompany->delete();
        return redirect()->route('admin.member-companies.index')->with('success', 'Company deleted successfully');
    }
}
