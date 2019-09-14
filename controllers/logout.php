<?php
session_start();
session_unset();
session_destroy();

print "<h3>Sessão finalizada</h3>";
