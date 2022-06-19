<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

\app\assets\MazerAsset::register($this);
\app\assets\MazerPluginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <link rel="icon" type="image/png" href=<?= \Yii::$app->request->baseUrl . "/uploads/logo.png" ?> />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | <?= Yii::$app->name ?></title>
    <script>
        var baseUrl = "<?= Yii::$app->urlManager->baseUrl ?>";
    </script>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div id="app">
        <?= $this->render(
            'left.php'
        )
        ?>
        <?= $this->render(
            'content.php',
            [
                'content' => $content,
            ]
        ) ?>

    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>