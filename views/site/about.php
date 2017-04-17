<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Monstertest;
use app\models\Monster;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. Yuo will find information about our site, but not any garlic. We avoid garlic, because it is dangerous to some of our users.
    </p>
    <?php
    // Invalid Data
    /*$data = [
        'name'   => 'Wolfman',
        'age'    => 'invalidstring',
        'gender' => 'male'
    ];*/
    // Valid Data
    $data = [
        'name'   => 'Wolfman',
        'age'    => '32',
        'gender' => 'm'
    ];

    $validateMonster1 = new Monstertest($data);

    $monsterData = [
        [
            'name' => 'Dracula',
            'age' => 999,
            'gender' => 'm',
            'username' => 'fangman999',
            'password' => 'yummyblood'
        ],
        [
            'name' => 'Frankenstein',
            'age' => 2,
            'gender' => 'm',
            'username' => 'stitchedtogether',
            'password' => 'boltneck'
        ],
        [
            'name' => 'Medusa',
            'age' => 34,
            'gender' => 'f',
            'username' => 'snakehairgirl',
            'password' => 'dontlooknow'
        ],
        [
            'name' => 'Mummy',
            'age' => 86,
            'gender' => 'm',
            'username' => 'dirtyragdude',
            'password' => 'wrappedtight'
        ],
        [
            'name' => 'Wicked Witch',
            'age' => 40,
            'gender' => 'f',
            'username' => 'broomrider4eva',
            'password' => 'getyoumypretty'
        ],
    ];
    foreach ($monsterData as $data) {
        //$monster = new Monster($data);
        //$monster->save();
    }
    //$validateMonster1->save();

    // Example of deleting a record
    //$deleteMonster = MonsterTest::findOne(['name'=>'Wolfman'])->delete();

    // Examples of Yii Active Record finders
    $foundMonster1 = Monstertest::findOne(1);
    $foundMonster2 = Monstertest::findAll(['gender' => 'm']);


?>

    <hr>
    <p>
        Found Monster 1 Name: <?= $foundMonster1->name; ?><br>
        Found Monster 2 Count: <?= count($foundMonster2); ?><br>
    </p>
    <hr>
    <p>
        Validate Monster 1 Error: <pre><?= var_dump($validateMonster1->errors);?></pre>
    </p>
</div>
