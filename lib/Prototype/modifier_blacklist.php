<?php
$blacklist = ['eval', 'exec', 'passthru', 'system', 'shell_exec', 'popen', 'pclose',
    'apache_child_terminate', 'fsockopen', 'pfsockopen', 'umask', 'fopen', 'gzopen', 'bzopen',
    'chgrp', 'chmod', 'chown', 'copy', 'file_put_contents', 'lchgrp', 'lchown', 'link', 'mkdir',
    'move_uploaded_file', 'rename', 'rmdir', 'symlink', 'tempnam', 'tmpfile', 'touch', 'unlink',
    'ftp_get', 'ftp_nb_get', 'iptcembed', 'file_get_contents', 'file', 'glob', 'is_executable',
    'parse_ini_file', 'readfile', 'readlink', 'realpath', 'gzfile', 'readgzfile', 'ftp_put',
    'ftp_nb_put', 'exif_read_data', 'read_exif_data', 'exif_thumbnail', 'exif_imagetype',
    'hash_update_file', 'md5_file', 'sha1_file', 'getimagesize', 'get_meta_tags', 'imagepng',
    'imagewbmp', 'image2wbmp', 'imagejpeg', 'imagexbm', 'imagegif', 'imagegd', 'imagegd2',
    'call_user_func', 'call_user_func_array', 'set_error_handler', 'set_exception_handler'];
