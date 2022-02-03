<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'firtsname' => ['required', 'string', 'max:200'],
            'lastname' => ['required', 'string', 'max:200'],
            'username' => ['required', 'string', 'max:30', Rule::unique('users')->ignore($user->id)],
            'code' => ['required', 'string', 'max:4'],
            'phone' => ['required', 'integer', Rule::unique('users')->ignore($user->id)],
            'email'    => ['required', 'string', 'email', 'max:200', Rule::unique('users')->ignore($user->id)],
            'address' => ['required', 'string', 'max:250'],
            'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'firtsname' => $input['firtsname'],
                'lastname' => $input['lastname'],
                'username' => $input['username'],
                'code' => $input['code'],
                'phone' => $input['phone'],
                'email' => $input['email'],
                'address' => $input['address'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'firtsname' => $input['firtsname'],
            'lastname' => $input['lastname'],
            'username' => $input['username'],
            'code' => $input['code'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'address' => $input['address'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
