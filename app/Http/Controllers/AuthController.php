<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use JWTAuth;
use Validator;
use Response;

class AuthController extends BaseController {

    public function __construct() {
        $this->user = new Admin;
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|string|email|max:255|unique:admins',
                    'name' => 'required',
                    'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Errors', $validator->messages());
        }
        Admin::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $user = Admin::first();
        $token = JWTAuth::fromUser($user);

//        return Response::json(compact('token'));
        return response()->json(['success' => true,
                    'message' => 'Registered successfully.',
                    'token' => $token]);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);

        if ($validator->fails()) {
            return $this->sendError('Validation Errors', $validator->messages());
        }

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true,
                    'message' => 'Logged in successfully.',
                    'token' => $token]);
    }

    public function user(Request $request) {

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_blacklisted ddd'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_expired dddssssss'], 401);
        }
        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function logout() {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
                ], 200);
    }

}
