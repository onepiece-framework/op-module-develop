<?php
/** op-module-develop:/index.php
 *
 * @created   2019-01-30
 * @version   1.0
 * @package   op-module-develop
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** declare
 *
 */
declare(strict_types=1);

/** namespace
 *
 * @created   2020-01-11
 */
namespace OP\DEVELOP;

/*
//	...
function Auto(){};
function Menu(){};
*/

/** namespace
 *
 */
namespace OP;

/** Get kind list.
 *
 */
/*
function GetKindList() : array {
	return ['phpinfo','admin','selftest','testcase','reference'];
}
*/

//	...
if(!Env::isAdmin() ){
	echo $_SERVER['REMOTE_ADDR'];
	return;
};

/*
//	...
Load('Args');

//	If is shell, Run controller.
if( Env::isShell() ){
	OP::Template('controller.inc.php');
	return;
}
*/

//	...
RootPath('develop', dirname(Unit('Router')->EndPoint()));

//	Change of Layout.
$layout = OP()->Config('layout');
$layout['name'] = OP()->Config('develop')['layout'] ?? 'flexbox';
foreach(['top','left'] as $position ){
	$layout['path']['menu'][$position] = realpath("./layout/menu/{$position}.phtml");
}
OP()->Config('layout', $layout);

//	Change of Title.
$html = OP()->Config('html');
$html['head']['title'] = "Develop | {$html['head']['title']}";
OP()->Config('html', $html);

//	...
OP()->Template('index.phtml');
OP()->Unit('WebPack')->Auto('menu.*');
OP()->Unit('WebPack')->Auto('develop.*');
OP()->Unit('WebPack')->Auto("asset:/webpack/js/");
OP()->Unit('WebPack')->Auto("asset:/webpack/css/");
