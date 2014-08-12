<?PHP
if ($this->faci_account_model->getFaciAccount()) {
	$faciRoles = $this->faci_account_model->getAccountRoles();
	if (in_array(8, $faciRoles) == false)
		$this->load->view("faci_navigation", array('faciRoles' => $faciRoles));
	else
		$this->load->view("student_navigation");
}
else if ($this->student_model->getStudentAccount() != false) {
	$this->load->view("student_navigation");
}
else
	$this->load->view("guest_navigation");
?>