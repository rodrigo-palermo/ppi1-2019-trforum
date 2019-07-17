<h2>Login</h2>
<form id="formLogin" action=''> <!--method='post'/-->
    <div class="form-group">
        <label for="login"></label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Usuário" required>
    </div>
    <div class="form-group">
        <label for="senha"></label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
    </div>
    <div class="form-group">
        <!-- Variáveis POST para identificar LOGIN -->
        <input type="text" name="submitEntrar" hidden>

        <input type="submit" class="btn btn-outline-primary" name="submitEntrar" value="Entrar">
        <button type='button' class='btn btn-outline-success more-vert-margin' onclick='abreUsuarioRegistrar()'>Registrar</button>
    </div>
</form>