<div class="table-responsive">        
    <table id="dataTables-contrato" class="table table-striped table-bordered table-hover table-condensed lista_item">
    <thead class="bg-primary text-white">
        <tr>
            <th>Limite de Crédito</th>
            <th>Comissão</th>
            <th>A partir de:</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        {lista_config}
        <tr>
            <td>{credit_line}</td>
            <td>{commission_default}</td>
            <td>{valid_initial}</td>
            <td nowrap>    
                <div class="text-right">		
                    <button type="button" data-action="" class="btn btn-danger btn-xs btn-excluir-valor" role="button" title="Excluir Valor">
                        <span class="fa fa-trash" aria-hidden="true"></span> 
                    </button>   					
                    <button type="button" 
                        data-action="" 
                        data-id="{id}" 
                        data-creditline="{credit_line}" 
                        data-commission="{commission_default}" 
                        data-validinitial="{valid_initial}" 
                        class="btn btn-primary btn-xs btn-editar-valor" role="button" title="Editar Valor">
                        <span class="fas fa-pencil-square-o" aria-hidden="true"></span> 
                    </button>   
                </div>                
            </td>
        </tr>
        {/lista_config}
    </tbody>
    </table>
</div>