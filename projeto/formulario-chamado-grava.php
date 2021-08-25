<?php
require_once 'conexao.php';

$opcao = $_GET['opcao'];
$tipo = 1;

switch ($opcao) {
	case 'EXC':
		$id_correspondencia = $_GET["id"];
		$stmt = $pdo->prepare('DELETE FROM correspondencia WHERE id_correspondencia = :id_correspondencia');
		$stmt->bindParam(':id_correspondencia', $id_correspondencia);
		$stmt->execute();
	header("Location:cadastro.php?cad=2");		
	break;

	case 'ALT':
		$id_correspondencia = $_POST['id_correspondencia'];
		$empresa = $_POST['empresa'];
		$destinatario = $_POST['destinatario'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$cep = $_POST['cep'];
		$logradouro = $_POST['logradouro'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$responsavel = $_POST['responsavel'];
		$tipo_carta = $_POST['tipo_carta'];
		$ar = $_POST['ar'];
		$date = DateTime::createFromFormat('d/m/Y', $_POST['data_envio']);
		$data_envio = $date->format('Y-m-d');
		$rastreio = $_POST['rastreio'];
		$usuario = $_POST['usuario'];

		$sql = 'UPDATE correspondencia SET
								empresa = :empresa,
								destinatario = :destinatario,
								cidade = :cidade,
								estado = :estado,
								cep = :cep,
								logradouro = :logradouro,
								numero = :numero,
								complemento = :complemento,
								responsavel = :responsavel,
								tipo_carta = :tipo_carta,
								ar = :ar,
								data_envio = :data_envio,
								rastreio = :rastreio,
								usuario = :usuario,
								date_update = now()
				WHERE id_correspondencia = :id_correspondencia
				';

		$statement = $pdo->prepare($sql);

		$statement->execute([
			// ':id_correspondencia' => $id_correspondencia,
			':empresa' => $empresa,
			':destinatario' => $destinatario,
			':cidade' => $cidade,
			':estado' => $estado,
			':cep' => $cep,
			':logradouro' => $logradouro,
			':numero' => $numero,
			':complemento' => $complemento,
			':responsavel' => $responsavel,
			':tipo_carta' => $tipo_carta,
			':ar' => $ar,
			':data_envio' => $data_envio,
			':rastreio' => $rastreio,
			':usuario' => $usuario,
			':id_correspondencia' => $id_correspondencia
		]);
		header("Location:altera_cadastro.php?id=$id_correspondencia&ALT=1");	
	break;

	default:
		$id_correspondencia = $_POST['id_correspondencia'];
		$empresa = $_POST['empresa'];
		$destinatario = $_POST['destinatario'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$cep = $_POST['cep'];
		$logradouro = $_POST['logradouro'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$responsavel = $_POST['responsavel'];
		$tipo_carta = $_POST['tipo_carta'];
		$ar = $_POST['ar'];
		$date = DateTime::createFromFormat('d/m/Y', $_POST['data_envio']);
		$data_envio = $date->format('Y-m-d');
		$rastreio = $_POST['rastreio'];
		$usuario = $_POST['usuario'];

		$sql = 'INSERT INTO correspondencia(
								empresa,
								destinatario,
								cidade,
								estado,
								cep,
								logradouro,
								numero,
								complemento,
								responsavel,
								tipo_carta,
								ar,
								data_envio,
								rastreio,
								usuario
							)VALUES(
								:empresa,
								:destinatario,
								:cidade,
								:estado,
								:cep,
								:logradouro,
								:numero,
								:complemento,
								:responsavel,
								:tipo_carta,
								:ar,
								:data_envio,
								:rastreio,
								:usuario
							)';

		$statement = $pdo->prepare($sql);

		$statement->execute([
			// ':id_correspondencia' => $id_correspondencia,
			':empresa' => $empresa,
			':destinatario' => $destinatario,
			':cidade' => $cidade,
			':estado' => $estado,
			':cep' => $cep,
			':logradouro' => $logradouro,
			':numero' => $numero,
			':complemento' => $complemento,
			':responsavel' => $responsavel,
			':tipo_carta' => $tipo_carta,
			':ar' => $ar,
			':data_envio' => $data_envio,
			':rastreio' => $rastreio,
			':usuario' => $usuario
		]);
	header("Location:cadastro.php?cad=1");
	break;
}
?>