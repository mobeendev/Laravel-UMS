<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\GroupRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller {

    private $userRepo;
    private $groupRepo;

    public function __construct(GroupRepositoryInterface $groupRepository, UserRepositoryInterface $userRepository) {
        $this->groupRepo = $groupRepository;
        $this->userRepo = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $groups = $this->groupRepo->all();

        return view('group.index')->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('group  .create');
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
                          'name' => 'string|required|max:255'
        ]);

        $group = $this->groupRepo->create($input);
        return redirect('/groups')->with('success', 'Group has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $group = $this->groupRepo->find($id);

        return view('group.show')->with('group', $group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $group = $this->groupRepo->find($id);

        if ($group->users->count() > 0) {
            return \Redirect::back()->with('error', 'The group is not empty.');
        }

        $group->delete();
        return redirect('/groups')->with('success', 'Group removed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function remove_user($user_id, $group_id) {

        $group = $this->groupRepo->find($group_id);
        $user = $this->userRepo->find($user_id);

        $user->groups()->detach($group);
        return \Redirect::back()->with('success', 'User removed from group successfully.');
    }

}
