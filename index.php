<html>
<head>
    <title>Vídeos</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
		<div style="margin-left: 20%; margin-right: 20%;"><br />
		<h2 id="titulo"></h2>
    <video type="video/mp4" id="video" src="" height="480" width="800" controls></video>		
		</div>
    
		<div style="margin-left: 20%; margin-right: 20%;">
			<button onclick="getCurrentTime();">Tempo atual</button>
			<button onclick="duration();">Duração</button>
			<button onclick="loadSpecificTime();">Segundo 3</button>
			<button onclick="getVolume();">Volume</button>
		</div>
		<br />
		<div style="margin-left: 20%; margin-right: 20%;">
			<div id="duracao">Duração: </div> 
			<div id="descricao">Descrição: </div> <br />
			<br /><br /><br />
			<div id="info"></div>
		</div>

    <script type="text/javascript">
	function loadSpecificTime() {
		videos = document.getElementsByTagName("video");
        video = videos[0];
		video.currentTime = 3;
	}
	function getCurrentTime() {
		videos = document.getElementsByTagName("video");
                video = videos[0];
		alert( video.currentTime );
	}
	function duration() {
                videos = document.getElementsByTagName("video");
                video = videos[0];
                alert( video.duration );
    }
    function getVolume() {
		videos = document.getElementsByTagName("video");
        video = videos[0];
		alert( video.volume );
	}
	videos = document.getElementsByTagName("video");
            video = videos[0];
    //Video já exibido...
	video.addEventListener('ended', function() {
		  console.log( "Video exibido com sucesso..." );
		  salvar("Video exibido com sucesso...");
		});
	//Ao clicar no vídeo...
	video.addEventListener('click', function() {
		  console.log( "Video clicado..." );
		  salvar("Video clicado...");
		});
	//Ao parar o vídeo...
	video.addEventListener('pause', function() {
		  console.log( "Video pausado..." );
		  salvar("Video pausado...");
		});
	//Ao iniciar o vídeo...
	video.addEventListener('play', function() {
		  console.log( "Video iniciado..." );
		  salvar("Video iniciado...");
		});
	//Ao mudar o período do video...
	video.addEventListener('seeked', function() {
		  console.log( "Periodo do video modificado..." );
		  salvar("Periodo do video modificado...");
		});
	//Ao mudar o volume do video...
	video.addEventListener('volumechange', function() {
		  console.log( "Volume do video modificado..." );
		  salvar("Volume do video modificado...");
		});

		window.onload = function() {
			var id = "<?php echo $_GET['v']; ?>";
			$.post("webservice.php", {
				action :"obter",
				id : id
			}, function(data) {
				var response = JSON.parse(data);
				$("#titulo").append(response.nome);
				$("#duracao").append(response.duracao);
				$("#descricao").append(response.descricao);
				$("#video").attr("src", "video/"+response.video);
			});
		}

		function salvar(info){
			$.post("webservice.php", {
				action :"inserir",
				info : info
			}, function(data) {
					//==== Fazer algo depois ====
				$("#info").append("[Log salvo] "+info+"<br />");
			});
		}

	

</script>

</body>
</html>