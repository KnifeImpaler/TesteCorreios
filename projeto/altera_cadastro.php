<?php 
    include_once 'conexao.php';
    $id = @$_GET['id'];
    $cad = @$_GET['ALT'];
    $msgCad = '';
    $tipoAlert = '';
    if($cad == 1) {
        $msgCad = "Registro Alterado";
        $tipoAlert = 'success';
    }
    
    $consulta = $pdo->prepare("SELECT * FROM correspondencia WHERE id_correspondencia=:id");
    $consulta->execute(['id' => $id]); 
    $linha = $consulta->fetch(); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAMARGO | DS Netwish</title>
    <meta name="theme-color" content="#3c8dbc">
    <meta name="msapplication-navbutton-color" content="#3c8dbc">
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c8dbc">
    <script src="https://pedidos.camargociaembalagens.com.br/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="https://pedidos.camargociaembalagens.com.br/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/plugins/pace/pace.min.css">
    <script src="https://pedidos.camargociaembalagens.com.br/plugins/pace/pace.js"></script>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/plugins/iCheck/all.css">

    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/plugins/morris/morris.css">

    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/plugins/datepicker/datepicker3.css">

    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/plugins/daterangepicker/daterangepicker-bs3.css">

    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://pedidos.camargociaembalagens.com.br/style.css" teste="63">




</head>

