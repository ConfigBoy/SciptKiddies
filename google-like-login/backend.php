<?php
session_start();
$user = array (

				array(
						'username'	=> 'amin',
						'email' 	=> 'gmail@amin.com',
						'password'	=> md5('bangamin'),
						'image'		=> 'images/amin.png'
					),
				array(
						'username'	=> 'gajah',
						'email' 	=> 'gajah@amin.com',
						'password'	=> md5('gajahnyaamin'),
						'image'		=> 'images/gajah.jpg'
					)
			);

if (isset($_POST['login'])) {

	if (isset($_POST['user'])) {
		foreach ($user as $key => $value) {
			# code...
			if($value['username'] ==$_POST['user'] OR $value['email'] ==$_POST['user']){
				$_SESSION['user'] = $value['username'];
				$_SESSION['email'] = $value['email'];
				$_SESSION['image'] = $value['image'];
				$data = json_encode(array('response'=>'success', 'user'=>array('email'=>$value['email'], 'image'=>$value['image']) ));
				break;
			}
			
		}
		if(isset($data)) {
			echo $data;
		}
		else{
			echo json_encode(array('response'=>'error', 'message'=>'User Not Found'));
		}

	}
	else if (isset($_POST['password'])) {
		foreach ($user as $key => $value) {
			# code...
			if($value['username'] == $_SESSION['user']){
				if ( $value['password'] === md5($_POST['password']) ){
					$_SESSION['loggedin'] = true;
					
					$data = json_encode(array('response'=>'success', 'user'=>array('email'=>$value['email'], 'image'=>$value['image']) ));
				}

			}
			
		}
		if(isset($data)) {
			echo $data;
		}
		else{
			echo json_encode(array('response'=>'error', 'message'=>'Password you entered didn\'t match'));
		}


	}
}