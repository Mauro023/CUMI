<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UsersRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Spatie\Permission\Models\Role;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $usersRepository;
    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }
    public function index(Request $request)
    {
        $users = $this->usersRepository->paginate(10);

        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;

        $roles = Role::with('permissions')->get();

        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->only('name', 'email')
                    + [
                        'password' => bcrypt($request->input('password')),
                    ];

        $user = User::create($input);

        if($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }        

        session()->flash('success', 'El usuario ha sido creado');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::with('permissions')->get();
        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::with('permissions')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $data = $request->only('name', 'email');
        $password = $request->input('password');
        if($password)
        {
            $data['password'] = bcrypt($password);
        }

        $user->update($data);

        session()->flash('success', 'Usuario actualizado');

        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();

        session()->flash('success', 'Usuario eliminado');

        return redirect()->route('admin.users.index');
    }
}
