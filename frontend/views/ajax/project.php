<?php
/* @var $project */
/* @var $favorites */
/* @var  $project frontend\models\Projects */

$members = \frontend\models\ProjectMembers::GetMembersByProjectIdAllData($project['id']);
$attachments = \frontend\models\ProjectAttachments::GetAttachmentsByProjectId($project['id']);
$countries = \frontend\models\ProjectCountries::GetCountriesNameByProjectIdString($project['id']);
$fav_id = array_search($project['id'], $favorites);
if ($fav_id !== false) {
   $favorite_class = 'fa-star';
} else {
   $favorite_class = 'fa-star-o';
}
$arch_class = ($project['state'] == 2) ? 'fa-archive-active' : '';
$arch_title = ($project['state'] == 2) ? 'Unarchive' : 'Archive';
$icon = ($project['state'] == 2) ? '<i class="fa fa-check"></i>' : '';
$status = \frontend\components\Helper::GetStatusTitle($project['status']);

?>

<tr class="project" data-id="<?= $project['id'] ?>" data-rules="<?= \frontend\models\Projects::GetProjectRules($project['id']) ?>">
   <td>
      <span title="No"><?= $kay ?></span>
   </td>
   <td>
      <div class="post-status applied font-w-700">
         <div title="Status" class="post-status <?= $status['class'] ?> font-w-700">
            <?= $icon . $status['title'] ?>
         </div>
      </div>
   </td>
   <td>
      <span title="IFI name"><?= $project['ifi_name'] ?></span>
   </td>
   <td>
      <span title="Client name"><?= $project['client_name'] ?></span>
   </td>
   <td>
      <span title="Project name"><?= $project['project_name'] ?></span>
   </td>
   <td>
      <p title="Countries"><?= $countries ?></p>
   </td>
   <td>
      <p title="Tender stage"><?= $project['tender_stage'] ?></p>
   </td>
   <td>
      <p title="Moderator"><?= \frontend\models\User::GetUserNameById($project['moderator_id']) ?></p>
   </td>
   <td>
      <p title="Deadline"><?= \frontend\components\Helper::GetDate($project['deadline']) ?></p>
   </td>
   <td>
      <div class="post-actions d-flex brd-rad-4 white-bg">

         <a href="#" data-id="<?= $project['id'] ?>"
            class="favorite-project fa <?= $favorite_class ?> rating no-underline black-txt" title="Favorite"></a>
         <?php if (Yii::$app->rule_check->CheckByKay(['super_admin'])): ?>
            <a data-id='<?= $project['id'] ?>'
               class="fa fa-archive archive-project <?= $arch_class ?> sharing no-underline" title="<?= $arch_title ?>"></a>
         <?php endif; ?>
         <?php if (Yii::$app->rule_check->CheckByKay(['super_admin']) || $project['creator_id'] == Yii::$app->user->getId()): ?>
            <a href="/projects/update?id=<?= $project['id'] ?>" title="Update"
               class="fa fa fa-pencil sharing no-underline"></a>
         <?php endif; ?>
         <?php if (Yii::$app->rule_check->CheckByKay(['super_admin']) || $project['creator_id'] == Yii::$app->user->getId()): ?>
            <a data-id="<?= $project['id'] ?>"
               class="fa fa-trash delete-project removal no-underline black-txt" title="Delete"></a>
         <?php endif; ?>
      </div>
   </td>
</tr>