<div class="info">
   <?php
   $flashMessages = Yii::app()->user->getFlashes();
   if ($flashMessages) {
       echo '<ul class="flashes">';
       foreach($flashMessages as $key => $message) {
           echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
       }
       echo '</ul>';
   }
   ?>
</div>
<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>