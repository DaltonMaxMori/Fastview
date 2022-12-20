<?php
    $resultados='';
    if (count($clientes)>0) {
    
        foreach($clientes as $cliente){
            
            $resultados.='<tr>
                    <td>'.$cliente->id.'</td>
                    <td>'.strtoupper($cliente->nome).'</td>
                    <td>'.$cliente->telefone.'</td>
                    <td>'.$cliente->email.'</td>
                    
                    <td>
                        <a href="editar.php?id='.$cliente->id.'">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$cliente->id.'">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>';
        }
    } 
?>
<main>
    
    <div class="container">        
        
        <section>
            <a href="cadastrar.php">
                <button class="btn btn-success mt-3">Cadastrar</button>
            </a>
        </section>
        <section>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>TELEFONE</th>
                        <th>E-MAIL</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$resultados?>
                </tbody>
            </table>
        </section>
    </div> 
</main>