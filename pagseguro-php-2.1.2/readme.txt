Esta � uma biblioteca de integra��o do seu sistema de vendas com o PagSeguro escrita em PHP, ela cont�m:

- Classes de dom�nios que representam pagamentos, notifica��es e transa��es;
- Cria��o de checkouts via API;
- Controller para processar notifica��es de pagamento enviadas pelo PagSeguro;
- M�dulo de consulta de transa��es.


- Instala��o
	Para instalar a biblioteca siga as instru��es abaixo:
	- Descompacte os arquivos em seu computador;
	- Fa�a o upload dos arquivos descompactados para o diret�rio p�blico do seu servidor. Os nomes mais comuns para este diret�rio s�o: htdocs, www ou o mesmo nome do dom�nio de seu website;
	- Importe a biblioteca para o seu sistema fazendo a inclus�o do arquivo PagSeguroLibrary.php encontrado no diret�rio raiz da biblioteca.

	Pronto! A biblioteca PagSeguro em PHP est� instalada.


- Configura��es
	- A biblioteca possui um arquivo de configura��es que deve ser configurado para que se possa fazer real uso da mesma. Esse arquivo chama-se PagSeguroConfig.php e encontra-se em no diret�rio config da biblioteca;
	- Nele s�o configurados:
		- ambiente;
		- credenciais de acesso composta por email e token;
		- Caso ainda n�o possua token, ele pode ser gerado na seguinte url: https://pagseguro.uol.com.br/integracao/token-de-seguranca.jhtml;
		- codifica��o:
			- ISO-8859-1 ou
			- UTF-8.
		- log:
			- ativo ou n�o;
			- diret�rio de gera��o do log das transa��es do sistema com o PagSeguro.

			
* NOTAS
	- As credenciais de acesso devem pertencer a uma conta no PagSeguro que tenha perfil de vendedor ou empresarial;
	- Para que n�o haja problemas com a transa��o de informa��es com o PagSeguro, certifique-se que informou a codifica��o (ISO-8859-1 ou UTF-8) correta do seu sistema ao arquivo de configura��es.

	
Para maiores informa��es, acesse https://pagseguro.uol.com.br/v2/guia-de-integracao/tutorial-da-biblioteca-pagseguro-em-php.html