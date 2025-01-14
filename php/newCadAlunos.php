<?php include_once 'conexaoBanco.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/basestyle/style.css">
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/moment.min.js"></script>
    <script src="../assets/css/dataTables.responsive.css"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/css/dataTables.bootstrap4.css"></script>
    


    <title>Focus Body | ADM</title>
</head>
<body>
    
    <!-- Pre Loader-->
    <div class="loader-wrapper">
        <div class="spinner">
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="length" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
          <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="28"></circle>
          </svg>
        </div>
    </div>    
    <!-- Pre Loader-->



    <section class="wrapper">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <nav class="navbar navbar-dark bg-primary">
              <a class="navbar-brand m-0 py-2 brand-title" href="#">Focus Admin</a>
              <span></span>
              <a class="navbar-brand py-2 material-icons toggle-sidebar" href="#">menu</a>
            </nav>

            <nav class="navigation">
              <ul>
                  <li class="active"><a href="index.html" data-toggle="modal" data-target="#newAlunosModal" title="Adicionar novo Aluno"><span class="nav-icon material-icons">add</span> Add</a></li>
                  <li class="active" title="Cadastro de Alunos"><a><span class="nav-icon material-icons ">fitness_center</span> Aluno </a>
                  </li>
                  <li title="Cadastro de Alunos"><a href="index.php"><span class="nav-icon material-icons ">sell</span> Vendas </a>
                  </li>
                  <li title="Cadastro de Funcionários"><a href="../index.html"><span class="nav-icon material-icons ">badge</span> Funcionário </a>
                  </li>
                  <li title="Cadastro de Planos"><a href="newCadPlanos.php"><span class="nav-icon material-icons ">note_add</span> Planos </a>
                  </li>
                  
              </ul>
                  <!--<li class="notification alert-notify"><a href="#"><span class="nav-icon material-icons">question_answer</span> Forms <span class="toogle-sub-nav material-icons">keyboard_arrow_right</span></a></li>-->
              </ul>

              <label title="Documentação"><span>Ajuda para Usuários<span></label>
              <ul>
                  <li><a href="https://github.com/ElMarcelFarias/sa_academia" title="Documentação"><span class="nav-icon material-icons">school</span> Documentação</a></li>
              </ul>
            </nav>

          </aside>

        <div class="content-area">
          <div class="content-wrapper">

            <div class="row page-tilte align-items-center">
              <div class="col-md-auto">
                <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
                <h1 class="weight-300 h3 title"><span class="nav-icon material-icons ">fitness_center</span> Alunos</h1>
              </div> 
              <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
                <div class="controls d-flex justify-content-center justify-content-md-end">
                  
                </div>
              </div>
            </div> 


                  
            <div class="content">
                
                <table id="example" class="table table-striped mb-4 bg-white table-bordered dt-responsive">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Rua</th>
                        <th>Data de Nascimento</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $sql = "SELECT * FROM alunos";
                    $query = $con->query($sql) or die($con->error);

                    while($row = $query->fetch_assoc()){
                        ?>
        
                        <tr>
                            <td><?= strtoupper($row['nome'].' '.$row['sobrenome'])?></td>
                            <td><?= $row['cpf']?></td>
                            <td><?= $row['cep']?></td>
                            <td><?= $row['cidade']?></td>
                            <td><?= $row['bairro']?></td>
                            <td><?= $row['rua'].', '.$row['numero']?></td>
                            <td><?=  date('m/Y', strtotime($row['dataNascimento']))?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm updateAlunos" id="<?=$row['idAluno']?>"><span class="material-icons align-text-bottom">edit</span></button>
                                <button type="button" class="btn btn-danger btn-sm deleteAlunos" id="<?=$row['idAluno']?>"><span class="material-icons align-text-bottom">close</span></button>
                            </td>
                        </tr>
                        <?php
                    }

                ?>
                    
                </tbody>
                    
            </table>

          </div>
            <footer class="footer">
              <p class="text-muted m-0"><small class="float-right">Feito por <span class="material-icons md-16 text-danger align-middle">favorite</span> by Marcel Farias - Otávio Henrique</small><small >FocusBody © 2022–2022 </small></p>
            </footer>

          </div>
        </div>
    </section>


    <div class="modal fade" id="newAlunosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modalAlunos" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastro de Alunos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="newAlunosForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_nome">Nome</label>
                                    <input type="text" class="form-control" name="alunos_nome" id="alunos_nome" style="text-transform: uppercase;">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" name="alunos_sobrenome" id="alunos_sobrenome" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_rg">RG</label>
                                    <input type="text" class="form-control" name="alunos_rg" id="alunos_rg" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_cpf">CPF</label>
                                    <input type="text" class="form-control cpf" name="alunos_cpf" id="alunos_cpf" style="text-transform: uppercase;">
                                </div>
                            </div>
                            


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_cep">CEP</label>
                                    <input type="text" class="form-control" name="alunos_cep" id="alunos_cep" onblur="preencherEndereco(this.value)" style="text-transform: uppercase;">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_cidade">Cidade</label>
                                    <input type="text" class="form-control" name="alunos_cidade" id="alunos_cidade">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_bairro">Bairro</label>
                                    <input type="text" class="form-control" name="alunos_bairro" id="alunos_bairro">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_rua">Rua</label>
                                    <input type="text" class="form-control" name="alunos_rua" id="alunos_rua">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_numero">Número</label>
                                    <input type="text" class="form-control" name="alunos_numero" id="alunos_numero" maxlength="6" style="text-transform: uppercase;">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alunos_sexo">Sexo</label>
                                    <select name="alunos_sexo" id="alunos_sexo" class="custom-select">
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alunos_data">Data</label>
                                    <input type="date" class="form-control" name="alunos_data" id="alunos_data">
                                </div>
                            </div>


                            

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="material-icons align-text-bottom">close</span></button>
                        <button type="submit" class="btn btn-success"><span class="material-icons align-text-bottom">done</span></button>
                    </div>
                </form>

            </div>
          </div>
        </div>
    </div>

    <div id="modal_edit"></div>

    <script src="../assets/js/lib/moment.min.js"></script>
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/js/jquery.dataTables.js"></script>
    <script src="../assets/js/datatables/DataTables-1.11.5/js/dataTables.bootstrap4.js"></script>
    <script src="../assets/js/dataTables.responsive.js"></script>
    <script src="../assets/js/lib/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/js/chosen-js/chosen.jquery.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>
    <script src="../js/jquery.mask.js"></script>
    <script src="../js/jquery.mask.min.js"></script>



