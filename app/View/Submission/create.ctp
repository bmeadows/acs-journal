<?
$this->start('css');
echo $this->Html->css('submit');
$this->end();

$this->start('scripts');
echo $this->Html->script('create_submission');
$this->end();
?>

<div class="page-header">
  <h1>Submit Paper</h1>
</div>

<?
echo $this->BootstrapForm->create('Submission', array('type'=>'file'));
?>
<div class="row">
  <div class="span7">
   <div class="left">
     <h3>Submission Information</h3>
<?
echo $this->BootstrapForm->input('collection_id', array('label'=>'Venue', 'autofocus'=>true));
echo $this->BootstrapForm->input('title');
echo $this->BootstrapForm->input('abstract');

// TODO: add keywords

echo $this->BootstrapForm->input('Upload', array('type'=>'file'));
?>
    </div>
  </div>
  <div class="span5">
    <div class="right">
      <h3>Coauthors</h3>
      <div class="coauthor base">
<?
// TODO: add code here to rebuild the full list of coauthors (if sent in request data)
echo $this->BootstrapForm->input(
  'Coauthor.0.name', array('label'=>'Name', 'required'=>false));
echo $this->BootstrapForm->input(
  'Coauthor.0.email', array('label'=>'Email', 'type'=>'email', 'required'=>false));
echo $this->BootstrapForm->input(
  'Coauthor.0.institution', array('label'=>'Institution', 'required'=>false));
?>
      </div>
<?
echo $this->Html->link('Add Coauthor', '#', array('class'=>'btn btn-mini'));
?>
    </div>
  </div>
</div>
<?
echo $this->BootstrapForm->end('Submit');
?>
