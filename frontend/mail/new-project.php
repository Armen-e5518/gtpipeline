<p>New project added</p>
<table style="width:100%; border: 1px solid #aaaaaa;">
    <thead >
    <tr style="border: 1px solid #aaaaaa;">
        <th align="center" style="padding: 5px; font-size: 15px;  border: 1px solid #aaaaaa;">Contracting authority</th>
        <th align="center" style="padding: 5px; font-size: 15px;  border: 1px solid #aaaaaa;">Client name</th>
        <th align="center" style="padding: 5px; font-size: 15px;  border: 1px solid #aaaaaa;">Notice title</th>
        <th align="center" style="padding: 5px; font-size: 15px;  border: 1px solid #aaaaaa;">Country</th>
        <th align="center" style="padding: 5px; font-size: 15px;  border: 1px solid #aaaaaa;">Deadline</th>
    </tr>
    </thead>
    <tbody>
    <tr style="border: 1px solid #aaaaaa;">
        <td align="center" style="padding: 5px; font-size: 15px; border: 1px solid #aaaaaa;"><?= $project['ifi_name'] ?></td>
        <td align="center" style="padding: 5px; font-size: 15px; border: 1px solid #aaaaaa;"><?= $project['client_name'] ?></td>
        <td align="center" style="padding: 5px; font-size: 15px; border: 1px solid #aaaaaa;"><?= $project['project_name'] ?></td>
        <td align="center" style="padding: 5px; font-size: 15px; border: 1px solid #aaaaaa;"><?= $countries ?></td>
        <td align="center" style="padding: 5px; font-size: 15px; border: 1px solid #aaaaaa;"><?= $project['deadline'] ?></td>
    </tr>
    </tbody>
</table>
<br>
<br>
<br>
<a href="<?= \Yii::$app->params['domain'] ?>">Check here</a>