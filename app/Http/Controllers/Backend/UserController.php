<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\SendEmail;
use App\Src\User\UserRepository;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Core\PrimaryController;

class UserController extends PrimaryController
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->model->all();
        return view('backend.modules.user.index', compact(
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ('working fine from the create method');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Backend\UserStore $request, $id)
    {

    }

    /**
     * Description : Edit Profile Page for a user
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);

        return 'show user working';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = User::whereId($id)->first();
        return view('backend.modules.user.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\Backend\UserUpdate $request, $id)
    {
        $element = User::whereId($id)->first();
        if ($request->has('password')) {
            $element->password = bcrypt($request->password);
        }
        $element->email = $request->email;
        $element->save();

        return redirect()->route('backend.user.index')->with('success', 'user updated');
    }

    /**
     * Suspend/Activate User
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function suspendStatus($id)
    {
        if ($this->userRepository->getById($id)->active) {
            $this->userRepository->getById($id)->update(['active' => 0]);
            return redirect()->back()->with('success', trans('messages.success.user-status-suspended'));
        } else {
            $this->userRepository->getById($id)->update(['active' => 1]);
            return redirect()->back()->with('success', trans('messages.success.user-status-activated'));
        }

        return redirect()->back()->with('error', 'System Error!!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
         * IMPORTANT : NOTE THAT BY DELETING A USER
         * A COMPANY WILL BE DELETED
         * ALL BRANCHES FOR THIS COMPANY SHALL BE DELETED
         * ALL PRODUCTS FOR THIS USER SHALL BE DLEETED
         * */
        $user = $this->userRepository->getById($id);

        if ($user->orders) {
            $user->orders()->delete();
        }

        $user->delete();

        return redirect()->back()->with('success', trans('messages.success.user-delete'));
    }

}
