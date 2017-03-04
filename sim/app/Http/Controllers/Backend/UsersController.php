<?php

namespace Sim\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Sim\Http\Controllers\Controller;
use Sim\Http\Requests;

use Sim\User;

class UsersController extends Controller
{
  protected $users;

  public function __construct(User $users)
  {
    $this->users = $users;

  }

  public function index()
  {
    $users = $this->users->paginate(10);
//dd($users);
    return view('backend.users.index', compact('users'));
  }

  public function create(User $user)
  {
    return view('backend.users.form', compact('user'));
  }

  public function store(Requests\StoreUserRequest $request)
  {

    $this->users->create($request->only('name', 'email', 'password'));
    return redirect(route ('users.index'))->with('status', 'User has been created');
  }

  public function edit($id)
  {
    $user = $this->users->findOrFail($id);
    return view('backend.users.form', compact('user'));
  }

  public function update(Requests\UpdateUserRequest $request, $id)
  {
    $user = $this->users->findOrFail($id);
    $user->fill($request->only('name', 'email', 'password'))->save();
    return redirect(route('users.edit', $user->id))->with('status', 'User has been updated');
  }
  public function confirm(Requests\DeleteUserRequest $request, $id)
  {
    $user = $this->users->findOrFail($id);

    return view('backend.users.confirm', compact('user'));
  }

  public function destroy(Requests\DeleteUserRequest $request, $id)
  {
    $user = $this->users->findOrFail($id);
    $user->delete();

    return redirect(route('users.index'))->with('status', 'User has been deleted');
  }
}
