<?php

    namespace App\Repositories;
    
    use DB;
    use App\User;
    use App\Interfaces\UserRepositoryInterface;

    class UserRepository implements UserRepositoryInterface {

        public function all() {
            return User::paginate(5);
        }

        public function find($id) {
            return User::find($id);
        }

        public function create(array $data) {

            $user = User::create($data);

            return $user;
        }

        public function update(User $user, array $data) {

            $user->update($data);

            return $user;
        }

        public function delete($id) {
            
        }

        public function attachUserToGroup($data) {
            $group = null;
            if (isset($data['users']) && isset($data['users'])) {
                $group = App\Group::find(1);
                $group->products()->attach($data['productss']);
            }
            return $group;
        }

        public function userWithGroups($id) {
            return User::with('groups')->where('id', $id)->get()->first()->toArray();
        }
        
        public function allUserWithGroups() {
            return User::with('groups')->paginate(5);
        }

        /**
         * Determine if a User is attach to specific Group already
         * @param $user_id
         * @param $group_id
         * @return bool
         */
        public function isUserAlreadyInGroup($user_id, $group_id) {
            return 
                                        DB::table('group_user')
                                                      ->where('user_id', $user_id)
                                                      ->where('group_id', $group_id)
                                                      ->first();
            
        }

    }
    