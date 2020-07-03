<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
// added by shailesh to set Teig template path

// Bootstrap validations key and values
defined('TWIG_TEMPLATE_PATH_ADMIN') OR define('TWIG_TEMPLATE_PATH_ADMIN', VIEWPATH.DIRECTORY_SEPARATOR.'layout'.DIRECTORY_SEPARATOR.'default');
//data-bv-message
defined('BV_MSG') OR define('BV_MSG', 'data-bv-message');
//data-bv-notempty
defined('BV_NOT_EMP') OR define('BV_NOT_EMP','data-bv-notempty');
//data-bv-regexp
defined('BV_REG_EXP_BOOLEAN') OR define('BV_REG_EXP','data-bv-regexp');
//data-bv-regexp-regexp
defined('BV_REG_EXP_EXP') OR define('BV_REG_EXP_EXP','data-bv-regexp-regexp');
defined('SENT_TO_ADMIN_FOR_VERIFICATION') OR define('SENT_TO_ADMIN_FOR_VERIFICATION','sent_to_admin_for_verification');
defined('REVIEWED_BY_ADMIN') OR define('REVIEWED_BY_ADMIN','reviewed_by_admin');
defined('APPROVED_BY_ADMIN') OR define('APPROVED_BY_ADMIN','approved_by_admin');
defined('REJECTED_BY_ADMIN') OR define('REJECTED_BY_ADMIN','rejected_by_admin');
defined('SENT_TO_SCHOOL_FOR_VERIFICATION') OR define('SENT_TO_SCHOOL_FOR_VERIFICATION','sent_to_school_for_verification');
defined('SCHOOL_REVIWEING') OR define('SCHOOL_REVIWEING','school_reviweing');
defined('APPROVED_BY_SCHOOL') OR define('APPROVED_BY_SCHOOL','approved_by_school');
defined('REJECTED_BY_SCHOOL') OR define('REJECTED_BY_SCHOOL','rejected_by_school');
defined('SENT_TO_PARENT_FOR_VERIFICATION') OR define('SENT_TO_PARENT_FOR_VERIFICATION','sent_to_parent_for_verification');
defined('APPROVED_BY_PARENT') OR define('APPROVED_BY_PARENT','approved_by_parent');
defined('REJECTED_BY_PARENT') OR define('REJECTED_BY_PARENT','rejected_by_parent');
defined('VERIFIED_BY_SCHOOL') OR define('VERIFIED_BY_SCHOOL','verified_by_school');
defined('VERIFIED_BY_ADMIN') OR define('VERIFIED_BY_ADMIN','verified_by_admin');
defined('DELIVERED') OR define('DELIVERED','delivered');
defined('CLOSED') OR define('CLOSED','closed');
defined('UPLOADS_QRCODES_PATH') OR define('UPLOADS_QRCODES_PATH','uploads/idcard/qrcodes/');

