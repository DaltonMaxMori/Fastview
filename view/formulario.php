<main>
    
    <div class="container">
        <h2 class="mt-3"><?=TITLE?></h2>

        <form method="post" >
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" required="" name="nome" value="<?=$oCliente->nome?>">
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" class="form-control" required="" name="telefone" value="<?=$oCliente->telefone?>">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" required="" name="email" value="<?=$oCliente->email?>">
            </div>
            
            <section>           
                <div class="mt-3">
                    <a href="index.php" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>             
            </section>    
        </form>    
    </div>    
</main>