<div class="container"><div id="phones">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Должность</th>
            <th>Отдел</th>
            <th>Кабинет</th>
            <th>Тел. номер</th>
            <th>№ ВТС</th>
            </tr>
        </thead>
        <tbody id="data-table">
    <?php
    foreach ($rows as $row)
    {
        echo '<tr>';
        echo '<td>' .  $row->short_fio . '</td>';
        echo '<td>' .  $row->dolznost . '</td>';
        echo '<td>' .  $row->otdel . '</td>';
        echo '<td>' .  $row->room . '</td>';
        echo '<td>' .  $row->phone_number . '</td>';
        echo '<td>' .  $row->phone_vts . '</td>';
        echo '</tr>';
    }
    ?>
</div></div>


<ul id="filter" class="nav nav-list affix well">
    <li class="nav-header">Заголовок</li>
    <li class="active"><a href="#">На главную</a></li>
    <li><a href="#">Библиотека</a></li>
    ...
</ul>