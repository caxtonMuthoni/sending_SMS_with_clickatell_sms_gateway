<?php

use controllers\SmsController;

$smsController = new SmsController();
$smses = $smsController->allSmses();
?>

<table class="table table-striped table-sm">
    <thead>
        <th>#</th>
        <th>To</th>
        <th>SMS</th>
        <th>Delivered</th>
    </thead>
    <tbody>
        <?php foreach($smses as $key => $sms) : ?>
            <tr>
            <td><?=$key + 1?></td>
            <td><?=$sms["phone"]?></td>
            <td><small><?=$sms["sms"]?></small></td>
            <td>
                <?php if($sms["delivery"] === 'accepted'): ?>
                <span class="badge badge-primary"><?=$sms["delivery"]?></span>
                <?php elseif ($sms["delivery"] === 'delivered'): ?>
                <span class="badge badge-success"><?=$sms["delivery"]?></span>
                <?php else : ?>
                <span class="badge badge-danger"><?=$sms["delivery"]?></span>
                <?php endif ?>
                
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>