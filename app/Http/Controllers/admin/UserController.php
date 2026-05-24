<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search', '');
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');
        
        $users = User::select(['id','name','email','phone','created_at'])
                ->when($search, function($query, $search) {
                    $query->where('name','like','%'.$search.'%')
                    ->orWhere('email','like','%'.$search.'%')
                    ->orWhere('phone','like','%'.$search.'%');
                })
                ->where('role','!=','admin')
                ->orderBy($sort,$direction)
                ->paginate($perPage)
                ->withQueryString();

        return Inertia::render('Admin/Users/Index', [
            'users' => $users,
            'filters' => [
                'search' => $search,
                'direction' => $direction,
                'sort' => $sort,
                'perPage' => $perPage,
                'page' => $request->input('page', 1),
            ],
            'can' => [
                'create' => true,
                'edit' => true,
                'delete' => true,

            ]
        ]);
    }

     public function store(AdminStoreRequest $request): RedirectResponse
    {
        $data = $request->only('name', 'email', 'phone', 'password');

        if ($request->hasFile('avatar')) {
            $data['avatar'] = '';
        }

        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'admin';

        User::create($data);
        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully.');
    }
}
