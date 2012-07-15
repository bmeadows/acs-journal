<?
App::uses('AppHelper', 'View/Helper');

class BootstrapHelper extends AppHelper {
  public $helpers = array('Html');

  public function navLink($title, $link, $options = array()) {
    $str = '';
    $str .= '<li>';
    $str .= $this->Html->link($title, $link, $options);
    $str .= '</li>';
    return $str;
  }

  public function gravatar($email, $size = '40px') {
    $base_url = 'http://www.gravatar.com/avatar/%s?d=mm&s=%s&r=g';
    $hash = md5(strtolower(trim($email)));
    $url = sprintf($base_url, $hash, $size);
    return $this->Html->image($url, array('class'=>'gravatar'));
  }

  public function dropdown($title, $links) {
    $str = '';
    $str .= '<li class="dropdown">';
    $str .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
    $str .= sprintf('%s <b class="caret"></b></a>', $title);
    $str .= '<ul class="dropdown-menu">';
    foreach($links as $l) {
      if($l === true) {
        $str .= '<li class="divider"></li>';
      } else {
        $str .= '<li>';
        $url = $this->Html->url($l['link']);
        $str .= sprintf('<a href="%s">', $url);
        if(isset($l['icon']))
          $str .= sprintf('<i class="icon-%s"></i> ', $l['icon']);
        $str .= $l['text'];
        $str .= '</a>';
        $str .= '</li>';
      }
    }
    $str .= '</ul>';
    $str .= '</li>';
    return $str;
  }

  public function dropdownBtn($title, $links, $class = null) {
    $str = '';
    $str .= '<div class="btn-group">';
    $str .= '<a data-toggle="dropdown" ';
    $str .= sprintf('class="btn dropdown-toggle %s">', $class);
    $str .= sprintf('%s <span class="caret"></span></a>', $title);
    $str .= '<ul class="dropdown-menu">';
    foreach($links as $l) {
      if($l === true) {
        $str .= '<li class="divider"></li>';
      } else {
        $str .= '<li>';
        $url = $this->Html->url($l['link']);
        $str .= sprintf('<a href="%s">', $url);
        if(isset($l['icon']))
          $str .= sprintf('<i class="icon-%s"></i> ', $l['icon']);
        $str .= $l['text'];
        $str .= '</a>';
        $str .= '</li>';
      }
    }
    $str .= '</ul>';
    $str .= '</div>';
    return $str;
  }

  public function linkBtn($text, $link = null, $class = null, $options = array(), $confirm = null) {
    $str = '';
    $options['class'] = 'btn ' . $class;
    $str .= '<div class="btn-group">';
    $str .= $this->Html->link($text, $link, $options, $confirm);
    $str .= '</div>';
    return $str;
  }
}
?>