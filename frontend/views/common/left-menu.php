<div class="left-slide w-100-perc">
    <div class="logo"><a href="/"><img src="/main/assets/images/logo-short.png" alt="" class="w-100-perc"></a></div>
    <ul class="left-slide-menu">
        <li><a href="/site/projects"
               class="d-block prospects <?= $active == 'prospects' ? 'active' : '' ?>  no-underline white-txt"><i
                        class="fa fa-file-text-o"></i>Prospects</a>
        </li>
        <?php if (Yii::$app->rule_check->CheckByKay(['super_admin'])): ?>
            <li><a href="/users"
                   class="d-block <?= $active == 'members' ? 'active' : '' ?> members no-underline white-txt"><i
                            class="fa fa-user" aria-hidden="true"></i>Users</a>
            </li>
        <?php endif; ?>
        <?php if (Yii::$app->rule_check->CheckByKay(['super_admin'])): ?>
            <li><a href="/users-group"
                   class="d-block <?= $active == 'user-groups' ? 'active' : '' ?> members no-underline white-txt"><i
                            class="fa fa-users"></i>User Groups</a>
            </li>
        <?php endif; ?>
        <?php if (Yii::$app->rule_check->CheckByKay(['super_admin'])): ?>
            <li><a href="/firms"
                   class="d-block  <?= $active == 'companies' ? 'active' : '' ?> countries no-underline white-txt"><i
                            class="fa fa-building-o"></i>Firms</a>
            </li>
        <?php endif; ?>
        <li><a href="/reports"
               class="d-block  <?= $active == 'reports' ? 'active' : '' ?> countries no-underline white-txt"><i
                        class="fa fa-bar-chart" aria-hidden="true"></i>Reports</a>
        </li>
    </ul>
    <?php if (Yii::$app->rule_check->CheckByKay(['super_admin']) || Yii::$app->rule_check->CheckByKay(['moderator'])): ?>
        <a href="/projects/create" class="add-new-block  no-underline white-txt"><i></i>Add new prospect</a>
    <?php endif; ?>
</div>
