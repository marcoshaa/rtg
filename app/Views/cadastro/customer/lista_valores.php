
<div class="table-responsive">        
    <table id="dataTables-contrato" class="table table-striped table-bordered table-hover table-condensed lista_item">
    <thead class="bg-primary text-white">
        <tr>
            <th>Limite de Crédito</th>
            <th>Comissão</th>
            <th>A partir de:</th>
            <th class="text-right">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($lista_config !== FALSE) { ?>
        <?php foreach ($lista_config as $item): ?>
        <tr>
            <td><?=number_format($item->credit_line,2,',','.');?></td>
            <td><?=number_format($item->commission_default,2,',','.');?></td>
            <td><?=date('d/m/Y',strtotime($item->valid_initial));?></td>
            <td nowrap>    
                <div class="text-right">						
                    <button type="button" data-action="<?= site_url("customer/delconfig/{$item->customer_id}/{$item->id}") ?>" class="btn btn-danger btn-xs btn-excluir-valor btn-rounded" role="button" title="Excluir Valor">
                        <span class="fa fa-trash" aria-hidden="true"></span> 
                    </button>   
                    <button type="button" 
                        data-action="" 
                        data-id="<?=$item->id;?>" 
                        data-creditline="<?=$item->credit_line;?>" 
                        data-commission="<?=$item->commission_default;?>" 
                        data-validinitial="<?=$item->valid_initial;?>" 
                        class="btn btn-primary btn-xs btn-editar-valor btn-rounded" role="button" title="Editar Valor">
                        <span class="far fa-edit" aria-hidden="true"></span> 
                    </button>   
                </div>                
            </td>
        </tr>
        <?php endforeach; ?>
        <?php } ?>
    </tbody>
    </table>
</div>