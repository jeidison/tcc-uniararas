<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require './src/model/dao/UserDao.php'; ?>
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
                        $userDao = new UserDao();
                        $users = $userDao->users();
                        foreach ($users as $user => $value): ?>
                            <tr>
                                <td align="center">
                                    <a class="btn btn-default">
                                        <em class="fa fa-pencil"></em>
                                    </a>
                                    <a class="btn btn-danger">
                                        <em class="fa fa-trash"></em>
                                    </a>
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


<!-- Modal -->
<div class="modal fade" id="modalCadastro" role="dialog">
    <div class="modal-dialog">

        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar nova pessoa</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>

    </div>
</div>

</div>

</body>
</html>