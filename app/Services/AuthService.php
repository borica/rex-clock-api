<?php

namespace App\Services;

use App\Exceptions\ApiException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AuthService
{
    private const PASSWORD_GRANT_CLIENT_NAME = 'Laravel Password Grant Client';

    /**
     * @param string $email
     * @param string $password
     * @return string
     * @throws ApiException
     * @throws Throwable
     */
    public function login(string $email, string $password): string
    {
        $user = User::whereEmail($email)->first();

        if ($user) {
            $this->checkCredentials($user, $password);
            return $user->createToken(self::PASSWORD_GRANT_CLIENT_NAME)->accessToken;
        }

        throw new ApiException('User does not exist', Response::HTTP_NOT_FOUND);
    }

    /**
     * @param User $user
     * @param string $password
     * @return void
     * @throws Throwable
     */
    private function checkCredentials(User $user, string $password): void
    {
        throw_if(!(Hash::check($password, $user->password)), new ApiException(
            'Invalid Credentials',
            Response::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}