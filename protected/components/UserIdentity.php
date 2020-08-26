<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private int $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$usrs=User::model()->findAll();
		$user = null;

		foreach($usrs as $usr){
            if($usr->email == $this->username)
                $user = $usr;
        }

		if(!isset($user))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->password!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
            $this->_id = $user->id+0;
            $this->errorCode = self::ERROR_NONE;
        }

		return !$this->errorCode;
	}

	public function getId(){
	    return $this->_id;
    }
}