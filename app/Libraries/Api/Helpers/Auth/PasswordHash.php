<?php

namespace App\Libraries\Api\Helpers\Auth;

class PasswordHash
{

    /**
     * Calculate hash for a plain text password.
     *
     * @param string $password Plain text password to be hashed.
     * @param bool $fasthash If true, use a low cost factor when generating the hash
     *                       This is much faster to generate but makes the hash
     *                       less secure. It is used when lots of hashes need to
     *                       be generated quickly.
     * @return string The hashed password.
     * @throws \Exception
     */
    public static function hash_internal_user_password($password, $fasthash = false)
    {

        // Set the cost factor to 4 for fast hashing, otherwise use default cost.
        $options = ($fasthash) ? array('cost' => 4) : array();

        $generatedhash = password_hash($password, PASSWORD_DEFAULT, $options);

        if ($generatedhash === false || $generatedhash === null) {
            throw new \Exception('Failed to generate password hash.');
        }

        return $generatedhash;
    }

    /**
     * Compare password against hash stored in user object to determine if it is valid.
     *
     * If necessary it also updates the stored hash to the current format.
     *
     * @param stdClass $user (Password property may be updated).
     * @param string $password Plain text password.
     * @return bool True if password is valid.
     */
    public static function validate_internal_user_password($user, $password)
    {

        // If hash isn't a legacy (md5) hash, validate using the library function.
        if (!self::password_is_legacy_hash($user->password)) {
            return password_verify($password, $user->password);
        }

        // Otherwise we need to check for a legacy (md5) hash instead. If the hash
        // is valid we can then update it to the new algorithm.

        $sitesalt = '';
        $validated = false;
        if ($user->password === md5($password.$sitesalt)
            or $user->password === md5($password)
            or $user->password === md5(addslashes($password).$sitesalt)
            or $user->password === md5(addslashes($password))) {
            // Note: we are intentionally using the addslashes() here because we
            //       need to accept old password hashes of passwords with magic quotes.
            $validated = true;

        }
        if ($validated) {
            // If the password matches the existing md5 hash, update to the
            // current hash algorithm while we have access to the user's password.
            //update_internal_user_password($user, $password);
        }
        return $validated;
    }

    /**
     * Check a password hash to see if it was hashed using the legacy hash algorithm (md5).
     *
     * @param string $password String to check.
     * @return boolean True if the $password matches the format of an md5 sum.
     */
    private function password_is_legacy_hash($password) {
        return (bool) preg_match('/^[0-9a-f]{32}$/', $password);
    }

}