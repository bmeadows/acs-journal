<?
class QuestionsController extends AppController {
  public $name = 'Question';

  public function beforeFilter() {
    $this->set('user', $this->Auth->user());
  }

  public function add($review_form_id = null) {
    // add a new question to the review form
    $form = $this->Question->ReviewForm->findById($review_form_id);
    $this->set('review_form', $form);
    $this->set('collection_title', $form['Collection']['title']);
    $this->set('collection_slug', $form['Collection']['slug']);
    $this->set('review_form_id', $review_form_id);

    if($this->request->is('get')) {
      // just viewing the page
    } else {
      // trying to add a question here
      $data = $this->request->data;
      $data['Question']['review_form_id'] = $review_form_id;
      if($question = $this->Question->save($data)) {
        $this->alertSuccess('Success!', 'Question succesfully added.', true);
        $this->redirect(array(
          'controller'=>'collections',
          'action'=>'view',
          $form['Collection']['slug'],
          '#'=>'review-form'
        ));
      } else {
        $this->alertError('Error!', 'Something went wrong. Please correct ' .
                          'all errors below and resubmit.');
      }
    }
  }
}
?>