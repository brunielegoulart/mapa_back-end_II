<div class="row justify-content-center mt-5">
    <div class="col-5 ">
        <h2>Painel de Controle</h2>
        <div class="card" style="width: 100%">
            <div class="card-body">
                <h5 class="card-title">Faça seu login</h5>

                <?php  include('Views/_message.php'); ?>
                
                    <form action="index.php?c=login&f=login" method="POST">
                        <div class="form-group mb-2">
                            <input type="text" name="username" class="form-control" placeholder="Usuário" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
            </div>
        </div>
    </div>
</div>

