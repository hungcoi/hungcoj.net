<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests;
use App\Models\User;
use Validator;
use Auth;

class UserController extends Controller
{
    protected $userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langPath = 'admin.user.attributes';
        $user =  $this->userRepository->makeModel();

        return view('admin.users.form', compact('user', 'langPath'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $langPath = 'admin.user.attributes';

        return view('admin.users.form', compact('user', 'langPath'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $userData = $request->except('_token', 'password_confirmation');
        try {
            if ($this->userRepository->create($userData)) {
                return redirect()->action('Admin\UserController@index')
                    ->withSuccess(trans('message.user.create_success'));
            }
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }

        return redirect()->back()->withInput()->withError(trans('message.user.create_error'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $userData = $request->except(['_token', 'login_id', 'password_confirmation']);
        try {
            $user->update($userData);

            return redirect()->action('Admin\UserController@index')
                ->withSuccess(trans('message.user.update_success'));
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }

        return redirect()->back()->withInput()->withError(trans('message.user.update_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            if (auth()->user()->id !== $user->id && $user->delete()) {
                return redirect()->action('Admin\UserController@index')
                    ->withSuccess(trans('message.user.delete_success'));
            }
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }

        return redirect()->action('Admin\UserController@index')
            ->withError(trans('message.user.delete_error'));
    }
}
