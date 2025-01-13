<?php
class Upload{ 
	private $file;
	private $filename;
	private $largura;
	private $altura; 
	private $serverDir;
	
	function __construct($file, $filename, $largura, $altura, $serverDir){
		$this->file 		= $file;
		$this->filename 	= $filename; // nome da foto criptografada
		$this->largura 		= $largura; // largura maxima
		$this->altura 		= $altura; // altura maxima
		$this->serverDir 	= $serverDir; // caminho absoluto servidor
	} 
	
    private function getExtensao(){
        //retorna a extensao da imagem
        $explode = explode('.', $this->filename);
        return $extensao = strtolower(end($explode));
    }

    private function ehImagem($extensao){
		$extensoes = array('gif', 'jpeg', 'jpg', 'png');	 
		// extensoes permitidas 
		if (in_array($extensao, $extensoes)) return true;	 
	} 
	
	//largura, altura, tipo, localizacao da imagem original 
	private function redimensionar($imgLarg, $imgAlt, $tipo, $destino){
		//descobrir novo tamanho sem perder a proporcao 
		if ( $imgLarg > $imgAlt ){ 
			$novaLarg = $this->largura; 
			$novaAlt = round( ($novaLarg / $imgLarg) * $imgAlt ); 
		} elseif ( $imgAlt > $imgLarg ){ 
			$novaAlt = $this->altura; 
			$novaLarg = round( ($novaAlt / $imgAlt) * $imgLarg ); 
		} else
			// altura == largura 
			$novaAlt = $novaLarg = max($this->largura, $this->altura); 
		
		//redimensionar a imagem 
		//cria uma nova imagem com o novo tamanho	 
		$novaimagem = imagecreatetruecolor($novaLarg, $novaAlt);

        $origem = "";
			
		switch ($tipo){ 
			case 1:	// gif 
				$origem = imagecreatefromgif($destino);
				imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $novaLarg, $novaAlt, $imgLarg, $imgAlt); 
				imagegif($novaimagem, $destino);
				break; 
			case 2:	// jpg 
				$origem = imagecreatefromjpeg($destino);
				imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $novaLarg, $novaAlt, $imgLarg, $imgAlt); 
				imagejpeg($novaimagem, $destino);
				break; 
			case 3:	// png 
				$origem = imagecreatefrompng($destino);
				imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $novaLarg, $novaAlt, $imgLarg, $imgAlt); 
				imagepng($novaimagem, $destino);
				break; 
		} 
		//destroi as imagens criadas 
		imagedestroy($novaimagem);
		imagedestroy($origem);
	} 
			
	public function salvar(){	 
		$extensao = $this->getExtensao(); 
		//localizacao do file
		$destino = $this->serverDir ."/". $this->filename;
		//move o file
        move_uploaded_file($this->file, $destino);

		if ($this->ehImagem($extensao)){	 
			//pega a largura, altura, tipo da imagem
			list($largura, $altura, $tipo) = getimagesize($destino);
			// testa se é preciso redimensionar a imagem 
			// se largura da imagem for maior que largura maxima ou
			// altura da imagem for maior que altura maxima
			// redimensiona
			if(($largura > $this->largura) || ($altura > $this->altura))
				$this->redimensionar($largura, $altura, $tipo, $destino);
		} 	
		return $this->filename;
	}	 
} 
?>