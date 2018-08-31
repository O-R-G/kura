<?
  // most recent chronological sort
  function date_sort($a, $b) {
    return strtotime($b['begin']) - strtotime($a['begin']);
  }

  $programming = $oo->children($item['id']);
  usort($programming, "date_sort");

?>

<div class="content">
  <div class="page-title"><a href="javascript:history.back()"><?= $item['name1']; ?></a></div>
  <div><br></div>
  <?= $item['body']; ?>
  <div class="content-programming">
    <? foreach ($programming as $program): ?>
      <div class="content-program">
        <a href="/program/<?= $program['url'] ?>">
          <div class="content-program-title"><?= $program['name1']; ?></div>
          <div class="content-program-dates"><?= date('j F', strtotime($program['begin'])) ?>&thinsp;–&thinsp;<?= date('j F', strtotime($program['end'])) ?></div>
          <div class="content-program-summary"><?= $program['deck']; ?></div>
        </a>
      </div>
    <? endforeach; ?>
  </div>

</div>
