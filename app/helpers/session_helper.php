<?php
function iniciar_sesion_segura() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
