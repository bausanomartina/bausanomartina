		<?php
		//file necessari ad inviare foto, doc e audio
		require 'class-http-request.php';
		require 'functions.php';
		
		//TokenTelegram
		$api ='TokenTelegram';

		
		
		//prendo quello che mi è arrivato e lo salvo nella variabile content
		$content = file_get_contents("php://input");
		//decodifico quello che mi è arrivato
		$update = json_decode($content, true);
		//se non sono riuscito a decodificarlo mi fermo
		if(!$update)
		{
		  exit;
		}
		//echo "ciao";
        //altrimenti proseguo e vado a leggere il messaggio salvandolo nella variabile 
		//message
		$message = isset($update['message']) ? $update['message'] : "";
		//facciamo la stessa cosa anche per l'id del mess.
		$messageId = isset($message['message_id']) ? $message['message_id'] : "";
		//l'id della chat che servirà al nostro bot per sapere a chi risponder
		$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
		//il nome dell'utente che ha scritto
		$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
		//il cognome
		$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
		//lo username
		$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
		//la data
		$date = isset($message['date']) ? $message['date'] : "";
		//ed il testo del messaggio
		$text = isset($message['text']) ? $message['text'] : "";
        //eliminiamo gli spazi con trim e convertiamo in minuscolo con la funz strtolower
		
		$text = trim($text);
		$text = strtolower($text);
        
		//$text = json_encode($message);
		 //costruiamo la risposta del nostro bot
		 //l'header è sempre uguale ed indica che sarà un messaggio con codifica
		 //JSON
		header("Content-Type: application/json");
		//i parametri sono cosa voglio mandare indietro al mio utente
		$parameters = array('chat_id' => $chatId, "text" => $text);
		
		if($text=="ciao" || $text=="/ciao"){
			$text = "Benvenuto sulla pagina del bot dell'8 marzo";
			$parameters = array('chat_id' => $chatId, "text"=> $text);
		}
		if($text == "foto"){
			$foto[0]="foto.jpg";
			$foto[1]=foto1.jpg"; 
			$foto[2]="foto2.jpg";
			$i= rand(0,2); 
			semdFoto($chatId, "foto.ipg", false, "la mia foto", $api);
		}

		if($text == 'barz || $text=='/barz'){
			$barz[0] = "che cos'è una zebra? un cavallo evaso dal carcere"; 
			$barz[1] =  "colmo truffatore? fare un buco nell'acqua";
			$barz[2] = "chi la fa la vende, chi la compra non la USA, chi la usa non la vede, cos'è???? La tomba.";
			$barz[3] = "qual è il colmpo per un giardiniere? pianta la fidantazata.";

			$i = rand(0,3);

			$paramenters = array('chat_id' => $chatId, "text" => $barz[$i]);
			}
			
	if($text =="audio"){
		sendAudio($chatId, "audio.mp3", false, "file audio" $api);
		}
		
	if($text =="pdf"){
		 sendDocument( $chatId, "test.pdf", false, "un testo in pdf", $api);
		 }
			

		
		
		//aggiungo il comando di invio
		//e lo invio
		
		$parameters["method"] = "sendMessage";
        echo json_encode($parameters);
		
		
		
		
		
		
		?>
		
		
		
		
		
		

		
		
		
