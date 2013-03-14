<div class='container'>


	
    <p></p>
    <p></p>
    <p></p>
<div class="span5 offset2">
    <?php echo form_open("auth/login", "class='form-horizontal'");?>
    	
      <div class="control-group">
      	<label class="control-label" for="identity">Логин</label>
        <div class="controls">
      	<?php echo form_input($identity);?>
        </div>
       </div>

    <div class="control-group">
      	<label class="control-label" for="password">Пароль</label>
      	<div class="controls">
        <?php echo form_input($password);?>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
      <?php echo form_submit('submit', 'Войти', 'class="btn"');?>
        </div>
    </div>
    <?php echo form_close();?>
</div>
    <div id="infoMessage" class="span4"><?php echo $message;?></div>

</div>
