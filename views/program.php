<div class="content">
  <div class="page-title"><a href="javascript:history.back()"><?= $item['name1']; ?></a></div>
  <div><?= date('j F', strtotime($item['begin'])) ?>&thinsp;–&thinsp;<?= date('j F', strtotime($item['end'])) ?></div>
  <div><br></div>
  <?= $item['body']; ?>
</div>

<div class="media fill">
  <? foreach($media as $m): ?>
    <div class="media-item">
      <div class="media-image"><img src="<?= m_url($m); ?>"></div>
      <div class="media-caption"><?= $m['caption']; ?></div>
    </div>
  <? endforeach; ?>
</div>

<script>
  var medias = document.getElementsByClassName('media-item');

  for (var i = 0; i < medias.length; i++) {
    medias[i].style.marginLeft = Math.random()*20+5 + 'vw';
    medias[i].style.marginTop = Math.random()*20+5 + 'vh';
    medias[i].style.width = Math.random()*1000+500 + 'px';
  }
</script>
