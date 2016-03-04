<?php

namespace backend\components;


class SimpleAjaxTabs extends \yii\base\Widget
{
    public $items;
    public $id;
    
    public function run()
    {

$js = <<<EOJ
        $('[data-toggle="tabajax"]').click(function(e) {
            e.preventDefault();
            var dis = $(this),
                loadurl = dis.attr('href'),
                targ = dis.attr('data-target');
            if (loadurl != '#')
            {
                $.get(loadurl, function(data) {
                    $(targ).html(data);
                });
            }
            dis.tab('show');
            return false;
        });

        $('#tab-0').show();
EOJ;

        if (!isset( $this->id))
            $this->id = 'bstabs-'.rand(1,250);
        
        echo '<ul class="nav nav-tabs tabs-up" id='.$this->id.'>';
        
        $count = 0; $active='active';
        foreach ($this->items as $item) 
        {
            if (isset($item['url']))
            {
                echo '<li><a href="'.$item['url'].'" data-target="#item-'.$count.'" class="'.$active.'" id="tab-'.$count.'" data-toggle="tabajax" rel="tooltip"> '.$item['label'].' </a></li>';                
            } else {
                echo '<li><a href="#" data-target="#item-'.$count.'" class="'.$active.'" id="tab-'.$count.'" data-toggle="tabajax" rel="tooltip"> '.$item['label'].' </a></li>';
            }
            $count ++;
            $active='';
        }
        echo "</ul>";

        echo '<div class="tab-content">';
        
        $count = 0;
        foreach ($this->items as $item) 
        {
            echo '<div class="tab-pane active" id="item-'.$count.'">';
            if (isset($item['url']))
            {
            } else {
                echo $item['content'];
            }
            echo '</div>';
            $count ++;
        }
        
        $view = $this->getView();
        
        $view->registerJs($js, \yii\web\View::POS_READY);
    }
        
}