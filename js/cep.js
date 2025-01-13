// JavaScript Document

function ProcuraCep(cep){
	cep = $.trim(cep); 
	if($.trim(cep) != ""){
		cep = TratarCep(cep);
		if(cep.length == 9){
			$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+cep, function(){
				if(resultadoCEP["resultado"] == 1){		
					$("#endereco").val($.trim(unescape(resultadoCEP["tipo_logradouro"])) + " " + unescape(resultadoCEP["logradouro"]));
					$("#bairro").val(unescape(resultadoCEP["bairro"]));				
					$("#cidade").val(unescape(resultadoCEP["cidade"]));
					$("#estado").val(unescape(resultadoCEP["uf"]));
					$("#numero").focus();
				}
				else{
					$("#endereco").val('');
					$("#bairro").val('');				
					$("#cidade").val('');
					$("#estado").val('');
				}
			});	
		}				
	}
}

function TratarCep(cep){
	for(var i = 0; i < cep.length; i++){
		cep = cep.replace('_', '');
	}
	return cep;
}
