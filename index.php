<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>TCC - Uniararas - CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <style>

        .panel-table .panel-body {
            padding: 0;
        }

        .panel-table .panel-body .table-bordered {
            border-style: none;
            margin: 0;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
            text-align: center;
            width: 100px;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
        .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
            border-right: 0px;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
        .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
            border-left: 0px;
        }

        .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td {
            border-bottom: 0px;
        }

        .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th {
            border-top: 0px;
        }

        .panel-table .panel-footer .pagination {
            margin: 0;
        }

        .panel-table .panel-footer .col {
            line-height: 34px;
            height: 34px;
        }

        .panel-table .panel-heading .col h3 {
            line-height: 30px;
            height: 30px;
        }

        .panel-table .panel-body .table-bordered > tbody > tr > td {
            line-height: 34px;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <p></p>
        <h1>TCC - Uniararas 2017</h1>
        <p>Cadastro de Pessoa.</p>
        <p> </p>
        <p> </p>
        <br>

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Pessoas</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <button type="button" data-toggle="modal" data-target="#modalCadastro"
                                    class="btn btn-sm btn-primary btn-create">Nova Pessoa
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th>
                                <em class="fa fa-cog"></em>
                            </th>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Documento</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once './src/model/entity/User.php';
                        require_once './src/model/dao/UserDao.php';
                        require_once './src/model/aplicacao/UserApplication.php';
                        require_once './src/controller/UserController.php';
                        $userDao = new UserController();
                        $users = $userDao->read();
                        foreach ($users as $user => $value): ?>
                            <tr>
                                <td align="center">
                                    <button data-toggle="modal" data-target="#modalEditar"
                                            value="<?php echo $value['id'] ?>"
                                            class="btn btn-primary btn-find">
                                        <em class="fa fa-pencil"></em>
                                    </button>
                                    <button value="<?php echo $value['id'] ?>"
                                            class="btn btn-danger btn-delete">
                                        <em class="fa fa-trash"></em>
                                    </button>
                                </td>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php echo $value['document'] ?></td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
                <div class="panel-footer"></div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Cadastrar -->
<div class="modal fade" id="modalCadastro" role="dialog">
    <div class="modal-dialog">

        <form action="src/utils/Helpers.php" method="post" id="form-cadastrar">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar nova pessoa</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="is_create" value="true">
                        <input type="hidden" name="status" value="ATIVO">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="document">Documento:</label>
                                <input type="text" name="document" class="form-control" id="document">
                            </div>
                            <div class="form-group">
                                <label for="email">Sexo:</label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="F">FEMININO</option>
                                    <option value="M">MASCULINO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_birth">Nascimento:</label>
                                <input type="date" name="date_birth" class="form-control" id="date_birth">
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone:</label>
                                <input type="tel" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" id="cadastrar" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" role="dialog">
    <div class="modal-dialog">

        <form action="src/utils/Helpers.php" method="post" id="form-atualizar">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar nova pessoa</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="is_update" value="true">
                        <input type="hidden" id="id" name="id" value="">
                        <input type="hidden" id="status" name="status" value="ATIVO">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="document">Documento:</label>
                                <input type="text" name="document" class="form-control" id="document">
                            </div>
                            <div class="form-group">
                                <label for="email">Sexo:</label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="F">FEMININO</option>
                                    <option value="M">MASCULINO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_birth">Nascimento:</label>
                                <input type="date" name="date_birth" class="form-control" id="date_birth">
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone:</label>
                                <input type="tel" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" id="atualizar" class="btn btn-success">Atualizar</button>
                </div>
            </div>
        </form>

    </div>
</div>

</body>

<script type="application/javascript">
    $(document).ready(function () {

        //cadastro
        $('#cadastrar').click(function (e) {
            e.preventDefault();
            var $form = $($('#form-cadastrar'));
            var serializedData = $form.serialize();
            console.log(serializedData);
            $.ajax({
                type: 'post',
                url: 'src/utils/Helpers.php',
                data: serializedData,
                success: function (response) {
                    alert(response.details);
                    window.location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    var result = jqXHR.responseJSON;
                    alert(result.details);
                }
            });
        });

        //delete
        $('.btn-delete').click(function (e) {
            $.ajax({
                type: 'post',
                url: 'src/utils/Helpers.php',
                data: {is_delete:'true', id_user:this.value},
                success: function (response) {
                    console.log(response);
                    alert(response.details);
                    window.location.reload()
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    var result = jqXHR.responseJSON;
                    alert(result.details);
                }
            });
        });

        // find
        $('.btn-find').click(function (e) {
            $.ajax({
                type: 'post',
                url: 'src/utils/Helpers.php',
                data: {is_find:'true', id_user:this.value},
                success: function (response) {
                    $('#modalEditar #name').val(response.data['name']);
                    $('#modalEditar #document').val(response.data['document']);
                    $('#modalEditar #sex').val(response.data['sex']);
                    $('#modalEditar #date_birth').val(response.data['date_birth']);
                    $('#modalEditar #phone').val(response.data['phone']);
                    $('#modalEditar #email').val(response.data['email']);
                    $('#modalEditar #id').val(response.data['id']);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    var result = jqXHR.responseJSON;
                    alert(result.details);
                }
            });
        });

        // update
        $('#atualizar').click(function (e) {
            e.preventDefault();
            var $form = $($('#form-atualizar'));
            var serializedData = $form.serialize();
            console.log(serializedData);
            $.ajax({
                type: 'post',
                url: 'src/utils/Helpers.php',
                data: serializedData,
                success: function (response) {
                  alert(response.details);
                  window.location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    var result = jqXHR.responseJSON;
                    alert(result.details);
                }
            });
        });

    });



</script>

</html>
