# SimpleAjaxTabs
A light weight and simple Tabs plugin based on the bootstrap tabs but adding in Ajax tabs functionality.

When you just want simple Ajax tab, without all the bells and whistles of more popular plugins - this plugin is really quick and simple to implement.

I haven't yet uploaded this to composer, so just copy the component into your component directory.  It's just one file and completely self-contained.

To use:

use backend\components\SimpleAjaxTabs;

          $items = [
               [
                    'label'=>'<i class="glyphicon glyphicon-home"></i> Overview',
                    'content' => $this->render('view', ['model' => $model]),
               ],
               [
                    'label'=>'<i class="glyphicon glyphicon-home"></i> Descriptions',
                    'content' => $this->render('_descriptions', ['model' => $model]),
               ],
               [
                    'label'=> '<i class="glyphicon glyphicon-envelope"></i> View',
                    'url'=>\yii\helpers\Url::to(['/some-controller/view/'.$model->id])
               ],
               [
                    'label'=> '<i class="glyphicon glyphicon-envelope"></i> Documents',
                    'url'=>\yii\helpers\Url::to(['/some-controller/index?pid='.$model->id])
               ]
           ];
            
           echo SimpleAjaxTabs::widget([
               'id' => 'PropertyTab',
               'items'=>$items,
           ]);
           
Please note: that this doesn't yet support multiple occurences on one page.  I intend to do this but not yet available.     
