<div id="header" class="row">

<div class="container">
            <div class="span1 sign nomargin-left"></div>
            <div class="span7"><h2>Телефонный справочник сотрудников налоговых органов ХМАО-Югры</h2></div>
            <div class="span4">
               <?php if(!isset($username)) {?>
               <form action="/">
               <select class="span3 nomargin-bottom">
                   <?php foreach($adm_organs as $adm_organ):?>
                   <option><?php echo trim($adm_organ->short_title);?></option>
                   <?php endforeach;?>
               </select>
                <button type="submit" class="btn">OK</button>
               </form>
                <?php } else { ?>
                <p>Здравствуйте, <?$username?></p>
                 <?php } ?>
            </div>
</div>
</div>