<?
  // chronological sort
  function date_sort($a, $b) {
    return strtotime($a['begin']) - strtotime($b['begin']);
  }

  $children = $oo->children($root);
  foreach($children as $child) {
    $name =  strtolower($child["name1"]);
    if ($name == "program") {
      $programObj = $child;
      break;
    }
  }

  $programming = $oo->children($programObj['id']);
  usort($programming, "date_sort");

  foreach ($programming as $key=>$program) {
    if ($program['id'] == $item['id']) {
      $itemKey = $key;
      break;
    }
  }
?>

<div class="container" id="containerBox">
  <div class="content">
    <a href="javascript:history.back()"><div class="blink sticky full"><?= $key ?></div></a>
    <div class="page-title"><?= $item['name1']; ?></div>
    <div><?= $item['deck']; ?></div>
    <? if (date('y', strtotime($item['begin'])) != date('y', strtotime($item['end']))) :?>
      <div><?= date('j.m.y', strtotime($item['begin'])) ?> &ndash; <?= date('j.m.y', strtotime($item['end'])) ?></div>
    <? else: ?>
      <div><?= date('j.m', strtotime($item['begin'])) ?> &ndash; <?= date('j.m.y', strtotime($item['end'])) ?></div>
    <? endif; ?>
    <div><br></div>
    <?= $item['body']; ?>

    <div class="media">
      <? foreach($media as $key=>$m): ?>
        <div class="media-item">
          <? if ($m['caption'] == "__blur__"): ?>
            <div class="media-image click blur" data-index="<?= $key; ?>"><img src="<?= m_url($m); ?>"></div>
            <div class="media-caption"></div>
          <? else: ?>
            <div class="media-image click" data-index="<?= $key; ?>"><img src="<?= m_url($m); ?>"></div>
            <div class="media-caption"><?= $m['caption']; ?></div>
          <? endif; ?>
        </div>
      <? endforeach; ?>
    </div>
  </div>
</div>

<div class="gallery" id="galleryBox">
  <div id="left-arrow" class="gallery-arrow click"><img src="/static/media/svg/left-arrow.svg"></div>
  <div id="right-arrow" class="gallery-arrow click"><img src="/static/media/svg/right-arrow.svg"></div>
  <div id="cross" class="gallery-arrow click"><img src="/static/media/svg/x.svg"></div>
  <? foreach($media as $key=>$m): ?>
    <div class="gallery-item hidden click" data-index="<?= $key; ?>">
      <? if ($m['caption'] == "__blur__"): ?>
        <div class="gallery-image blur" data-index="<?= $key; ?>"><img src="<?= m_url($m); ?>"></div>
        <div class="gallery-caption hidden"></div>
      <? else: ?>
        <div class="gallery-image" data-index="<?= $key; ?>"><img src="<?= m_url($m); ?>"></div>
        <div class="media-caption hidden"><?= $m['caption']; ?></div>
      <? endif; ?>
    </div>
  <? endforeach; ?>
</div>


<script>
// if (window.innerWidth > 1000) {
if (true) {
  var galleryItems = document.getElementsByClassName('gallery-item');
  var galleryIndex = 0;

  document.getElementById('cross').onclick = hideGallery;
  document.getElementById('right-arrow').onclick = nextImage;
  document.getElementById('left-arrow').onclick = previousImage;

  document.onkeydown = checkKey;

  function checkKey(e) {

      e = e || window.event;

      if (e.keyCode == '38') {
          // up arrow
      }
      else if (e.keyCode == '40') {
          // down arrow
      }
      else if (e.keyCode == '37') {
         // left arrow
         previousImage();
      }
      else if (e.keyCode == '39') {
         // right arrow
         nextImage();
      }
      else if (e.keyCode == '27') {
        // esc key
        hideGallery();
      }

  }

  Array.prototype.forEach.call(document.getElementsByClassName('media-image'), function(e) {
    e.onclick = function() {
      var index = e.dataset.index;
      showGallery(index);
    }
  });

  Array.prototype.forEach.call(document.getElementsByClassName('gallery-item'), function(e) {
    e.onclick = function() {
      nextImage();
    }
  });

  function nextImage() {
    if (galleryIndex+1 > galleryItems.length-1)
      showGallery(0);
    else
      showGallery(galleryIndex+1);
  }

  function previousImage() {
    if (galleryIndex-1 < 0)
      showGallery(galleryItems.length-1);
    else
      showGallery(galleryIndex-1);
  }

  function showGallery(index) {
    document.body.classList.add('noscroll');
    document.getElementById('galleryBox').style.display = 'flex';
    Array.prototype.forEach.call(galleryItems, function(e) { e.classList.add('hidden'); });
    galleryItems[parseInt(index)].classList.remove('hidden');
    galleryIndex = parseInt(index);
  }

  function hideGallery() {
    document.getElementById('galleryBox').style.display = 'none';
    document.body.classList.remove('noscroll');
  }
}
</script>
