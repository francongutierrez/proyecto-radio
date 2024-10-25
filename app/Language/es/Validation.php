<?php
return [
    // Reglas de validación generales
    'required'        => 'El campo {field} es obligatorio.',
    'min_length'      => 'El campo {field} debe tener al menos {param} caracteres.',
    'max_length'      => 'El campo {field} no puede exceder de {param} caracteres.',
    'valid_email'     => 'El campo {field} debe contener un correo electrónico válido.',
    'numeric'         => 'El campo {field} debe contener solo números.',
    'integer'         => 'El campo {field} debe contener un número entero.',
    'matches'         => 'El campo {field} no coincide con el campo {param}.',
    'valid_url'       => 'El campo {field} debe contener una URL válida.',

    // Validaciones para archivos
    'uploaded'        => 'Es necesario subir un archivo en el campo {field}.',
    'mime_in'         => 'El archivo {field} debe ser de tipo: {param}.',
    'max_size'        => 'El archivo {field} no puede exceder de {param} KB.',
    'is_image'        => 'El campo {field} debe contener una imagen válida.',
    'ext_in'          => 'El archivo {field} debe tener una extensión permitida: {param}.',
    'max_dims'        => 'El archivo {field} excede las dimensiones máximas permitidas.',
    
    // Reglas adicionales para tu caso
    'is_unique'       => 'El {field} ya está registrado.',
];

