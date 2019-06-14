<?php

namespace App\Interfaces;

use App\Group;

interface GroupRepositoryInterface {

    /**
     * Returns Group list
     *
     * @return mixed
     */
    public function all();

    /**
     * Get the Group by id
     *
     * @param int $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new Group with the payload.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Updates old Group with new Group data
     *
     * @param Group $group
     * @param array $data
     * @return mixed
     */
    public function update(Group $group, array $data);

    /**
     * Deletes a Group field and detaches all relations
     * @param int $id
     * @return boolean
     */
    public function delete($id);

    /**
     * Returns Groups with all relations/users that are related to the given Group
     *
     * @return mixed
     */
    public function allGroupsWithUsers();
}
