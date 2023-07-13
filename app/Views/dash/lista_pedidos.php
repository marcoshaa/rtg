
        
<table id="dataTables-contrato" class="table table-striped table-bordered table-hover table-condensed lista_item">
    <thead class="bg-primary text-white">
        <tr>
            <th>Pedido</th>
            <th>Embarque</th>
            <th>Retorno</th>
            <th>Cliente</th>
            <th>Pacote</th>
            <th>Paxs</th>
            <th>Total</th>
            <th>Ticket</th>
            <th>Situação</th>
            <th class="text-right">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($lista_pedidos !== FALSE) { ?>
        <?php foreach ($lista_pedidos as $item): ?>
        <tr>
            <td><?=$item['request_number'];?></td>
            <td><?=date('d/m/Y',strtotime($item['start_date']));?></td>
            <td><?=date('d/m/Y',strtotime($item['end_date']));?></td>
            <td><?=$item['customer'];?></td>
            <td><?=$item['product'];?></td>
            <td><?=$item['paxs'];?></td>
            <td><?=number_format($item['amount'],2,',','.');?></td>
            <td><?=$item['ticket_number'];?></td>
            <td><?php
                switch ($item['status']) {
                    case 0:
                        echo '<span class="badge badge-danger" style="color: #ffffff; border-radius:5px; width:100%;">Pedido Cancelado</span>';
                        break;
                    case 1:
                        echo '<span class="badge badge-info" style="color: #ffffff; border-radius:5px; width:100%;">Pedido aberto</span>';
                        break;    
                    case 2:
                        echo '<span class="badge badge-warning" style="color: #ffffff; border-radius:5px; width:100%;">Parcialmente emitido</span>';
                        break;                            
                    case 3:
                        echo '<span class="badge badge-success" style="color: #ffffff; border-radius:5px; width:100%;">Emitido</span>';
                        break;      
                    default:
                        break;                                          
                }
                ?>
            </td>
            <td nowrap>    
                <div class="text-right">						
                    <button type="button" data-action="<?= site_url("request/viewticket/{$item['id']}/1") ?>" class="btn btn-primary btn-xs btn-visualizar-pedido btn-rounded" role="button" title="Excluir Valor">
                        <i class="far fa-eye"></i>
                    </button>   
                </div>                
            </td>
        </tr>
        <?php endforeach; ?>
        <?php } ?>
    </tbody>
</table>
