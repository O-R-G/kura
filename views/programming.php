<?
  // chronological sort
  function date_sort($a, $b) {
    return strtotime($a['begin']) - strtotime($b['begin']);
  }

  $programming = $oo->children($item['id']);
  usort($programming, "date_sort");

?>

<div class="container">
  <div class="content">
    <div class="page-title blink full" id="program-label"><a href="javascript:history.back()"><?= $item['name1']; ?></a></div>
    <div><br></div>
    <?= $item['body']; ?>
    <div class="content-programming">
      <? foreach ($programming as $key=>$program): ?>
        <div class="content-program">
          <a href="/program/<?= $program['url'] ?>">
            <div class="blink"><?= $key ?></div>
            <div class="content-program-title"><?= $program['name1']; ?></div>
            <div class="content-program-summary"><?= $program['deck']; ?></div>
            <div class="content-program-dates"><?= date('j.m', strtotime($program['begin'])) ?> &ndash; <?= date('j.m.y', strtotime($program['end'])) ?></div>
          </a>
        </div>
      <? endforeach; ?>
    </div>

  </div>
</div>