<body class="skin-blue layout-top-nav">

    <div id="geral" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="carregando_iframe"><i class="fa fa-spinner fa-spin"></i></div>
                    <iframe id="meuiframe" frameborder="0" name="consulta"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm" onclick="imprimir('consulta');">Imprimir</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">

        <div class="content-wrapper">

            <section class="content">

                <div class="row">
                </div>
                <div class="container">
                    <div></div>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/select2/select2.full.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/select2/i18n/pt-BR.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/input-mask/jquery.inputmask.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/input-mask/jquery.inputmask.extensions.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/timepicker/bootstrap-timepicker.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/slimScroll/jquery.slimscroll.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/iCheck/icheck.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/fastclick/fastclick.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/dist/js/app.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/dist/js/demo.js"></script>

                    <script src="dropzone.js"></script>

                    <script src="https://www.netwish.com.br/clientes/sindienergia/dist/js/bootstrap-confirmation.min.js"></script>
                    <script type="text/javascript">
                        $(document).find('[data-toggle="confirmation"]').confirmation();
                    </script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/daterangepicker/daterangepicker.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/datepicker/bootstrap-datepicker.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/datatables/jquery.dataTables.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/datatables/dataTables.bootstrap.min.js"></script>
                    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/dist/js/camargo.js"></script>

                    <link rel="stylesheet" href="plugins/select2/select2.min.css">
                    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
                    <link href="//cdnjs.cloudflare.com/ajax/libs/dropzone/3.8.4/css/dropzone.css" type="text/css" rel="stylesheet" />
                    <style>
                        select[readonly] {
                            background: #eee;
                            /*Simular campo inativo - Sugestão @GabrielRodrigues*/
                            pointer-events: none;
                            touch-action: none;
                        }
                    </style>
                    <?php
                        if($msgCad != ''){
                    ?>
                            <div class="alert alert-<?=$tipoAlert?> alert-dismissible">
                                <?=$msgCad?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <?php 
                        }
                    ?>
                    <form action="formulario-chamado-grava.php?opcao=ALT" method="post" class="form_principal" id="formulario">
                        
                        <div class="box-header with-border">
                            <h3 class="box-title" title="">Formulário </h3>                           
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <input type="hidden" name="id_correspondencia" value="<?=$linha['id_correspondencia']?>">
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nome da empresa:</label>
                                        <input type="text" class="form-control" placeholder="Nome da empresa" value="<?=$linha['empresa']?>" name="empresa" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>A/C do destinatário:</label>
                                        <input type="text" class="form-control" placeholder="A/C do destinatário" value="<?=$linha['destinatario']?>" name="destinatario" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">                                    
                                <div class="box-header">
                                    <h3 class="box-title" title="">Endereço</h3>                                
                                </div> 
                            
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>CEP:</label>
                                        <input type="text" class="form-control cep" maxlength="9" placeholder="CEP" value="<?=$linha['cep']?>" name="cep" required>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Logradouro:</label>
                                        <input type="text" class="form-control" placeholder="Logradouro" value="<?=$linha['logradouro']?>" name="logradouro" required>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Número:</label>
                                        <input type="text" class="form-control" placeholder="Número" value="<?=$linha['numero']?>" name="numero" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Complemento:</label>
                                        <input type="text" class="form-control" placeholder="Complemento" value="<?=$linha['complemento']?>" name="complemento" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cidade:</label>
                                        <input type="text" class="form-control" placeholder="Cidade" value="<?=$linha['cidade']?>" name="cidade" required>
                                    </div>
                                </div>
                                
                                <div class="col-sm-2">
                                    <div class="form-group border_red">
                                        <label>Estado:</label>
                                        <select class="form-control select2 obrigatorio" style="width: 100%;" name="estado" id="estado" required>
                                        <option value="">Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="PR">PR</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                        </select>
                                    </div>
                                <script>
                                    $('#estado').val("<?=$linha['estado']?>").trigger('change'); 
                                </script>
                                </div>
                            </div>                             

                            <div class="row">
                                <div class="box-header">
                                    <h3 class="box-title" title="">Informações adicionais</h3>                                
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Pessoa responsável pelo envio:</label>
                                        <input type="text" class="form-control" placeholder="Pessoa responsável pelo envio" value="<?=$linha['responsavel']?>" name="responsavel" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group border_red">
                                        <label>Tipo:</label>
                                        <select class="form-control select2 obrigatorio" style="width: 100%;" name="tipo_carta" id="tipo_carta" required>
                                            <option value="">Selecione uma opção</option>
                                            <option value="comum">Carta Comum</option>
                                            <option value="registrada">Carta Registrada</option>
                                            <option value="pac">PAC</option>
                                            <option value="sedex">Sedex</option>
                                        </select>
                                    </div>
                                    <script>
                                        $('#tipo_carta').val("<?=$linha['tipo_carta']?>").trigger('change'); 
                                </script>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>AR:</label>
                                        <textarea cols="2" class="form-control" placeholder="AR" name="ar" required><?=$linha['ar']?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Data de Envio:</label>
                                        <input type="text" class="form-control datepicker" placeholder="Data de Envio" maxlength="10" value="<?=date('d/m/Y', strtotime($linha['data_envio']))?>" name="data_envio" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Código de rastreio:</label>
                                        <input type="text" class="form-control" placeholder="Código de rastreio" maxlength="13" value="<?=$linha['rastreio']?>" name="rastreio" required>
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Usuário:</label>
                                        <input type="text" class="form-control" placeholder="Usuário" value="<?=$linha['usuario']?>" name="usuario" required>
                                    </div>
                                </div>
                                                                        
                                <div class="col-sm-4 col-sm-offset-8 text-right">                                                
                                    <button type="submit" id="CAD" class="btn btn-info" value="Salvo" name="gravar">SALVAR</button>
                                    <a href="javascript:void(0)" class="btn btn-danger" id="CLR">CANCELAR</a>
                                </div>
                                
                                <br/><br/> 

                            </div>
                        </div>                        
                    </form>
                    

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/select2/select2.full.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/select2/i18n/pt-BR.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/input-mask/jquery.inputmask.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/input-mask/jquery.inputmask.extensions.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/timepicker/bootstrap-timepicker.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/slimScroll/jquery.slimscroll.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/iCheck/icheck.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/fastclick/fastclick.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/dist/js/app.min.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/dist/js/demo.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/dropzone.js"></script>

                    <script src="https://www.netwish.com.br/clientes/sindienergia/dist/js/bootstrap-confirmation.min.js"></script>
                    <script type="text/javascript">
                        $(document).find('[data-toggle="confirmation"]').confirmation();
                    </script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/daterangepicker/daterangepicker.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/datepicker/bootstrap-datepicker.js"></script>

                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/datatables/jquery.dataTables.min.js"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/plugins/datatables/dataTables.bootstrap.min.js"></script>
                    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                    <script src="https://pedidos.camargociaembalagens.com.br/dist/js/camargo.js"></script>
                    <script>
                        window.setTimeout(function() {
                            $(".alert").addClass('hidden');
                        }, 2000);

                        $(function(){
                            
                            $('.cep').mask('00000-000');
                            $('.datepicker').datepicker({
                                format:"dd/mm/yyyy"
                            });

                            $("#CAD").click(function(e) {
                                e.preventDefault();
                                const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                    cancelButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                                })

                                swalWithBootstrapButtons.fire({
                                title: 'Aviso',
                                text: "Deseja salvar o registro?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Sim',
                                cancelButtonText: 'Não',
                                reverseButtons: true
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#formulario').submit();                                   
                                } 
                                })
                            });

                            $("#CLR").click(function(e) {
                                e.preventDefault();
                                const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                    cancelButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                                })

                                swalWithBootstrapButtons.fire({
                                title: 'Aviso',
                                text: "Deseja cancelar a operação?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Sim',
                                cancelButtonText: 'Não',
                                reverseButtons: true
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    parent.window.location.href = "cadastro.php";
                                    $(".modal").toggle();                              
                                } 
                                })
                            });
                        });
                    </script>
            </section>
        </div>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versão</b> 2.6.3
        </div>
        <strong>Copyright &copy; 2021 <a href="http://www.netwish.com.br">Netwish</a>.</strong> All rights reserved.
    </footer>
</body>

</html>