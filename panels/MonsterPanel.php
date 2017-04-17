<?php
namespace app\panels;

use yii\base\Event;
use app\models\Monstertest;
use yii\debug\Panel;

class MonsterPanel extends Panel
{
    private $_monsters = [];

    public function init()
    {
        parent::init();
        Event::on(Monstertest::className(),
        Monstertest::EVENT_AFTER_FIND, function ($event){
            $this->_monsters[] = $event->sender->name . ' was liaded.';
            });
    }

    /**
     * @inheritdoc
     */

    public function getName()
    {
        return 'Monsters';
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        $url = $this->getUrl();
        $count = count($this->data);

        return "<div class=\"yii-debug-toolbar__block\"><a
        href=\"$url\"> Monsters <span class=\"yii-debug-toolbar__label yii-debug-toolbar__label_info\">$count</span></a></div>";
    }

    /**
     * @inheritdoc
     */
    public function getDetail()
    {
        return '<ol><li>' . implode('<li>', $this->data) . '</ol>';
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        return $this->_monsters;
    }

}