@php
    use App\Http\Controllers\Teste;
@endphp

<section class="teste">
    <div class="container">
        <div class="row">

        <div class="container-xl">
            <div class="table-responsive mt-5">
                <div class="table-wrapper mt-5">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-md-8"><h2>Cadastro</h2></div>

                            
                            <div class="col-md-4 mb-4 mt-4">
                                <div class="m-1">
                                    <button type="button" class="add-user btn btn-primary" data-toggle="modal" data-target="#addUser">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Data de nascimento</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Teste::List() as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->cpf }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ date('d/m/Y', strtotime($row->born)) }}</td>
                                @php 

                                    $phone = "(".substr($row->phone, -10, -8) . ") " . substr($row->phone, -7, -2) . "-" . substr($row->phone, -4); 
                                @endphp
                                <td>{{ $phone }}</td>
                               
                                <td>
                                    <button data-id="{{ $row->id }}" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></button>
                                    <button  class="delete" data-id="{{ $row->id }}" title="Deletar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>  
        </div>   

        </div>
    </div>
</section>

@include('partials.modals')


   