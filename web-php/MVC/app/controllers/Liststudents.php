<?php 

/**
 * Liststudents class
 */
class Liststudents
{
	use Controller;

	public function index()
	{
		$student = new Student;
		$data['students'] = $student->findAll();
		
		$this->view('liststudents', $data);
	}

}
