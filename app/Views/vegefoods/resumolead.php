

    <div class="col-md-12"> 
        <h5 class="mb-4" style="padding-top:30px;">RESUMO DO MEU PACOTE</h5>
        <div class="cart-list">
            <table class="table" id="lista-pedidos">
                <thead class="thead-primary">
                    <tr class="text-center">
                        <th>&nbsp;</th>
                        <th>Produto</th>
                        <th>Passageiros</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total =0;?>
                    <?php foreach($resumo_pedido as $item) { ?>
                        <tr class="text-center">
                            <?=($item['optional']==1 ? '<td class="product-remove"><a href="javascript:void(0)" data-id="'.$item['id'].'" data-item="'.$item['product_id'].'" class="exclui-produto"><span class="ion-ios-close"></span></a></td>' : '<td></td>' );?>
                            <td class="product-name"><?=$item['paxquote'].' X '.$item['name'].' '.($item['optional']==0 ? $item['agetext'] : '');?></td>
                            <td class="quantity"><?=$item['paxquote'];?></td>
                            <td class="total"><?='R$ '.number_format($item['price'],2,',','.');?></td>
                        </tr>
                        <?php $total+= floatval($item['price']); ?>  
                    <?php }?>    
                </tbody>
                <tfooter>
                    <tr class="text-center">
                        <td colspan="3">Total</td>
                        <td><?='R$ '.number_format($total,2,',','.');?></td>
                    </tr>
                </tfooter>   
            </table>
        </div>        
    </div>   
    <div class="row">
        <div class="col-lg-12" id="acoes_resumo">
            <h3 class="one">&nbsp;</h3>
            <button class="btn btn-voltar btn-secondary float-left" id="btn-voltar">Voltar</button>
            <button class="btn btn-continuar btn-primary float-right">Continuar</button>
        </div>
    </div>
