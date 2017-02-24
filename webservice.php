<?php

if(isset($_REQUEST['action'])){
	if ($_REQUEST['action'] == "inserir") {
		$obj = new webservice();
        $obj->insert($_REQUEST['info']);

    }else if($_REQUEST['action'] == "obter"){
    	$obj = new webservice();
    	echo $obj->start($_REQUEST['id']);

    }else if($_REQUEST['action'] == "obterLog"){
    	$obj = new webservice();
    	return $obj->obterLog();
    }
}

class webservice {

	public function start($video){

		if($video == 1){
			$nomeFilme = "Vídeos em câmera lenta";
			$duracaoFilme = "7:45";
			$urlFilme = "video_1.mp4";
			$descricaoFilme = "asdlasldkaj ladksdjlaksdjkl lak jklsjdklajskdla jsdlkj alskdj alksd jalkj lkajsdlk jaslkd jaslkdj lkjlakjsdlkajsdklahfia";
		} else if($video == 2){
			$nomeFilme = "Vídeo de natureza HD";
			$duracaoFilme = "3:21";
			$urlFilme = "video_2.mp4";
			$descricaoFilme = "asdlasldkaj ladksdjlaksdjkl lak jklsjdklajskdla jsdlkj alskdj alksd jalkj lkajsdlk jaslkd jaslkdj lkjlakjsdlkajsdklahfia";
		}

			$arr = array('nome' => $nomeFilme, 'duracao' => $duracaoFilme, 'descricao' => $descricaoFilme, 'video' => $urlFilme);
			return json_encode($arr);
	}

	public function insert($info){
		try{
			$data = date("d/m/Y H:i:s");
			$fp = fopen("log.txt", "a");
			$escreve = fwrite($fp, "[ LOG ".$data." ]".$info."\n");
			fclose($fp);
		}catch(PDOException $e){
			echo $e->getMessage();
		}	
	}
}
?>