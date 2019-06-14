<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model {

        //
        protected $fillable = [
            'first_name', 'last_name', 'gender', 'city',
        ];

        /**
         * Get the group that owns the user.
         */
        public function groups() {
            return $this->belongsToMany(Group::class);
        }

    

    }
    