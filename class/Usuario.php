<?php 

	class usuario {

		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;

		public function getIdusuario(){ 

			return $this->idusuario;

		}

		public function setIdusuario($value){

			$this->idusuario = $value;

		}

		public function getDeslogin(){

			return $this->dessenha;

		}

		public function setDeslogin($value){

			$this->deslogin = $value;

		}

		public function getDessenha(){

			return $this->dessenha;

		}

		public function setDessenha($value){

			$this->dessenha = $value;

		}

		public function getDtcadastro(){

			return $this->dtcadastro;

		}

		public function setDtCadastro($value){

			$this->dtcadastro = $value;

		}


		public function loadByID($id){

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(
				":ID"=>$id
			));

			if(isset($results[0])){

				$row = $results[0];

				$this->setIdusuario($row['idUsuario']);
				$this->setDeslogin($row['desLogin']);
				$this->setDessenha($row['desSenha']);
				$this->setDtCadastro(new DateTime($row['dtCadastro']));

			} 

		}

		public function __toString(){

			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:m:s")
			));

		}

	} 

?>