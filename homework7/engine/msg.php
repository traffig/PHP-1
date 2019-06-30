<?php
function getErrorMsg($message)
{
    if (isset($message)) {
        switch ($message) {
            case 'ok':
                return 'Фото загружено.';
            case 'error':
                return 'Ошибка загрузки фото, поддерживаются jpg, gif, png размером менее 5мб';
            case 'ok_delete':
                return 'Удаление выполнено.';
            default:
                return '';
        }
    }
}