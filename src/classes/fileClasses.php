<?php

class File
{
    public function getFilesByPrefix(string $path, string $prefix, string $filetype)
    {
        return glob($path . $prefix . "*." . $filetype);
    }
}
