<?php 
use yii\helpers\Html;
?>
<h2>Платежи текущего пользователя</h2>
    <p>
        <?= Html::a('Добавить платеж', ['createpay'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-bordered table-condensed">
        <tr>
            <th>Цена</th>
            <th>Кол-во</th>
            <th>Сумма</th>
            <th>Дата</th>
        </tr>
        <?foreach($payquery as $pay):?>
            <tr>
                <td><?=$pay['price'];?></td> 
                <td><?=$pay['count'];?></td> 
                <td><?=$pay['amount'];?></td>  
                <td><?=$pay['date'];?></td>              
            </tr>
        <?endforeach?>
    </table>