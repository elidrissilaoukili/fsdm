<?php 


/**
 * Student class
 */
class Student
{
	
	use Model;

	protected $table = 'students';

	protected $allowedColumns = [

		'first_name',
		'last_name',
		'code',
		'note',
		'mention',
		'sector',
		'email',
		'password'
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['email']))
		{
			$this->errors['email'] = "Email is required";
		}else
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}
		
		if(empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}
		
		if(empty($data['first_name']))
		{
			$this->errors['first_name'] = "first name is required";
		}

		if(empty($data['last_name']))
		{
			$this->errors['last_name'] = "last name is required";
		}

		if(empty($data['code']))
		{
			$this->errors['code'] = "code is required";
		}

		if(empty($data['note']))
		{
			$this->errors['note'] = "note is required";
		}

		if(empty($data['mention']))
		{
			$this->errors['mention'] = "mention is required";
		}

		if(empty($data['sector']))
		{
			$this->errors['sector'] = "sector is required";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}


