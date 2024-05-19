<?php 

/**
 * Addstd class
 */
class Addstd
{
	use Controller;

	public function index()
	{
		$data = [];
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$student = new Student;
			if ($student->validate($_POST)) 
			{
				$student->insert($_POST);
				redirect('home');
			}
			
			$data['errors'] = $student->errors;
		}

		$this->view('addstd', $data);
	}

}
