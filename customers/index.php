<?php
    require_once('functions.php');
    index();
?>
<?php include(HEADER_TEMPLATE); ?>
	<header>
		<div class="row">
			<div class="col-sm-6">
				<h2 id="actions">Clientes</h2>
			</div>
			<div id="actions" class="col-sm-6 text-right h2">
				<a class="btn btn-dark" href="add.php"><i class="fa fa-user-plus"></i> Novo Cliente</a>
				<a class="btn btn-light" href="index.php"><i class="fa fa-sync-alt"></i> Atualizar</a>
			</div>
		</div>
	</header>
<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>
	<hr>

	<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th style="width:30%">Nome</th>
			<th>CPF/CNPJ</th>
			<th>Telefone</th>
			<th>Atualizado em</th>
			<th>Opções</th>
		</tr>
	</thead>
	<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
	<tr>
		<td><?php echo $customer['id']; ?></td>
		<td><?php echo $customer['name']; ?></td>
		<td><?php echo $customer['cpf_cnpj']; ?></td>
		<td><?php echo $customer['phone']; ?></td>
		<td><?php echo date_format (date_create($customer['modified'], new DateTimeZone("America/Sao_Paulo")), "d/m/Y - H:i:s"); ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-light"><i class="fa fa-user-edit"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>