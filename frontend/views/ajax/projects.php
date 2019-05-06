<?php
if (Yii::$app->rule_check->CheckByKay(['super_admin'])) {
    $projects = \frontend\models\Projects::GetAllProjectsAdmin($get);
} else {
    $projects = \frontend\models\Projects::GetAllProjectsUsers($get);
}

$date = \frontend\components\Helper::ChangeProjectsFormat($projects);
$index = 1;
?>

<?php if (!empty($date)): ?>
    <table id="projects-data-t">
        <thead>
        <tr>
            <th>No</th>
            <th>Status</th>
            <th>Contracting authority</th>
            <th>Client name</th>
            <th>Project name</th>
            <th>Country</th>
            <th>Tender stage</th>
            <th>Moderator</th>
            <th><i class="fa fa-clock-o"></i> Deadline</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($date as $kay => $projects): ?>
            <?php foreach ($projects as $k => $project): ?>
                <?= $this->render('project', [
                    'project' => $project,
                    'kay' => $index,
                    'favorites' => \frontend\models\ProjectFavorite::GetFavoritesByUserId(),
                ]);
                $index++ ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>