<?php 

return [
	'buttons' => [
		'add' => 'Adicionar fornecedor',
		'edit' => 'Editar',
		'delete' => 'Deletar',
		'save' => 'Salvar',
		'cancel' => 'Cancelar',
	],
	'model' =>[
		'title' => 'Fornecedores',
		'provider' => 'Fornecedor',
		'amount' => 'Quantidade',
		'price' => 'Preço',
		'phone' => 'Telefone'
	], 
	'forms' => [
		'name' => 'Nome do Fornecedor',
		'phone' => 'Telefone',
		'address' => 'Endereço',
		'number' => 'Número',
		'district' => 'Bairro',
		'state' => 'Estado',
		'city' => 'Cidade'
	],
	'messages' => [
		'fails_field' => 'O campo Nome não foi preenchido!',
		'error' => 'Falha ao cadastrar o fornecedor!',
		'success' => 'Fornecedor cadastrado com sucesso!',
		'fails' => 'Não foi possivel localizar o registro.',
		'error_update' => 'Falha ao atualizar o fornecedor!',
		'success_update' => 'Fornecedor atualizado com sucesso.'

	],


];