<?
echo $this->BootstrapForm->create('User');
?>
<fieldset><legend>Please log in to continue.</legend>
  <div class="control-group">
    <div class="controls">
      <p class="help-block">Don't have an account?
        <? echo $this->Html->link('Click here to register.',
          array('action'=>'register')); ?>
        </p>
    </div>
  </div>
  <?
  echo $this->BootstrapForm->input('email', array('icon'=>'envelope',
    'type'=>'email', 'autofocus'=>'true'));
  echo $this->BootstrapForm->input('password', array('icon'=>'asterisk'));
  echo $this->BootstrapForm->end('Login');
  ?>
</fieldset>