<?php

namespace App\Repositories;

use App\Group;
use App\Interfaces\GroupRepositoryInterface;

class GroupRepository implements GroupRepositoryInterface {

    public function all() {
        return Group::paginate(5);
    }

    public function allGroupsWithUsers() {
        return Group::with('users')->paginate(3);
    }

    public function create(array $data) {
        $group = Group::create($data);

        if (isset($data['users'])) {
            $group->users()->attach($data['users']);
        }
        return $group;
    }

    public function delete($id) {
        
    }

    public function find($id) {
        return Group::find($id);
    }

    public function update(Group $group, array $data) {
        $group->users()->detach();

        $group->update($data);

        if (isset($data['users']) && isset($data['users'])) {
            $group->users()->attach($data['users']);
        }

        return $group;
    }

}
