<?php

namespace App\Interfaces;

use App\User;

interface UserRepositoryInterface {

    /**
     * Returns Users list
     *
     * @return mixed
     */
    public function all();

    /**
     * Get the User by id
     *
     * @param int $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new User with the payload.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Updates old User with new User data
     *
     * @param Product $product
     * @param array $data
     * @return mixed
     */
    public function update(User $user, array $data);

    /**
     * Deletes a User field and detaches all relations/groups
     * @param int $id
     * @return boolean
     */
    public function delete($id);
}
