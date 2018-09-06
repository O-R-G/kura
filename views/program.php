<div class="container" id="containerBox">
  <div class="content">
    <a href="javascript:history.back()">
      <div class="page-title"><?= $item['name1']; ?></div>
      <div><?= $item['deck']; ?></div>
      <? if (date('y', strtotime($item['begin'])) != date('y', strtotime($item['end']))) :?>
        <div><?= date('j.m.y', strtotime($item['begin'])) ?> &ndash; <?= date('j.m.y', strtotime($item['end'])) ?></div>
      <? else: ?>
        <div><?= date('j.m', strtotime($item['begin'])) ?> &ndash; <?= date('j.m.y', strtotime($item['end'])) ?></div>
      <? endif; ?>
    </a>
    <div><br></div>
    <?= $item['body']; ?>
  </div>

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

<div class="gallery" id="galleryBox">
  <div id="left-arrow" class="gallery-arrow click"><img src="/static/media/svg/left-arrow.svg"></div>
  <div id="right-arrow" class="gallery-arrow click"><img src="/static/media/svg/right-arrow.svg"></div>
  <div id="cross" class="gallery-arrow click"><img src="/static/media/svg/x.svg"></div>
  <? foreach($media as $key=>$m): ?>
    <div class="gallery-item hidden" data-index="<?= $key; ?>">
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
checkSize();
window.onresize = checkSize;

function checkSize() {
  var medias = document.getElementsByClassName('media-item');
  for (var i = 0; i < medias.length; i++) {
    if (window.innerWidth<= 1000) {
      medias[i].style.marginLeft = '';
      medias[i].style.marginTop = '';
      medias[i].style.marginRight = '';
    } else {
      medias[i].style.paddingLeft = Math.random()*20+5 + '%';
      medias[i].style.paddingTop = Math.random()*20+5 + '%';
      medias[i].style.paddingRight = Math.random()*20+5 + '%';
    }
  }
}

if (window.innerWidth > 1000) {
  var galleryItems = document.getElementsByClassName('gallery-item');
  var galleryIndex = 0;

  document.getElementById('cross').onclick = hideGallery;
  document.getElementById('right-arrow').onclick = function() { showGallery((galleryIndex+1)%galleryItems.length);}
  document.getElementById('left-arrow').onclick = function() { showGallery((galleryIndex-1)%galleryItems.length);}

  Array.prototype.forEach.call(document.getElementsByClassName('media-image'), function(e) {
    e.onclick = function() {
      var index = e.dataset.index;
      showGallery(index);
    }
  });

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
