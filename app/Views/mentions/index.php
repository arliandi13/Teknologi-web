<h3>Notifikasi Mention</h3>
<ul>
<?php foreach ($mentions as $mention): ?>
    <li>
        Kamu dimention di <a href="/forum/reply/<?= $mention['reply_id'] ?>">balasan ini</a>
        <?= $mention['is_read'] ? '(Sudah dibaca)' : '<strong>(Baru)</strong>' ?>
    </li>
<?php endforeach; ?>
</ul>
<a href="/mentions/mark-as-read">Tandai semua sebagai telah dibaca</a>
