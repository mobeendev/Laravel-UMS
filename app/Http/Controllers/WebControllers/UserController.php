<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\GroupRepositoryInterface;

class UserController extends Controller {

    private $userRepo;
    private $groupRepo;

    public function __construct(UserRepositoryInterface $userRepository, GroupRepositoryInterface $groupRepository) {
        $this->userRepo = $userRepository;
        $this->groupRepo = $groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = $this->userRepo->all();

        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $input = $request->all();

        $validator = Validator::make($request->all(), [
                          'first_name' => 'string|required|max:255',
                          'last_name' => 'string|required|max:255',
                          'gender' => 'string',
                          'city' => 'string|max:255',
        ]);

        $user = $this->userRepo->create($input);
        return redirect('/users')->with('success', 'User has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = $this->userRepo->find($id);
        $user->groups()->detach();

        if ($user == null) {
            return redirect('/users')->with('error', 'User not found!');
        }
        $user->delete();
        return redirect('/users')->with('success', 'User deleted successfully.');
    }

    public function addUserToGroup($id) {

        $user = $this->userRepo->find($id);
        $groups = $this->groupRepo->all();
        $data = [
            'user' => $user,
            'groups' => $groups
        ];

        if ($user != null) {

            return view('user.user_group')->with($data);
        }
        return $this->sendError('User not found!');
    }

    public function saveUserToGroup(Request $request) {
        $input = $request->all();

        $user = $this->userRepo->find($input['user_id']);

        if ($this->userRepo->isUserAlreadyInGroup($input['user_id'], $input['group_id'])) {
            return \Redirect::back()->with('error', 'User already in this group. Select other group.');
        }
        $group = $this->groupRepo->find($input['group_id']);
        $user->groups()->attach($group);
        return redirect('/users')->with('success', 'User added to the group successfully.');
    }

}
