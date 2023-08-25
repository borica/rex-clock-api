<?php

namespace App\Services;

use App\Dto\CompanyDto;
use App\Dto\SessionDto;
use App\Dto\UserDto;
use App\Exceptions\ApiException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AuthService
{
    private const PASSWORD_GRANT_CLIENT_NAME = 'Laravel Password Grant Client';

    /**
     * @param string $email
     * @param string $password
     * @return array
     * @throws ApiException
     * @throws Throwable
     */
    public function login(string $email, string $password): array
    {
        $user = User::whereEmail($email)
            ->with(['companies'])
            ->first();

        if ($user) {
            $this->checkCredentials($user, $password);

            return [
                "token" => $user->createToken(self::PASSWORD_GRANT_CLIENT_NAME)->accessToken,
                "session" => $this->buildSession($user)
            ];
        }

        throw new ApiException('User does not exist', Response::HTTP_NOT_FOUND);
    }

    /**
     * @param User $user
     * @return SessionDto
     */
    private function buildSession(User $user): SessionDto
    {
        return new SessionDto(
            new UserDto(user: $user->toArray()),
            new CompanyDto(company: $user->toArray()['companies'][0] ?? [])
        );
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