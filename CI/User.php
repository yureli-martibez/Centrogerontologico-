<?php
class Cl_User
{
	/**
	 * @var va a contener la conexión de base de datos
	 */
	protected $_con;
	
	/**
	 * Inializar DBclass
	 */
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}
	
	/**
	 * Registro de usuarios
	 * @param array $data
	  */
	public function registration( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			
			
			// escapar de las variables para la seguridad
			$name = mysqli_real_escape_string( $this->_con, $trimmed_data['nombre'] );
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = mysqli_real_escape_string( $this->_con, $trimmed_data['conf_password'] );
			$apellido = mysqli_real_escape_string( $this->_con, $trimmed_data['apellido'] );
			$telefono = mysqli_real_escape_string( $this->_con, $trimmed_data['telefono'] );
			
			
			// Verifica la direccion de correo electrónico:
			if (filter_var( $trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
				$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email']);
			} else {
				throw new Exception( "Por favor, introduce una dirección de correo electrónico válida!" );
			}
			
			
			if((!$name) || (!$apellido)|| (!$email) || (!$telefono) || (!$password) || (!$cpassword)  ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "INSERT INTO cliente (id_usuario, Nombre, Apellido, Correo, Contraseña, Telefono ) VALUES (NULL, '$name', '$apellido', '$email', '$password', '$telefono' )";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}
	/**
	 * Este metodo para iniciar sesión
	 * @param array $data
	 * @return retorna falso o verdadero
	 */
	public function login( array $data )
	{
		$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad
			$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
			$password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
				
			if((!$email) || (!$password) ) {
				throw new Exception( LOGIN_FIELDS_MISSING );
			}
			$password = md5( $password );
			$query = "SELECT id_usuario, Nombre, Apellido, Correo, Contraseña FROM cliente where Correo = '$email' and Contraseña = '$password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if( $count == 1){
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				return true;
			}else{
				throw new Exception( LOGIN_FAIL );
			}
		} else{
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
	}
	
	/**
	 * El siguiente metodo para verificar los datos de la cuenta para el cambio de contraseña
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	
	public function account( array $data )
	{
		if( !empty( $data ) ){
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = $trimmed_data['conf_password'];
			$user_id = mysqli_real_escape_string( $this->_con, $trimmed_data['id_usuario'] );
			
			if((!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "UPDATE cliente SET Contraseña = '$password' WHERE id_usuario = '$user_id'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	
	/**
	 * Este metodo para cerrar las sesión
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: login.php');
	}
	
	/**
	 * Esto restablece la contraseña actual y la nueva contraseña para enviar correo
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	public function forgetPassword( array $data )
	{
		if( !empty( $data ) ){
			
			// escapar de las variables para la seguridad
			$email = mysqli_real_escape_string( $this->_con, trim( $data['email'] ) );
			
			if((!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$password = $this->randomPassword();
			$password1 = md5( $password );
			$query = "UPDATE cliente SET Contraseña = '$password1' WHERE Correo = '$email'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$to = $email;
				$subject = "Nueva solicitud de contraseña";
				$txt = "Su nueva contraseña ".$password;
					
				mail($to,$subject,$txt,$headers);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	
	/**
	 * Esto generará una contraseña aleatoria
	 * @return string
	 */
	
	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //recuerde que debe declarar $pass como un array
		$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //convertir el array en una cadena
	}
}