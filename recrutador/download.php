<?php
require_once("../conexão/db_connect.php");
$nome = isset($_GET['file']) ? $_GET['file'] : null;
$fullPath = '../alunos/uploads/' . $nome;

if ($nome === null) {
    echo 'Parametro file não definido';
    exit;
} else if (false === is_file($fullPath)) {
    echo 'Arquivo não encontrado';
    exit;
}

function mimeType($file) {
    $mimetype = false;

    if (class_exists('finfo')) {//PHP5.4+
        $finfo     = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype  = finfo_file($finfo, $file);
        finfo_close($finfo);
    } else if (function_exists('mime_content_type')) {//php5.3 ou inferiror
        $mimetype = mime_content_type($file);
    }

    return $mimetype;
}

$mime = mimeType($fullPath);

if ($mime === false) {
    echo 'Não foi possível detectar o tipo de arquivo';
    exit;
}

header('Content-type: ' . $mime);

//Seta o tamanho do arquivo
header('Content-length: ' . filesize($fullPath));

//Força o download
header('Content-Disposition: attachment; filename=' . $nome);

//Este header é necessário
header('Content-Transfer-Encoding: binary');

echo file_get_contents($fullPath, FILE_BINARY);
?>