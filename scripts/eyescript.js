function viewPass()
{
	var pass_in = document.getElementById('pass');
	var pass_stat = document.getElementById('pass-status');
	if (pass_in.type == 'password'){
		pass_in.type='text';
		pass_stat.className='fa fa-eye-slash fa-lg';
	}
	else{
		pass_in.type='password';
		pass_stat.className='fa fa-eye fa-lg';
	}
}