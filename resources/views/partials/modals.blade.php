@php
    use App\Http\Controllers\Region;
@endphp

<div class="modal fade" id="addUser" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="ajax/addUser">
      <div class="modal-body">
     
      <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome e Sobrenome" required>
        </div>

        <div class="form-group">
          <label for="name">CPF</label>
          <input type="text" class="cpf form-control" id="cpf" name="cpf" placeholder="somente números" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="examplo@email.com" required>
        </div>

        <div class="form-group">
          <label for="email">Data de Nascimento</label>
          <input type="date" class="form-select select2" id="born" name="born" required>
        </div>

        <div class="form-group">
          <label for="phone">Telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="(DDD) 9 1234-5678" required>
        </div>
      
        <div class="form-group">
          <label for="province">Estado</label>
          <select required name="province" id="province" class="form-select select2 w-100 ">
              @php
                  $estados = Region::List();
              @endphp
              @foreach($estados as $row)
              <option value="{{ $row->sigla }}">{{ $row->sigla }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="city">Cidade</label>
          <select required name="city" id="city" class="custom-select form-select select2 w-100">
              @php
                  $cidades = Region::List(1, 'AC');
              @endphp
              @foreach($cidades as $row)
                  <option data-city="{{ $row->nome }}" value="{{ $row->nome }}">{{ $row->nome }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="address">Endereço</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Endereço completo" required>
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
        <h5 class="modal-title"></h5>
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
          <label for="name">CPF</label>
          <input type="text" class="cpf form-control" id="cpf" name="cpf" placeholder="somente números" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="examplo@email.com" required>
        </div>

        <div class="form-group">
          <label for="email">Data de Nascimento</label>
          <input type="date" class="form-select select2" id="born" name="born" required>
        </div>

        <div class="form-group">
          <label for="phone">Telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="(DDD) 9 1234-5678" required>
        </div>

        <div class="form-group">
          <label for="province">Estado</label>
          <select required name="province" id="province" class="form-select  select2 w-100 ">
              @php
                  $estados = Region::List();
              @endphp
              @foreach($estados as $row)
              <option value="{{ $row->sigla }}">{{ $row->sigla }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="city">Cidade</label>
          <select required name="city" id="city" class="custom-select form-select select2 w-100">
            <option class="city"></option>
          </select>
        </div>

        <div class="form-group">
          <label for="address">Endereço</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Endereço completo" required>
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
