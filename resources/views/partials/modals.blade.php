<div class="modal fade" id="addUser" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="ajax/addUser">
      <div class="modal-body">
     
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome e Sobrenome" required>
         
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="examplo@email.com" required>
         
        </div>
        <div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" class="form-control" id="cep" name="cep" placeholder="000000-00" required>
         
        </div>
        <div class="form-group">
          <label for="phone">Telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="(DDD) 0 1234-5678" required>
         
        </div>
        <div class="form-group">
          <label for="city">Cidade</label>
          <input type="text" class="form-control" id="city" placeholder="Cidade" readonly required>
        </div>

        <div class="form-group">
          <label for="province">Estado</label>
          <input type="text" class="form-control" id="province" placeholder="Estado" readonly required>
        </div>

        <div class="form-group">
          <label for="district">Bairro</label>
          <input type="text" class="form-control" name="district" id="district" placeholder="Bairro" readonly required>
        </div>

        <div class="form-group">
          <label for="number">Número</label>
          <input type="text" class="form-control" name="number" id="number" placeholder="ex: 1A" required>
        </div>

        <div class="form-group">
          <label for="complemet">Complemeto</label>
          <input type="text" class="form-control" id="complemet" name="complemet" placeholder="opcional">
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</butto>
      </div>

      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editUser" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="edituser" action="ajax/updateUser">
      <div class="modal-body">
     
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome e Sobrenome" required>
          
         
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="examplo@email.com" required>
         
        </div>
        <div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" class="form-control" id="cep" name="cep" placeholder="000000-00" required>
         
        </div>
        <div class="form-group">
          <label for="phone">Telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="(DDD) 0 1234-5678" required>
         
        </div>
        <div class="form-group">
          <label for="city">Cidade</label>
          <input type="text" class="form-control" id="city" placeholder="Cidade" readonly required>
        </div>

        <div class="form-group">
          <label for="province">Estado</label>
          <input type="text" class="form-control" id="province" placeholder="Estado" readonly required>
        </div>

        <div class="form-group">
          <label for="district">Bairro</label>
          <input type="text" class="form-control" name="district" id="district" placeholder="Bairro" readonly required>
        </div>

        <div class="form-group">
          <label for="number">Número</label>
          <input type="text" class="form-control" name="number" id="number" placeholder="ex: 1A" required>
        </div>

        <div class="form-group">
          <label for="complemet">Complemeto (opcional)</label>
          <input type="text" class="form-control" id="complemet" name="complemet" placeholder="">
        </div>
    
      </div>
      <div class="modal-footer">
        <input type="hidden" class="form-control" id="id" name="id" required>
        <button type="submit" class="btn btn-primary">Salvar</butto>
      </div>

      </form>
    </div>
  </div>
</div>