<script>
//DataTables script 
$(document).ready(function() {
    $('#example').DataTable({
        language: {
            lengthMenu: 'Páginas disponiveis _MENU_ ',
            zeroRecords: 'Nada encontrado, desculpe!',
            info: 'Página _PAGE_ de _PAGES_',
            infoEmpty: 'Não há registros disponíveis',
            infoFiltered: '(filtrando de _MAX_ total regristros)',
            search: 'Pesquisar',
                "paginate": {
                "first":      "Primeira",
                "last":       "Last",
                "next":       "Próxima",
                "previous":   "Anterior"
            },
        },
    });
    
} );

$(document).ready(function () { 
    var cpf = $('#alunos_cpf');
    cpf.mask('000.000.000-00', {reverse: false});

    var cep = $('#alunos_cep');
    cep.mask('00000-000', {reverse: false});
});



$(function(){
    //Executa a requisição quando o campo username perder o foco
    $('#alunos_cpf').blur(function()
    {
        var cpf = $('#alunos_cpf').val().replace(/[^0-9]/g, '').toString();

        if( cpf.length == 11 )
        {
            var v = [];

            //Calcula o primeiro dígito de verificação.
            v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;

            //Calcula o segundo dígito de verificação.
            v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
            v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
            v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;

            //Retorna Verdadeiro se os dígitos de verificação são os esperados.
            if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) )
            {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha um CPF válido!',
                    'error'
                    )

                $('#alunos_cpf').val('');
                $('#alunos_cpf').focus();
            }
        }
        
    });
});

//API VIA CEP 
function preencherEndereco(cep){
    $('#alunos_cidade').val('');
    $('#alunos_bairro').val('');
    $('#alunos_rua').val('');

    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
        if (!("erro" in dados)) {       
            $("#alunos_rua").val(dados.logradouro);
            $("#alunos_bairro").val(dados.bairro);
            $("#alunos_cidade").val(dados.localidade);                                
        }else {                        
            Swal.fire(
                    'Erro',
                    'CEP não encontrado! Preencha o endereço manualmente.',
                    'error'
                    )
        }
     });
}




$(document).on('click', '.updateAlunos', function(){
    var id = $(this).attr('id');

    
    $("#modal_edit").html('');
    $.ajax({
        url: 'viewAlunos.php',
        type: 'POST',
        cache: false,
        data: {id:id},
        success:function(data){
            $("#modal_edit").html(data);
            $("#updateAlunosModal").modal('show');
        }
    })
    

})







// Deletar um cadastro 
$(document).on('click', '.deleteAlunos', function(){
    var id = $(this).attr('id');
    
    Swal.fire({
        title: 'Realmente quer fazer isto?',
        text: "O aluno será deletado permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'deleteAlunos.php',
                type: 'POST',
                data: {id:id},
                success:function(data){
                    Swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: 'Aluno deletado com sucesso!'
                    }).then(()=>{
                        window.location.reload();
                    })
                }

            })
        }
        })
})






// Adicionar um campo, via AJAX SweetAlerts2
    $(document).ready(function(){
        $("#newAlunosForm").submit(function(e){
            e.preventDefault();

            var alunos_nome = $("#alunos_nome").val(); 
            var alunos_sobrenome = $("#alunos_sobrenome").val();
            var alunos_rg = $("#alunos_rg").val();
            var alunos_cpf = $("#alunos_cpf").val();
            var alunos_cep = $("#alunos_cep").val();
            var alunos_cidade = $("#alunos_cidade").val();
            var alunos_bairro = $("#alunos_bairro").val();
            var alunos_rua = $("#alunos_rua").val();
            var alunos_numero = $("#alunos_numero").val();
            var alunos_sexo = $("#alunos_sexo").val();
            var alunos_data = $("#alunos_data").val();

            
            if(alunos_nome == '' || alunos_sobrenome == '' || alunos_rg == ''  || alunos_cpf == '' || alunos_cep == ''  || alunos_cidade == '' || alunos_bairro == '' || alunos_rua == '' || alunos_numero == '' || alunos_data == '') {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha os campos corretamente!',
                    'error'
                    )
            } else {
                $.ajax({
                    url: 'newAlunos.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    cache: false,
                    success:function(data){
                        $('#newAlunosModal').hide();
                        Swal.fire({
                            title: 'Success',
                            text: 'Aluno adicionado com sucesso!',
                            icon: 'success'
                        }).then(()=>{
                            window.location.reload();
                        })
                        
                    }
                })
            } 
        })
    })
    
</script>
</body>
</html>