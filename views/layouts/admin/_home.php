<h1>Willkommen im Adminbereich <?php if (isset($_SESSION["user"])) echo $_SESSION["user"]; ?>!</h1>
<h2>Funktionen</h2>
<ul>
    <li>Alle CDs anzeigen die in DB gespeichert sind</li>
    <li>CD anlegen mit Interpret, Genre, Jahr, Bild, ...</li>
    <li>CD bearbeiten/updaten</li>
    <li>Lieder hochladen, bearbeiten, abspielen</li>
    <li>Löschen aller Daten einer CD aus Server und DB</li>
</ul>
<h2>Infos</h2>
<ul>
    <b>PHP | </b><b>MySQL | </b><b>AJAX | </b><b>PHPUnit | </b><b>OOP | </b><b>MVC | </b><b>Admin | </b><b>Bootstrap CSS</b>
</ul>
<a href="../admin/cds" class="btn btn-primary musik-cds-btn-home">Zu allen Musik-CD's</a>